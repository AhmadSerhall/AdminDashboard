<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512...">

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
                    <li><a href="user.php">Users</a></li>
                    <li><a href="order.php">Orders</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="category.php">Categories</a></li>
                    <li><a href="customer.php">Customers</a></li>
                    <li><a href="setting.php">Settings</a></li>
                    <li><a href="analytic.php">Analytics</a></li>
                    <li><a href="feedback.php">Feedbacks</a></li>
                    <li><a href="subscription.php">Subscriptions</a></li>
                    <li><a href="notification.php">Notifications</a></li>
                    <li><a href="order.php">Support</a></li>
                </ul>
            </div>
        </div>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>

        </script>
    </div>
</body>
</html>
