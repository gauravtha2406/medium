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

                      <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true)
                    {
                        echo'<li class="nav-item">
                        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"> Welcome '.$_SESSION['username'].' </a>
                    </li>';
 


                    }
                       ?>

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



    </header>


           <?php

              if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="true")
              {
                  echo  ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your account is now created and you can login
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div> ';

              }
           ?>



    <!-- header section -->

    <section class="header-section">

        <div class="heading-center">
            <div class="first-heading">
                <h2>Where good ideas find you</h2>
                <p class="medium-rules">Ask questions-Participate-Do not dominate a discussion-Be intellectually
                    rigorous-Read the whole thread before posting-Maintain confidentiality-Report technical problems
                </p>
            </div>
            <div class="heading-buttons">
                <a href="login.php">Login</a>
                <a href="signup.php">Sign UP</a>
            </div>
        </div>

    </section>



    <!-- category  -->

    <div class="container my-3">

        <h2 class="cat-heading text-center">Available Categories</h2>

        <div class="row">
            <?php 
                      include 'partials/_dbconnect.php';
                  $sql ="SELECT * FROM `category`";
                     
                     $result =mysqli_query($conn,$sql);
                     while($row =mysqli_fetch_assoc($result))
                     {      
                         $cat =$row['cat_name'];
                         $desc =$row['cat_desc'];
                         $id =$row['cat_id'];
                         echo '<div class="col-md-4 my-2 ">
                         <div class="card" style="width: 18rem;">
                             <img src="https://source.unsplash.com/500x400/?'.$cat.',coding" class="card-img-top" alt="...">
                             <div class="card-body">
                                 <h5 class="card-title"><a href ="threadlist.php?catid='.$id.'">'.$cat.' </a></h5>
                                 <p class="card-text">'.substr($desc ,0,30).'....</p>
                                 <a href="threadlist.php?catid='.$id.'" class="btn btn-primary m-auto d-block">Click to Visit</a>
                             </div>
                         </div>
                     </div>';



                     }

                  ?>

            
        </div>

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


</body>

</html>