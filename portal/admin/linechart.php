<!DOCTYPE HTML>
<html>

<head>
  <script type="text/javascript">
    window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer", {
        title: { text: "Daily Collection" },
        axisX: { valueFormatString: "MMM DD", interval: 1, intervalType: "day" },
        axisY: { includeZero: false },
        data: [
          {
            name: "Nantucket",
            type: "line",
            showInLegend: true,
            legendText: "Total Collections",
            color: "blue",
            dataPoints: [
              { x: new Date(2024, 0, 6), y: 1200 },
              { x: new Date(2024, 0, 7), y: 1500 },
              { x: new Date(2024, 0, 8), y: 1800, indexLabel: "highest", markerColor: "red", markerType: "triangle" },
              { x: new Date(2024, 0, 9), y: 1600 },
              { x: new Date(2024, 0, 10), y: 1400 },
              { x: new Date(2024, 0, 11), y: 1700 },
              { x: new Date(2024, 0, 12), y: 1900 },
              { x: new Date(2024, 0, 13), y: 2000 },
            ]
          },
          {
            name: "Nantucket",
            type: "line",
            showInLegend: true,
            legendText: "Yesterday Collections",
            color: "green",
            dataPoints: [
              { x: new Date(2024, 0, 6), y: 800 },
              { x: new Date(2024, 0, 7), y: 900 },
              { x: new Date(2024, 0, 8), y: 1100, indexLabel: "highest", markerColor: "red", markerType: "triangle" },
              { x: new Date(2024, 0, 9), y: 1000 },
              { x: new Date(2024, 0, 10), y: 950 },
              { x: new Date(2024, 0, 11), y: 1200 },
              { x: new Date(2024, 0, 12), y: 1300 },
              { x: new Date(2024, 0, 13), y: 1400 },
            ]
          },
          {
            name: "Nantucket",
            type: "line",
            showInLegend: true,
            legendText: "Today Collections",
            color: "red",
            dataPoints: [
              { x: new Date(2024, 0, 6), y: 400 },
              { x: new Date(2024, 0, 7), y: 600 },
              { x: new Date(2024, 0, 8), y: 900, indexLabel: "highest", markerColor: "red", markerType: "triangle" },
              { x: new Date(2024, 0, 9), y: 800 },
              { x: new Date(2024, 0, 10), y: 700 },
              { x: new Date(2024, 0, 11), y: 800 },
              { x: new Date(2024, 0, 12), y: 1000 },
              { x: new Date(2024, 0, 13), y: 1100 },
            ]
          }
        ],
        legend: {
          verticalAlign: "bottom",
          horizontalAlign: "center",
          cursor: "pointer",
          itemclick: toggleDataSeries
        }
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

<body>
  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>

</html>