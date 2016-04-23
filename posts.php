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
<nav class="navbar navbar-default navbar-fixed-top">
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
        <li><a href="posts.php">Haterz</a></li>
      </ul>
      <!--  <div class="col-lg-5 hate-search" style="float:right">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="traži...">
          <span class="input-group-btn">
        <button class="btn btn-default" type="button">Traži!</button>
          </span>
      </div>
      </div> -SEARCH -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-8 hate-container">
            <?php 
				include 'includes/db.php';

        //PAGINACIJA
        $rec_limit = 10;
        $sql = "SELECT count(id) FROM mrznja.postovi";
        $retval = mysqli_query($db, $sql);
        if(!$retval) {
            die('Greška kod paginacije: ' . mysql_error());
         }
         $row = mysqli_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];

         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }

         $left_rec = $rec_count - ($page * $rec_limit);
				 $sql = "SELECT * FROM mrznja.postovi ORDER BY id DESC LIMIT $offset, $rec_limit";
				$result = mysqli_query($db, $sql);
				
				if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    	echo '<div class="hate-item">';
			        echo '<div class=" hate-id">' . $row["id"]. "</div>". '<div class="hate-author"> - Objavio: ' . $row["username"]. "</div>" . '<div class="hate-post"> - Post: <br>' .'<p>'. $row["post"].'</p>'. "</div>".  "<br>". '<div class="hate-counter"> - Broj pregleda:'. $row['broj_pregleda'] . '</div>' . '<div class="hate-date"> - Datum: ' . $row['datum'] .'</div>';
			        //Stvaranje URL-a
						$url = 'pregled.php?id=' . $row['id'];
						echo '<div class="hate-see-more"><a href="' . $url . '">Pogledajte objavu</a></div>';
						echo '</div>';		}		 
				} else {
				    echo "0 objava";
				}

         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Prijašnja</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Sljedeća</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Sljedeća</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Prijašnja</a>";
         }
         
         mysql_close($conn);

			 ?>
        </div>
    </div><!-- end row -->
</div><!-- end container -->

</body>

</html>