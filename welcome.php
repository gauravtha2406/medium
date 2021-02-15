
<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./partials/style.css">
    <title>Welcome - <?php echo $_SESSION['username'];?></title>
    
  </head>
  <body>
   
    

  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
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
                    <li class="nav-item active" style ="list-style:none";>
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                     

                    
                    





                </ul>

            </div>

        </nav> -->
            
        <header>

<?php include 'partials/_navbar.php';?>
<?php include 'partials/_dbconnect.php';?>

</header>




    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']; ?></h4>
      <p>Hey how are you doing? Welcome to the Medium Forum You are Successfully logged in as <?php echo $_SESSION['username']?></p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/medium/logout.php"> using this link.</a></p>
    </div>
  </div>

        
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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>