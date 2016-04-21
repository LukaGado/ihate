<?php 
	include 'includes/db.php';
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Svi se mrzimo!</title>
 	<link rel="stylesheet" href="styles/style.css">
 	<script src="http://code.jquery.com/jquery-1.5.js"></script>
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

 	<form action="index.php" method="POST" charset="utf-8">
 		Nadimak:<br> <input type="text" id="username" name="username"><br>
 		Post: <br><textarea name="post" id="post" onkeyup="countChar(this)"></textarea><br>
 		<p>Preostalo znakova:</p><div id="charNum"></div>
 		Unesite kod: <img src="includes/captcha.php"> &nbsp <br> <input type="text" name="vercode" /><br>
 		<input type="submit" name="submit" value="Objavi">
 	</form>

 	<?php 
		session_start();
		
		//Za predaju mržnje
 		include 'includes/objava.php';
 	 ?>
		
 	
 </body>
 </html>