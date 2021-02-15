
<?php
session_start();

 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
     echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
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
             
            
            
         </ul>

     </div>

 </nav>';
 }

     
 
 echo '<div class="container my-3">

 <h2 class="cat-heading text-center">Available Categories</h2>

 <div class="row">';
 ?>
               <?php
               include 'partials/_dbconnect.php';
           $sql ="SELECT * FROM `category`";
              
              $result =mysqli_query($conn,$sql);
              while($row =mysqli_fetch_assoc($result))
              {      
                  $cat =$row['cat_name'];
                  $desc =$row['cat_desc'];
                  $id =$row['cat_id'];

              }
              ?> 

                 
                  <div class="col-md-4 my-2 ">
                  <div class="card" style="width: 18rem;">
                      <img src="https://source.unsplash.com/500x400/?'.$cat.',coding" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href ="threadlist.php?catid='.$id.'"> <?php '.$cat.'?> </a></h5>
                          <p class="card-text"><?php '.substr($desc ,0,30).'?>....</p>
                          <a href="threadlist.php?catid='.$id.'" class="btn btn-primary m-auto d-block">Click to Visit</a>
                      </div>
                  </div>
              </div>';



              }

        

     
 echo '</div>

</div>

