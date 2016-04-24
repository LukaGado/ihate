<?php  
                    include 'includes/db.php';
                    //Spremanje komentara pod odgovarajuci post_id
                        $user = mysqli_real_escape_string($db, $_POST['username']);
                        $id = $_POST['id'];
                        if(empty($user)){
                            $user = 'Anonimni ljuti komentator';
                        }
                        $komentar = mysqli_real_escape_string($db, $_POST['komentar']);
                        if(empty($user) && empty($komentar)){
                            header('Location: pregled.php?id='.$id);
                            echo 'Komentar ne može biti prazan!';
                        }elseif(strlen($komentar)>250){
                            header('Location: pregled.php?id='.$id);
                            echo 'Komentar ne smije sadržavati više od 250 znakova!';
                        }else{
                            $sql = "INSERT INTO  `mrznja`.`komentari` (`id` ,`post_id` ,`username` ,`komentar`) VALUES (NULL , '$id', '$user', '$komentar')";
                            $result = mysqli_query($db, $sql);
                            $url = 'pregled.php?id='.$id;
                            header('Location:'.$url);
                        }

    
                ?>
