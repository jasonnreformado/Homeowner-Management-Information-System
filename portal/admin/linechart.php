<!DOCTYPE HTML>
<html>

<head>
  <script type="text/javascript">
    window.onload = function () {
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

      // Convert PHP arrays to JavaScript
      var dataPointsToday = <?php echo json_encode($dataPointsToday, JSON_NUMERIC_CHECK); ?>;
      var dataPointsYesterday = <?php echo json_encode($dataPointsYesterday, JSON_NUMERIC_CHECK); ?>;
      var dataPointsTotal = <?php echo json_encode($dataPointsTotal, JSON_NUMERIC_CHECK); ?>;

      // Chart rendering code
      var chart = new CanvasJS.Chart("chartContainer", {
        title: { text: "Collection Comparison" },
        axisY: { title: "Total Collection", includeZero: false },
        legend: {
          verticalAlign: "bottom", // Change verticalAlign to "bottom"
          horizontalAlign: "center", // Center the legend horizontally
          fontSize: 14,
          cursor: "pointer",
          itemclick: toggleDataSeries
        },
        data: [
          {
            type: "line",
            name: "Total Collections",
            showInLegend: true,
            legendMarkerType: "circle",
            legendText: "Total Collections",
            dataPoints: dataPointsTotal,
            color: "red" // Customize the line color for total
          },
          {
            type: "line",
            name: "Today Collections",
            showInLegend: true,
            legendMarkerType: "circle",
            legendText: "Today Collections",
            dataPoints: dataPointsToday,
            color: "blue" // Customize the line color for today
          },
          {
            type: "line",
            name: "Yesterday Collections",
            showInLegend: true,
            legendMarkerType: "circle",
            legendText: "Yesterday Collections",
            dataPoints: dataPointsYesterday,
            color: "green" // Customize the line color for yesterday
          },
        ],
      });

      chart.render();

      function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
        } else {
          e.dataSeries.visible = true;
        }
        chart.render();
      }
    }
  </script>
  <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>



</html>
