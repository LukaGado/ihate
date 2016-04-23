<?php 
	include 'includes/db.php';
	session_start();

	//ZA PRISTUP ADMIN PANELU
	//if($_SESSION['admin'] != 'admin'){
	//	header("Location: index.php");
	//}


	$id_p = $_GET['id'];
	$sql = "SELECT * FROM mrznja.komentari WHERE post_id=$id_p ORDER BY ID DESC";
            $result = mysqli_query($db, $sql);
            if(!$result){
                echo 'Greška prilikom dohvaćanja komentara';
            }else{
                while($row = mysqli_fetch_assoc($result)){
                	echo $id_p;
                    echo '<br>#: ' . $row['id']. '<br>';
                    echo 'Komentar: ' . $row['komentar'] . '<br>';
                    echo 'Korisnik: ' . $row['username'] . '<br>';
                    echo '<form action="comments.php" method="post" accept-charset="utf-8">
 				 	 <input type="hidden" value="'.$row['id'].'" name="id">
 				 	 <input type="hidden" value="'.$id_p.'" name="id_p">
 				  	 <input type="submit" value="Obriši" name="delete">
 				  	 </form><br>';
                }
            }

    if(isset($_POST['delete'])){
    	$id_k = $_POST['id'];
    	$id_p = $_POST['id_p'];
 		$sql = "DELETE FROM mrznja.komentari WHERE id = $id_k";
 		$result = mysqli_query($db, $sql);
 		if(!$result){
 			echo 'ne radi';
 		}else{
 			echo '<br>Uspješno ste obrisali komentar '. $id_k;
 			$url = 'comments.php?id='.$id_p;
			header('Location:'.$url);
 		}
    }
?>