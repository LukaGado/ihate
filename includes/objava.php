<?php 
if(isset($_POST['submit'])){
 			$kod = $_SESSION['vercode'];
 			$username = mysqli_real_escape_string($db, $_POST['username']);
			$post = mysqli_real_escape_string($db, $_POST['post']);
			$broj = 0;
 			if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='' OR $_POST['post'] == '')  { 
				echo  '<div class="alert alert-danger" role="alert">Morate popuniti sva polja!</div>';
				header("Refresh:2;url=index.php");
				}else{ 	
					if($username == ''){
						$username = 'Anonimni ljuti lik';
					}
					if(strlen($post) > 500){
						echo  '<div class="alert alert-danger" role="alert">Post predugacak! Maksimalan broj znakova je 500!</div>';
						header("Refresh:2;url=index.php");
					}else{
						$sql = "INSERT INTO  `mrznja`.`postovi` (`id` ,`username` ,`post` ,`broj_pregleda` ,`datum`)VALUES (NULL ,  '$username',  '$post',  '$broj', NOW())";

					$result = mysqli_query($db, $sql);
					if(!$result){
						echo 'Došlo je do pogreške!';
					}else{
						echo '<div class="alert alert-success" role="alert">Uspješno ste objavili post!</div>';
						header("Refresh:2;url=index.php");
					}
					}

					
 				}
 			}

 ?>