<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512...">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <li><a href="subscription.php"><i class="fas fa-thumbs-up"></i>Subscriptions<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="notification.php"><i class="fas fa-envelope"></i>Notifications<i class="fas fa-caret-right right"></i></a></li>
                    <li><a href="order.php"><i class="fas fa-handshake"></i>Support<i class="fas fa-caret-right right"></i></a></li>
                </ul>
            </div>
                <div class="charts-container" id="charts-container">
                    <div class="big-container">
                    <canvas id="weatherChart"></canvas>
                
                    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/fetch-chart-data')
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
        <div class="small-container" draggable="true">
        <canvas id="doughnutChart"></canvas>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
                    new Chart(doughnutCtx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Red', 'Blue', 'Yellow'],
                            datasets: [{
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
        <div class="small-container" draggable="true">
        <canvas id="lineChart"></canvas>
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
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
        <div class="small-container" draggable="true">
        <canvas id="radarChart"></canvas>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const radarCtx = document.getElementById('radarChart').getContext('2d');
                    new Chart(radarCtx, {
                        type: 'radar',
                        data: {
                            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                            datasets: [{
                                label: 'Dataset 1',
                                data: [20, 40, 60, 80, 100],
                                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 2
                            }]
                        }
                    });
                });
            </script>
        </div>
        <div class="small-container" draggable="true">
        <canvas id="polarAreaChart"></canvas>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const polarAreaCtx = document.getElementById('polarAreaChart').getContext('2d');
                new Chart(polarAreaCtx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
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
        <!-- @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
        @endpush -->
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>
</html>
