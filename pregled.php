<?php 
	include 'includes/db.php';
	$id = $_GET['id'];

	$sql = "SELECT * FROM mrznja.postovi WHERE id=$id";
	$result = mysqli_query($db, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Broj objave: " . $row["id"]. "<br> - Objavio: " . $row["username"]. "<br> - Post: " . $row["post"]. "<br>". " - Broj pregleda:". $row['broj_pregleda'] ."<br> - Datum: " . $row['datum'] . "<br>";
		$broj = $row['broj_pregleda'];
		$broj++;
		$sql = "UPDATE mrznja.postovi SET broj_pregleda = $broj";
		$result = mysqli_query($db, $sql);
       	 }
	} else {
	    echo "0 objava";
	}

    
 ?>