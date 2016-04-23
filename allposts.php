<?php 
	include 'includes/db.php';
	session_start();

	//ZA PRISTUP ADMIN PANELU
	//if($_SESSION['admin'] != 'admin'){
	//	header("Location: index.php");
	//}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<?php 
 	// Izlistanje postova i brisanje istih
 	$sql = "SELECT * FROM mrznja.postovi ORDER BY id DESC";
 	$result = mysqli_query($db, $sql);
 	if(!$result){
 		echo 'Greška pri dohvaćanju svih podataka!';
 	}else{
 		while($row = mysqli_fetch_assoc($result)){
 			echo 'ID: ' . $row['id'] . '<br>';
 			echo 'Korisnik: ' . $row['username'] . '<br>';
 			echo 'Objava: ' . $row['post'] . '<br>';
 			echo 'Datum objave: ' . $row['datum'] . '<br>';
 			$url = 'comments.php?id='.$row['id'];
 			echo '<a href="'.$url.'" title="">Komentari</a>';
 			echo '<form action="allposts.php" method="post" accept-charset="utf-8">
 				  <input type="hidden" value="'.$row['id'].'" name="id">
 				  <input type="submit" value="Obriši" name="delete">
 				  </form><br>';
 		}
 	}

	if(isset($_POST['delete'])){
 		$id = $_POST['id'];
 		$sql = "DELETE FROM mrznja.postovi WHERE id = $id";
 		$result = mysqli_query($db, $sql);
 		if(!$result){
 			echo 'ne radi';
 		}else{
 			echo '<br>Uspješno ste obrisali oglas '. $id;
			header("Refresh:2;url=allposts.php");
 		}
 	}

  ?>
 </body>
 </html>
