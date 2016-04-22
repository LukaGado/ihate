<?php 
	include 'includes/db.php';
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
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="posts.php">Haterz</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Falling Haterz <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <div class="col-lg-5" style="float:right">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="traži...">
          <span class="input-group-btn">
        <button class="btn btn-default" type="button">Traži!</button>
          </span>
      </div><!-- /input-group -->
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-8">
            <form action="index.php" method="POST" charset="utf-8">
              <div class="form-group col-xs-4">
                <label class="control-label col-sm-2" for="username">Nadimak:</label><br> 
                <input class="form-control" type="text" id="username" name="username"></div><br>
             <div class="form-group col-xs-5">
                <label class="control-label col-sm-2" for="post">Post:</label><br>
                <textarea class="form-control" rows="3" name="post" id="post" onkeyup="countChar(this)"></textarea></div><br>
              <p>Preostalo znakova:</p><div id="charNum"></div>
             <div class="form-group col-xs-2"><label class="control-label col-sm-2" for="vercode">Unesite kod:</label> <img src="includes/captcha.php" class="nowidth"> &nbsp <br> <input class="form-control" type="text" name="vercode" /></div><br>
              <input type="submit" name="submit" value="Objavi">
            </form>
        </div>
    </div><!-- end row -->
</div><!-- end container -->



  



 	<?php 
		session_start();
		
		//Za predaju mržnje
 		include 'includes/objava.php';
 	 ?>
		
 	
 </body>
 </html>