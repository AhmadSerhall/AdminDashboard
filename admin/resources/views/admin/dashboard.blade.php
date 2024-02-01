<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <li><a href="users.php">users</a></li>
                    <li><a href="order.php">order</a></li>
                    <li><a href="order.php">offers</a></li>
                    <li><a href="order.php">revenu</a></li>
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
