<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512...">
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.10.12/dist/interact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz,wght@8..144,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="admin-container">
        <div class="nav-bar flex ">
            <div class="nav-content flex row">
                <div class="title-logo flex row">
                    <div class="logo">
                        <img src="{{ asset('assets/nsquaredlogo.jpg')}}" alt="img"/>
                    </div>
                    <h1>NSquared</h1>
                </div>
                <div class="input">
                    <input type="text" placeholder="search..." />
                </div>
                <div class="profile circle">
                    <img src="{{asset('assets/admin.jpg')}}" class="circle" alt="admin" />
                </div>
            </div>
        </div>
        <div class="dashboard flex">
            <div class="side-menu ">
                <ul class="side-menu-items flex column ">
                    <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="user.php"><i class="fas fa-users"></i>Users<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="order.php"><i class="fas fa-pen"></i>Orders<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="product.php"><i class="fas fa-box-open"></i>Products<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="category.php"><i class="fas fa-layer-group"></i><i class="fas fa-caret-right right"></i>Categories</a></li>
                    <li><a href="customer.php"><i class="fas fa-people-arrows"></i>Customers<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="setting.php"><i class="fas fa-wrench"></i>Settings<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="analytic.php"><i class="fas fa-chart-pie"></i>Analytics<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="feedback.php"><i class="fas fa-heart"></i>Feedbacks<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="subscription.php"><i class="fas fa-thumbs-up"></i>Likes<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="notification.php"><i class="fas fa-envelope"></i>Messages<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="order.php"><i class="fas fa-handshake"></i>Support<i class="fas fa-caret-right right"></i></a></li>
                </ul>
            </div>
                <div class="charts-container" id="charts-container">
                    <div class="big-container">
                    <canvas id="weatherChart"></canvas>
                
                    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // fetch('/fetch-chart-data')
                .then(response => response.json())
                .then(data => {
                    const labels = data.labels;
                    const values = data.values;
                    const barColors = [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)', 
                        'rgba(255, 206, 86, 0.6)', 
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ];

                    const ctx = document.getElementById('weatherChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Temperature (°C)',
                                data: values,
                                backgroundColor: barColors,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2
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
                })
                .catch(error => {
                    console.error('Error fetching chart data:', error);
                });
        });
    </script>
            </div>
            <div class="small-containers">
        <div class="small-container draggable dropzone" id="container1">
        <canvas id="secondChart"></canvas>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // fetch('/fetch-second-chart-data')
                .then(response => response.json())
                .then(data => {
                    const labels = data.labels;
                    const values = data.values;

                    const secondChartCtx = document.getElementById('secondChart').getContext('2d');
                    new Chart(secondChartCtx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Solar Radiations',
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(255, 206, 86, 0.6)'
                                ],
                                hoverOffset: 10, // Adjust the hover effect
                                borderWidth: 2, // Adjust the border width
                                borderColor: 'white', // Set the border color
                            }]
                        },
                        options: {
                            cutout: '80%', // Adjust the size of the center hole
                            rotation: -0.5 * Math.PI, // Rotate the chart to start from the top
                            circumference: 2 * Math.PI, // Make it a full circle
                            animation: {
                                animateRotate: true, // Enable rotation animation
                                animateScale: true, // Enable scale animation
                            },
                            responsive: true,
                            maintainAspectRatio: false, // Allow the chart to resize
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            tooltips: {
                                enabled: true,
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce((previousValue, currentValue, currentIndex, array) => {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return percentage + '%';
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching second chart data:', error);
                });
        });
    </script>
        </div>
        <div class="small-container draggable dropzone" id="container2">
    <canvas id="doughnutChart"></canvas>
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
                    new Chart(doughnutCtx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Cloudy', 'Windy', 'Clear'],
                            datasets: [{
                                label:'Day Types',
                                data: [50, 30, 20],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(255, 206, 86, 0.6)'
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                });
            </script>
</div>
        <div class="small-container draggable dropzone" id="container3">
        <canvas id="lineChart" class="line"></canvas>
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const lineCtx = document.getElementById('lineChart').getContext('2d');
                    new Chart(lineCtx, {
                        type: 'line',
                        data: {
                            labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
                            datasets: [{
                                label: 'Temperature (°C)',
                                data: [25, 28, 22, 30, 27],
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 2,
                                fill: false
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
        <div class="small-container draggable dropzone" id="container4">
        <canvas id="polarAreaChart"></canvas>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const polarAreaCtx = document.getElementById('polarAreaChart').getContext('2d');
                new Chart(polarAreaCtx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Sunny', 'Cloudy', 'Rainy', 'Windy', 'Snowy'],
                        datasets: [{
                            data: [20, 30, 40, 50, 60],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ],
                            hoverOffset: 4
                        }]
                    }
                });
            });
        </script>
        </div>
    </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

    </div>
</body>
</html>
