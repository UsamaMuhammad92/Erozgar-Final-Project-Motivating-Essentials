<?php

session_start();

$db_name = "MotivatingEssentials";
$db_user = "root";
$db_pass = "";
$db_host = "localhost";

//Creating connection
$connect = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection

if ($connect->connect_error){
    echo "connection error";
}

$Quote = '';
$Author = '';
$Book = '';

// Saving Quote Information

if (isset($_POST['save'])){
    $Quote = $_POST['quote'];
    $Author = $_POST['author'];
        
    $connect->query("INSERT INTO quotes (Quote, Author) VALUES('$Quote', '$Author')")
        or die($connect->error);

    $_SESSION['message'] = "Quote Record has been saved.";
    $_SESSION['msg_type'] = "success";
    
    header("location: admin.php");

}

// Saving Book Information

if (isset($_POST['save1'])){
    $Book = $_POST['book'];
    $Author = $_POST['author'];
        
    $connect->query("INSERT INTO books (Book, Author) VALUES('$Book', '$Author')")
        or die($connect->error);
    
    $_SESSION['message'] = "Book Record has been saved.";
    $_SESSION['msg_type'] = "success";
    
    header("location: admin.php");
}

// Deleting Quote Record

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $connect->query("DELETE FROM `quotes` WHERE `quotes`.`S.No.` = $sno") or die($connect->error());

    $_SESSION['message'] = "Quote Record has been deleted.";
    $_SESSION['msg_type'] = "danger";
    
    header("location: admin.php");
}


//Editing Quote Information

if(isset($_GET['edit'])){
    $sno = $_GET['edit'];
    $result = $connect->query("SELECT * FROM 'quotes' WHERE 'S.No.'=$sno");
    
     if($result){
        $row = $result->fetch_array();
        $Quote = $row['Quote'];
        $Author = $row['Author'];
    }

    /*$_SESSION['message'] = "Quote Record has been deleted.";
    $_SESSION['msg_type'] = "danger";
    
    header("location: admin.php");*/
}


// Deleting Book Record

if(isset($_GET['delete1'])){
    $sno = $_GET['delete1'];
    $connect->query("DELETE FROM `books` WHERE `books`.`S.No.` = $sno") or die($connect->error());
    
    $_SESSION['message'] = "Book Record has been deleted.";
    $_SESSION['msg_type'] = "danger";
    
    header("location: admin.php");

}

/*//Admin Login
if(isset($_POST['adminlogin'])){
    $username = mysqli_real_escape_string($connect, $POST['username']);
    $password = mysqli_real_escape_string($connect, $POST['password']);
    
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    
    if(empty($password)){
        array_push($errors, "Password is required");
    }
    
    if(count($errors) == 0){
        
        $password = md5($password);
        $query = "SELECT username FROM admin WHERE username='$username' AND
        password='$password'";
        
        
        /*$password = md5($password);
        
        $query = "SELECT * FROM admin WHERE username='$username' AND
        password='$password'";
        $results = mysqli_query($connect, $query);
        echo($results);
        
        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header('location: index.html');
        }else{
            array_push($errors, "Wrong Username or Password. Please try again.");
        }
    }
}*/


?>