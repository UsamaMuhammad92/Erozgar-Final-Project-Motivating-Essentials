<!doctype html>
<html lang="en">

<head>
    <title>Motivating Essentials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <!--Row 1 Start-->
    <!--Nav Start-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navData">
            <a class="navbar-brand" href="#">
                <img src="images/mywebsitelogo.png" alt="logo" height="33" width="214">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item pr-3">
                        <a class="nav-link txtColor" href="index.php">Home</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link txtColor" href="admin.php">Quotes</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link txtColor" href="admin.php">Books</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link txtColor" href="#">About</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link txtColor" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--Nav End-->
    </header>
    <!--Row 1 End-->

    <!--Row 2 Start-->
    <div class="container txtColor1">
        <h2 class="row2Heading text-center mt-4 mb-3">Login to get into Admin Area</h2>

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="adminlogin">Submit</button>
        </form>
    </div>
    <!--Row 2 End-->
</body>
</html>