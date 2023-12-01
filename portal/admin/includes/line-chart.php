<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Money Collection Chart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    canvas {
      border: 1px solid #ccc;
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <canvas id="moneyChart"></canvas>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Sample data for money collection
      const data = [100, 150, 200, 120, 180, 250, 300];

      // Get the canvas element and its context
      const canvas = document.getElementById("moneyChart");
      const ctx = canvas.getContext("2d");

      // Function to set canvas size based on container width
      function setCanvasSize() {
        const containerWidth = canvas.parentElement.clientWidth;
        canvas.width = containerWidth;
      }

      // Set canvas size initially and on window resize
      setCanvasSize();
      window.addEventListener("resize", setCanvasSize);

      // Set up chart properties
      const chart = {
        get width() {
          return canvas.width;
        },
        get height() {
          return canvas.height;
        },
        padding: 20,
        data: data,
      };

      // Function to draw the line chart
      function drawLineChart() {
        const { width, height, padding, data } = chart;

        // Clear the canvas
        ctx.clearRect(0, 0, width, height);

        // Calculate the maximum value in the data
        const maxDataValue = Math.max(...data);

        // Calculate the scaling factor for the chart
        const scaleY = (height - 2 * padding) / maxDataValue;
        const scaleX = (width - 2 * padding) / (data.length - 1);

        // Draw the axes
        ctx.beginPath();
        ctx.moveTo(padding, padding);
        ctx.lineTo(padding, height - padding);
        ctx.lineTo(width - padding, height - padding);
        ctx.stroke();

        // Draw the data points and connect them with lines
        ctx.beginPath();
        ctx.moveTo(padding, height - padding - data[0] * scaleY);

        for (let i = 1; i < data.length; i++) {
          const x = padding + i * scaleX;
          const y = height - padding - data[i] * scaleY;
          ctx.lineTo(x, y);
        }

        // Style the line
        ctx.strokeStyle = "blue";
        ctx.lineWidth = 2;
        ctx.stroke();
      }

      // Initial draw
      drawLineChart();
    });
  </script>
</body>
</html>
