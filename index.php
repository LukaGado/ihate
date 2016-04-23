<?php 
include 'includes/db.php';
    session_start();
    
    //Za predaju mržnje
  include 'includes/objava.php';
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
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };
    </script>
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
      <a class="navbar-brand" href="#">
        <img alt="MrzimTo" src="img/square.png">
      </a>
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

<!-- <div class="container">
    <div class="row"> -->
        <div class="col-md-offset-1 col-md-8 wrapper">
          <div class="index-left col-md-offset-1 col-md-7">
            <form action="index.php" method="POST" charset="utf-8">
              <div class="form-group col-xs-6">
                <label class="control-label col-sm-2" for="username">Nadimak:</label><br> 
                <input class="form-control" type="text" id="username" name="username"></div>
             <div class="form-group col-xs-10">
                <label class="control-label col-sm-2" for="post">Post:</label><br>
                <textarea class="form-control" rows="3" maxlength="500" name="post" id="post" onkeyup="countChar(this)"></textarea></div>
              <div class="control-label col-sm-5">
                <p style="float:left;">Preostalo znakova:&nbsp</p>
                <div id="charNum">500</div></div>
             <div class="form-group col-xs-4">
                <label class="control-label" for="vercode">Unesite kod:</label> 
                <img src="includes/captcha.php" class="nowidth"> &nbsp <input class="form-control" type="text" name="vercode" style="margin-top:10px;" /></div><br>
                <button class="btn btn-hate btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-fire"></span> Mrzi!</button>
                </form>
              </div> <!-- end index-left -->
                <div class="right-image col-md-5">
                  <img src="img/angry-sheep.png" />
                </div>

                <div style="clear:both;"></div>          
        </div>
   <!-- </div> end row -->
<!--</div> end container -->

 </body>
 </html>