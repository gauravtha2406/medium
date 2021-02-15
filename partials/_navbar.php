<?php
                 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true)
                 {
                  echo' <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="medium-nav">
                <img src="./images/a.png" class="medium-logo" alt="">
            </div>

            <a class="navbar-brand medium-heading" href="#">Medium</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>




            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
               
                    
                        
                       
                        <form class="my-2 medium-search mx-auto" action="search.php" method="GET">
                        <input class="form-control medium-placeholder mr-2" type="search"
                           name="search" placeholder="Search to Save learn and Earn">
                        <button class="btn btn-outline-success  medium-btn" type="submit">Search</button>
                    </form>
                        <li class="nav-item" style ="list-style:none;">
                        <a class="nav-link" style ="color:floralwhite;" href="#"> <em>Welcome:-</em> ' .$_SESSION['username'].' </a>
                    </li>
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    </ul>
                    </div>
                    </nav>';
                     }
                   
                     else{
                         echo '<ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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


             </ol>';

            }
            ?>

      




        <!-- breadcrumb -->

    <style>
    /* Style to change separator  */
    .breadcrumb-item+.breadcrumb-item::before {
        content: none;
    }
    </style>


   