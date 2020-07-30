<?php include 'process.php'?>
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

        <main>
            
            <!--Quote Information-->

            <?php require_once 'process1.php' ; ?>
            
            <!--Message for updating Record-->
            <?php
            if (isset($_SESSION['message'])): ?>
            
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
            <?php endif ?>
            
            <!--Fetching Quote Data from database-->
            
            <div class="container">

                <?php
                $connect = new mysqli('localhost', 'root', '', 'motivatingessentials') or die(mysqli_error($connect));
                $result = $connect->query("SELECT * FROM quotes") or die($connect->error);
                ?>

                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Quote</th>
                                <th>Author</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                            while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['Quote'];?></td>
                                    <td><?php echo $row['Author'];?></td>
                            <td>
                                <a href="admin.php?edit=<?php echo $row['S.No.']; ?>" class="btn btn-info mr-2">Edit</a>
                                
                                <a href="process.php?delete=<?php echo $row['S.No.']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
            
            <!--Form to get Quote Information-->
            
            <div class="col-lg-6 m-auto">
                <form method="post" class="mt-5 mb-5" action="admin.php">
                    <h2 class="text-center txtColor1 pb-2">Quote Information</h2>
                    <!--<div class="form-group">
                        <label>S.No.</label>
                        <input type="number" name="sno" class="form-control">
                    </div>-->
                    <div class="form-group pb-3">
                        <label>Quote</label>
                        <input type="text" name="quote" class="form-control" placeholder="Enter Quote" value="<?php echo $Quote; ?>">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter author of Quote" value="<?php echo $Author; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                </form>
            </div>

            
            
            <!--Book Information-->
            
            <?php require_once 'process1.php' ; ?>

            <!--Message for updating Record-->
            <?php
            if (isset($_SESSION['message'])): ?>
            
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
            <?php endif ?>

            
            <!--Fetching Book Data from database-->

            <div class="container">

                <?php
                $connect = new mysqli('localhost', 'root', '', 'motivatingessentials') or die(mysqli_error($connect));
                $result = $connect->query("SELECT * FROM books") or die($connect->error);
                ?>

                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Author</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                            while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['Book'];?></td>
                                    <td><?php echo $row['Author'];?></td>
                            <td>
                                <a href="admin.php?edit1=<?php echo $row['S.No.']; ?>" class="btn btn-info mr-2">Edit</a>
                                
                                <a href="process.php?delete1=<?php echo $row['S.No.']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
            
            <!--Form to get Book Information-->
            
            <div class="col-lg-6 m-auto">
                <h2 class="text-center txtColor1 pb-2">Book Information</h2>
                <form method="post" class="mb-5" action="admin.php">


                    <!--<div class="form-group">
                        <label>S.No.</label>
                        <input type="number" name="sno" class="form-control">
                    </div>-->
                    <div class="form-group pb-3">
                        <label>Book</label>
                        <input type="text" name="book" class="form-control" placeholder="Enter Book Name">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter author of Book">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save1">Save</button>
                    </div>
                </form>
            </div>
        </main>

    </header>
    
    <!--Footer-->
    <footer class="foo txtColor text-center">
        <p>&#169; 2020</p>
        <p>Home | Quotes | Books | About | Contact</p>
        <p><a href="#" id="adminArea">Admin Area</a></p>
    </footer>
</body>

</html>