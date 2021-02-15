
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./partials/style.css">



</head>

<body>
    <header>

        <?php include 'partials/_navbar.php';?>
        <?php include 'partials/_dbconnect.php';?>

    </header>



    <?php  
   
   $id =$_GET['catid'];

   $sql ="SELECT * FROM `category` WHERE cat_id =$id";
   $result =mysqli_query($conn,$sql);
                     while($row =mysqli_fetch_assoc($result))
                     {      
                         $cat =$row['cat_name'];
                         $desc =$row['cat_desc'];
                        
                     }   



                     ?>


<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
      $th_title =$_POST['title'];
      $th_desc =$_POST['desc'];
      $th_id =$_POST['Id'];
         

        // to save website from potential xss attack
      $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title); 

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc); 
     $sql= "INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_date`) VALUES ( '$th_title', '$th_desc', '$id', '$th_id', current_timestamp())";
       
     $result =mysqli_query($conn,$sql);

     $showalert =true;
     
    
    if($showalert)
    {
       echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
       <strong>Done !</strong> You Query Has been Successfully Submitted
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';

    }

      

}


?>


                     
    <div class="container my-2">

        <div class="jumbotron">
            <h1 class="display-4 text-center">Welcome to <?php echo $cat ;?> Forums</h1>
            <p class="lead"><?php echo $desc ;?></p>
            <hr class="my-4">
            <h4 class="text-center">About Medium</h4>
            <p></p>
            <a class="btn btn-primary btn-lg username" href="#" role="button">Learn more</a>
        </div>
    </div>



    





   



    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true)
     {
         echo'<div class="container">
        <h3 class="text-center"> Ask your Query </h3>
        <form action=" '.$_SERVER['REQUEST_URI'] .'" method="post">
            <div class="form-group">
                <label for="query">Query Title</label>
                <input type="text" class="form-control" id="query_title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Please Ask Valid Queries and follow forums
                    rules</small>
            </div>
            <div class="form-group">
                <label for="desc">Describe Your Query</label>
                <textarea class="form-control" id="query_desc" name="desc" rows="3"></textarea>
                <input type ="hidden" name ="Id" value ="'.$_SESSION["Id"].'">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>';
     }
     else{
         echo '<div class="container">
         <h3 class="text-center"> Ask your Query </h3>
         <p class="lead">Your are not logged in....Please log in Continue</p>
         
         </div>';
     }

      ?>


    <!-- category  -->
          
          



    <div class="container my-3">
        <h3 class="py-2">Browse Questions</h3>
        <?php  
   
   $id =$_GET['catid'];
   $noresult =true;
   $sql ="SELECT * FROM `thread` WHERE thread_cat_id =$id";
   $result =mysqli_query($conn,$sql);
                     while($row =mysqli_fetch_assoc($result))
                     {     $noresult =false ;
                         $threadname =$row['thread_title'];
                         $threaddesc =$row['thread_desc'];
                         $threadid =$row['thread_id'];
                         $threaduserid=$row['thread_user_id'];
                         
                          $sql2 ="SELECT * FROM `users` WHERE Id =$threaduserid";
                          $result2 =mysqli_query($conn ,$sql2);
                          $row2 =mysqli_fetch_assoc($result2); 

                          //echo $row2['username'];
                         echo '<div class="media">
                         <img src="./images/user.jpg" width="28px" class="mr-3" alt="...">
                         <div class="media-body">
                             <p class="mt-0"><a href="thread.php?threadid='.$threadid.'">'.$threadname.'</a>
                             <span style ="margin: auto; display:block;"> <b>Posted by :-</b> '.$row2['username'].'</span></p>
                             '.$threaddesc.' 
                     </div> 
                     </div>';
                        
                        
                      } 
                            
                      if($noresult)
                     {
                      echo "<b>NO QUESTIONS...SUMBIT YOUR QUESTIONS NOW AND START DISCUSSION</b>";
                     }
 ?>






        <!-- <div class="media">
            <img src="./images/user.jpg" width="28px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Unable to install Coding Blocks</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <div class="media">
            <img src="./images/user.jpg" width="28px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Unable to install Coding Blocks</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->


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