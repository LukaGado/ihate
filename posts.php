<?php 
	include 'includes/db.php';

	$sql = "SELECT * FROM mrznja.postovi ORDER BY id DESC limit 0,30";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Broj objave: " . $row["id"]. "<br> - Objavio: " . $row["username"]. "<br> - Post: " . $row["post"]. "<br>". " - Broj pregleda:". $row['broj_pregleda'] ."<br> - Datum: " . $row['datum'] . "<br>";
        //Stvaranje URL-a
			$url = 'pregled.php?id=' . $row['id'];
			echo '<a href="' . $url . '">Pogledajte objavu</a><br>';
			echo '<br>';		 }
	} else {
	    echo "0 objava";
	}
	
 ?>