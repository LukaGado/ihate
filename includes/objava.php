<?php 
if(isset($_POST['submit'])){
 			$kod = $_SESSION['vercode'];
 			$username = mysqli_real_escape_string($db, $_POST['username']);
			$post = mysqli_real_escape_string($db, $_POST['post']);
			$broj = 0;
 			if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='' OR $_POST['post'] == '')  { 
				echo  '<div class="alert alert-danger alert-dismissible fade in col-md-offset-1 col-md-8" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				 </button>
  					<p>Morate popuniti sva polja!</p></div>';
				}else{ 	
					if($username == ''){
						$username = 'Anonimni ljuti lik';
					}
					if(strlen($post) > 500){
						echo  '<div class="alert alert-danger alert-dismissible fade in col-md-offset-1 col-md-8" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				 </button>
  					<p>Post predugačak. Maksimalan broj znakova je 500.</p></div>';
					
					}else{
						$sql = "INSERT INTO  `mrznja`.`postovi` (`id` ,`username` ,`post` ,`broj_pregleda` ,`datum`)VALUES (NULL ,  '$username',  '$post',  '$broj', NOW())";

					$result = mysqli_query($db, $sql);
					if(!$result){
						echo 'Došlo je do pogreške!';
					}else{
						echo '<div class="alert alert-success alert-dismissible fade in col-md-offset-1 col-md-8" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				 </button>
  					<p><strong>Uspjeh!</strong>&nbspObjavili ste post!</p></div>';
						header("Refresh:2;url=index.php");
					}
					}

					
 				}
 			}

 ?>