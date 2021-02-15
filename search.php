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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    


    <div class="container my-1">
        <h3>Search Results for:-<em><?php echo $_GET['search'] ?></em></h3>

        <?php  
        $noresults = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM thread WHERE (CONCAT(thread_title, thread_desc) LIKE '%$query%')"; 
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc']; 
            $thread_id= $row['thread_id'];
            $url = "thread.php?threadid=". $thread_id;
            $noresults = false;

            echo '<div class="result">
                        <h3><a href="'. $url. '" class="text-bold">'. $title. '</a> </h3>
                        <p>'. $desc .'</p>
                  </div>'; 
            }

            if ($noresults){
                echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Results Found</p>
                            <p class="lead mx-2"> Suggestions: <ul>
                                    <li class="mx-2">Make sure that all words are spelled correctly.</li>
                                    <li class="mx-2">Try different keywords.</li>
                                    <li class="mx-2">Try more general keywords. </li></ul>
                            </p>
                        </div>
                     </div>';
            }        
        ?>




    </div>






    <style>
    /* Style to change separator  */
    .breadcrumb-item+.breadcrumb-item::before {
        content: none;
    }
    </style>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


</body>

</html>