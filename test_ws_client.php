<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Title</title>


    <div class="container">
        <canvas id="cpuChart" class="mt-5" width="300" height="100"></canvas>
    </div>



    <script>
    // WebSocket message handling
    var socket = new WebSocket("ws://localhost:1880/s1");
    socket.onmessage = function(event) {
        var data = JSON.parse(event.data);
        updateChart(data.cpuUsage); // Assuming 'cpuUsage' is the CPU data field
    };

    // Chart rendering
    var ctx = document.getElementById('cpuChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [], // If you want time labels, adjust accordingly
            datasets: [{
                label: 'CPU Usage',
                data: [],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Function to update the chart with new data
    function updateChart(cpuUsage) {
        var time = new Date().toLocaleTimeString(); // If you want to display time on x-axis
        chart.data.labels.push(time);
        chart.data.datasets[0].data.push(cpuUsage);
        chart.update();
    }
    </script>
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>