<?php 
if(isset($_POST['submit'])){
 			$kod = $_SESSION['vercode'];
 			$username = mysqli_real_escape_string($db, $_POST['username']);
			$post = mysqli_real_escape_string($db, $_POST['post']);
			$broj = 1;

 			if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='' OR $_POST['post'] == '')  { 
				echo  'Morate popuniti sva polja!';
				header("Refresh:2;url=index.php");
				}else{ 	
					if($username == ''){
						$username = 'Anonimni ljuti lik';
					}
					$sql = "INSERT INTO  `mrznja`.`postovi` (`id` ,`username` ,`post` ,`broj_pregleda` ,`datum`)VALUES (NULL ,  '$username',  '$post',  '$broj', NOW())";

					$result = mysqli_query($db, $sql);
					if(!$result){
						echo 'Došlo je do pogreške!';
					}else{
						echo 'Uspješno ste objavili post!';
						header("Refresh:2;url=index.php");
					}
 				}
 			}

 ?>