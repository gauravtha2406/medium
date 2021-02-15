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
   
   $id =$_GET['threadid'];

   $sql ="SELECT * FROM `thread` WHERE thread_id =$id";
   $result =mysqli_query($conn,$sql);
                     while($row =mysqli_fetch_assoc($result))
                     {      
                        $threadname =$row['thread_title'];
                         $threaddesc =$row['thread_desc'];
                         $threadid =$row['thread_id'];
                    }  
   ?>

    <?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
      
      $comment_desc =$_POST['comment_desc'];
      $sno =$_POST['Id'];
      $comment = str_replace("<", "&lt;", $comment);
      $comment = str_replace(">", "&gt;", $comment); 
     $sql= "INSERT INTO `comment` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment_desc', '$id','$sno', current_timestamp())";
       
     $result =mysqli_query($conn,$sql);

     $showalert =true;
     
    
    if($showalert)
    {
       echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
       <strong>Success!</strong> You Comment Has been Successfully Submitted
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';

    }

      

}


?>


    <div class="container my-2">

        <div class="jumbotron">
            <h1 class="display-4 text-center"> <?php echo $threadname ;?></h1>
            <p class="lead"><?php echo $threaddesc ;?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times
            </p>
            <p>Posted by :-Gaurav Thakur</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

     

    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true)
      {
       echo '<div class="container">
        <h3 class="text-center"> Post Comments </h3>
        <form action=" '. $_SERVER['REQUEST_URI'].' " method="post">

            <div class="form-group">
                <label for="desc">Type your comments here</label>
                <textarea class="form-control" id="query_desc" name="comment_desc" rows="3"></textarea>
                <input type ="hidden" name ="Id" value ="'.$_SESSION["Id"].'">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>';

      }

      else
      {
        echo '<div class="container">
        <h3 class="text-center"> Ask your Query </h3>
        <p class="lead">Your are not logged in....Please log in Continue</p>
        
        </div>';


      }
      ?>


    <!-- category  -->




    <div class="container my-3">
        <h3 class="py-2">Comments</h3>
        <?php  
         
         $id =$_GET['threadid'];
   $noresult =true;
   $sql ="SELECT * FROM `comment` WHERE thread_id =$id";
   $result =mysqli_query($conn,$sql);
                     while($row =mysqli_fetch_assoc($result))
                     {     $noresult =false ;
                         $content =$row['comment_content'];
                         $id =$row['comment_id'];
                         $comment_time =$row['comment_time'];
                         $threaduserid=$row['comment_by'];
                         
                         $sql2 ="SELECT * FROM `users` WHERE Id =$threaduserid";
                         $result2 =mysqli_query($conn ,$sql2);
                         $row2 =mysqli_fetch_assoc($result2); 
                        

                         echo '<div class="media my-2">
                         <img src="./images/user.jpg" width="28px" class="mr-3" alt="...">
                         <div class="media-body">
                         <p class="font-weight-bold my-0"> By '.$row2['username'].' at '.$comment_time.'</p>
                            '.$content.'
                         </div>
                     </div> ';
                 
                        
                        
                      } 
                            
                      if($noresult)
                     {
                      echo "<b>NO Comments...</b>";
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