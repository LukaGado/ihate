<?php 
	// connect to the database
	include 'includes/db.php';
     $post_id= $_GET['id'];  // get the post title in a variable     
     $cookie_name = str_replace(" ", "-", $post_id); //create cookie name        

	//check for the session and cookie  
     if (!isset($_SESSION[$post_id]) && !isset($_COOKIE [$cookie_name]) ) {         

	//if no cookie and no session then set a cookie and a session for the post
     $_SESSION[$post_id] = $post_id; 
     setcookie($cookie_name, $post_id, time() + (86400 * 7), "/"); // 86400 = 1 day 
     $_COOKIE[$cookie_name] = $post_id;       

	//run a query to increment the views count for the post by 1 
     $query="UPDATE mrznja.postovi SET broj_pregleda = broj_pregleda+1 WHERE id ='$post_id'"; 
     mysqli_query($db, $query); 
   } 
 ?>
<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Svi se mrzimo!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 </head>
 <body>
<nav class="navbar navbar-default navbar-fixed-top col-md-offset-1 col-md-8">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img alt="MrzimTo" src="img/square.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="posts.php?page=1">Haterz</a></li>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- <div class="container">
    <div class="row"> -->
        <div class="col-md-offset-1 col-md-8 wrapper single-hate">
            <?php 
                $id = $_GET['id'];

                $sql = "SELECT * FROM mrznja.postovi WHERE id=$id";
                $result = mysqli_query($db, $sql);

                if (mysqli_num_rows($result) > 0) {
                // Za svaku objavu
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="hate-item-full">';
                     echo '<div class=" hate-id">' . $row["id"]. "</div>". '<div class="hate-author"> - Objavio: ' . $row["username"]. "</div>" . '<div class="hate-post-full"> - Post: <br>' .'<p>'. $row["post"].'</p>'. "</div>".  "<br>". '<div class="hate-counter"> - Broj pregleda:'. $row['broj_pregleda'] . '</div>' . '<div class="hate-date"> - Datum: ' . $row['datum'] .'</div>';
                     echo '</div>';   
                   }
                    
                } else {
                    echo "0 objava";
                }


                 //NEXT i PREV buttoni
                 $url = 'pregled.php?id=' . $id;
                 $sql = "SELECT * FROM mrznja.postovi WHERE id = (SELECT MAX(id) FROM mrznja.postovi)";
                 $result = mysqli_query($db, $sql);
                 if(!$result){
                  echo 'Ne radi';
                 }else{
                    while($row = mysqli_fetch_assoc($result)){
                      $najveci = $row['id'];
                      if($id == $najveci){
                        $id--;
                        $prev = 'pregled.php?id=' . $id;
                        echo '<a href="'.$prev.'" title="Previous button">Prijašnji</a>';
                      }elseif($id == 0){
                        $next = $id;
                        $next++;
                        $urlnext = 'pregled.php?id=' . $next;
                        echo '<a href="'.$urlnext.'" title="Previous button">Sljedeći</a>';
                      }else{
                        $next = $id;
                        $next++;
                        $prev = $id;
                        $prev--;
                        $nexturl = 'pregled.php?id=' . $next;
                        $prevurl = 'pregled.php?id=' . $prev;
                        echo '<a href="'.$nexturl.'" title="Next button"><span class="glyphicon glyphicon-chevron-left"></span>Sljedeći</a>';
                        echo '<a href="'.$prevurl.'" title="Previous button">Prijašnji<span class="glyphicon glyphicon-chevron-right"></span></a>';
                      }
                    }
         
                 }


                
             ?>
         </div>
   <!-- </div> end row -->
<!-- </div> end container -->

</body>

</html>