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
 			echo $row['post'];
 			echo "<br>";
 			echo '<form action="admin.php" method="post" accept-charset="utf-8">
 				  <input type="hidden" value="'.$row['id'].'" name="id">
 				  <input type="submit" value="Obriši" name="delete">
 				  </form>';
 		}
 	}

	if(isset($_POST['delete'])){
 		$id = $_POST['id'];
 		echo $id;
 		echo 'tu';
 		$sql = "DELETE FROM mrznja.postovi WHERE id = $id";
 		$result = mysqli_query($db, $sql);
 		if(!$result){
 			echo 'ne radi';
 		}else{
 			echo 'Uspješno ste obrisali oglas '. $id;
			header("Refresh:2;url=admin.php");
 		}
 	}

  ?>
</body>
</html>



