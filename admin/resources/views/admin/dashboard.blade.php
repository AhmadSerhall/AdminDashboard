<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512...">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" integrity="sha512...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512..."> -->

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

            </div>
        </div>
        @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
        @endpush
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('/fetch-chart-data')
        .then(response => response.json())
        .then(chartData => {
            var ctx = document.getElementById('charts-container').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
                    datasets: [{
                        label: 'Temperature',
                        data: chartData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
        });
});
</script>

    </div>
</body>
</html>
