<!DOCTYPE HTML>
<html>

<head>
  <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Add some styling for better layout */
    .chart-container {
      display: flex;
      justify-content: space-around;
      margin: 20px;
    }

    .chart-box {
      width: 48%;
    }
  </style>
</head>

<body>
  <div class="chart-container">
    <!-- CanvasJS Line Chart -->
    <div class="chart-box">
    <?php
        // PHP code to fetch data for today
        $dataPointsToday = array();
        $cumulativeTotalToday = 0;
        $query6 = mysqli_query($con, "SELECT tblinvoice.ServiceId as ServiceId, tblservices.Cost FROM tblinvoice JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId WHERE DATE(PostingDate) = CURDATE()");
        while ($row6 = mysqli_fetch_array($query6)) {
          $todays_sale = $row6['Cost'];
          $cumulativeTotalToday += $todays_sale;
          $dataPointsToday[] = array("y" => (float) $cumulativeTotalToday);
        }

        // PHP code to fetch data for yesterday
        $dataPointsYesterday = array();
        $cumulativeTotalYesterday = 0;
        $query7 = mysqli_query($con, "SELECT tblinvoice.ServiceId as ServiceId, tblservices.Cost FROM tblinvoice JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId WHERE DATE(PostingDate) = CURDATE() - 1");
        while ($row7 = mysqli_fetch_array($query7)) {
          $yesterday_sale = $row7['Cost'];
          $cumulativeTotalYesterday += $yesterday_sale;
          $dataPointsYesterday[] = array("y" => (float) $cumulativeTotalYesterday);
        }

        // PHP code to fetch data for total
        $dataPointsTotal = array();
        $cumulativeTotalTotal = 0;
        $query9 = mysqli_query($con, "SELECT tblinvoice.ServiceId as ServiceId, tblservices.Cost FROM tblinvoice JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId");
        while ($row9 = mysqli_fetch_array($query9)) {
          $total_sale = $row9['Cost'];
          $cumulativeTotalTotal += $total_sale;
          $dataPointsTotal[] = array("y" => (float) $cumulativeTotalTotal);
        }
      ?>
    
      <div id="canvasjsChart" style="height: 400px; "></div>
    </div>

    <?php
// PHP code to fetch data for owner and renter counts
$queryOwnerRenterCount = mysqli_query($con, "SELECT status, COUNT(*) as count FROM tbluser GROUP BY status");
$ownerCount = 0;
$renterCount = 0;
while ($rowCount = mysqli_fetch_array($queryOwnerRenterCount)) {
    if ($rowCount['status'] == 'Owner') {
        $ownerCount = $rowCount['count'];
    } elseif ($rowCount['status'] == 'Renter') {
        $renterCount = $rowCount['count'];
    }
}
?>

<!-- Chart.js Bar Chart -->
<div class="chart-box">
    <canvas id="chartJsBarChart" width="250" height="150"></canvas>
</div>
  </div>

  <script>
    // Convert PHP arrays to JavaScript
    var dataPointsToday = <?php echo json_encode($dataPointsToday, JSON_NUMERIC_CHECK); ?>;
    var dataPointsYesterday = <?php echo json_encode($dataPointsYesterday, JSON_NUMERIC_CHECK); ?>;
    var dataPointsTotal = <?php echo json_encode($dataPointsTotal, JSON_NUMERIC_CHECK); ?>;

    // CanvasJS Line Chart
    var canvasjsChart = new CanvasJS.Chart("canvasjsChart", {
      title: { text: "" },
      axisY: { title: "Total Collection", includeZero: false },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center",
        fontSize: 14,
        cursor: "pointer",
        itemclick: toggleDataSeriesCanvasJS
      },
      data: [
        {
          type: "line",
          name: "Total Collections",
          showInLegend: true,
          legendMarkerType: "circle",
          legendText: "Total Collections",
          dataPoints: dataPointsTotal,
          color: "red"
        },
        {
          type: "line",
          name: "Today Collections",
          showInLegend: true,
          legendMarkerType: "circle",
          legendText: "Today Collections",
          dataPoints: dataPointsToday,
          color: "blue"
        },
        {
          type: "line",
          name: "Yesterday Collections",
          showInLegend: true,
          legendMarkerType: "circle",
          legendText: "Yesterday Collections",
          dataPoints: dataPointsYesterday,
          color: "green"
        },
      ],
    });

    canvasjsChart.render();

    function toggleDataSeriesCanvasJS(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      canvasjsChart.render();
    }

    // Chart.js Bar Chart
     // Chart.js Bar Chart
     var ownerCount = <?php echo $ownerCount; ?>;
    var renterCount = <?php echo $renterCount; ?>;
    var labels = ['Owner', 'Renter'];
    var ctx = document.getElementById('chartJsBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Resident',
                data: [ownerCount, renterCount],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>
</body>

</html>
