<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 require 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    // $row=mysqli_fetch_assoc($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){
            // if ($password ==$row['password']) { 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['Id'] =$row['Id'];
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
                  

    
?>







<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./partials/style.css">
    <title>Hello, world!</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="medium-nav">
                <img src="./images/a.png" class="medium-logo" alt="">
            </div>

            <a class="navbar-brand medium-heading" href="#">Medium</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>




            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">

                <form class="my-2 medium-search mx-auto">
                    <input class="form-control medium-placeholder mr-2" type="search"
                        placeholder="Search to Save learn and Earn">
                    <button class="btn btn-outline-success  medium-btn" type="submit">Search</button>
                </form>



                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Javascript</a>
                            <a class="dropdown-item" href="#">PHP</a>
                            <a class="dropdown-item" href="#">C++</a>
                            <a class="dropdown-item" href="#">Java</a>
                            <a class="dropdown-item" href="#">Python</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Contact Us </a>
                    </li>
                </ul>

            </div>

        </nav>


        <!-- breadcrumb -->
        <nav aria-label="breadcrumb ">

            <div class="medium-bread">

                <ol class="breadcrumb ">
                    <div class="breadcrumb-links">
                        <li class="breadcrumb-item bred active" aria-current="page"><a href="#"><i
                                    class="fa fa fa-desktop">Home</i></a></li>
                        <li class="breadcrumb-item bred divider" aria-current="page"><a href="#"><i
                                    class="fas fa-plus">Latest</i></a></li>
                        <li class="breadcrumb-item bred divider" aria-current="page"><a href="#"><i
                                    class="fa fa-sign-in">Login</i></a></li>
                        <li class="breadcrumb-item bred " aria-current="page"><a href="#">
                                <i class="fa fa-user-plus">Sign UP</i></a></li>
                    </div>

                    <div class="social-link ">
                        <a href="#"><i class="fa fa-twitter "></i></a>
                        <a href="#"><i class="fa fa-google "></i></a>
                        <a href="#"><i class="fa fa-linkedin "></i></a>
                        <a href="#"><i class="fa fa-instagram "></i></a>
                        <a href="#"><i class="fa fa-github "></i></a>
                    </div>


                </ol>


            </div>
        </nav>
          
        <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    </header>

    <!-- Login Page -->
    <div class="container ">
        <h2 class="text-center">Login To Forum</h2>
        <hr>
        <form action="/medium/login.php" method="post">
            <div class="form-group my-2">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="username" name ="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name ="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>







    <style>
    /* Style to change separator  */
    .breadcrumb-item+.breadcrumb-item::before {
        content: none;
    }
    </style>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>


</body>

</html>