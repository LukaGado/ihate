<?php 
	//Najpopularniji po broju pregleda
	include 'includes/db.php';

	//POTREBAN CRON JOB
/*
	$dan = date("d");
	$mjesec = date("m");

	$sql = "SELECT id, username, post, MAX(broj_pregleda), datum FROM mrznja.postovi";
	$result = mysqli_query($db, $sql);
	if(!$result){
		echo 'Greška kod dohvaćanja datuma';
	}else{
		while($row = mysqli_fetch_assoc($result)){
			$time = strtotime($row['datum']);
			$mjesec_p = date('m', $time);
			$dan_p = date('d', $time);
			if($dan == $dan_p && $mjesec == $mjesec_p ){
				$sql = "INSERT INTO mrznja.najpopularniji ('id', 'post_id') VALUES (NULL, '$row['id])";
			}
		}
	} */

	$sql = "SELECT id, username, post, broj_pregleda, MAX(broj_pregleda), datum FROM mrznja.postovi";
	$result = mysqli_query($db, $sql);
	if(!$result){
		echo 'Greška kod dohvaćanja najvećeg broja pregleda!';
	}else{
		while($row = mysqli_fetch_assoc($result)){
			echo 'Najpopularniji na današnji dan!<br>';
			echo 'ID: ' . $row['id'] . '<br>';
 			echo 'Korisnik: ' . $row['username'] . '<br>';
 			echo 'Objava: ' . $row['post'] . '<br>';
 			echo 'Broj pregleda: ' . $row['broj_pregleda'] . '<br>';
 			echo 'Datum objave: ' . $row['datum'] . '<br>';

 			//$time = strtotime($row['datum']);
			//echo date('m', $time);
			//echo date('d', $time);

		}
	}
 ?>