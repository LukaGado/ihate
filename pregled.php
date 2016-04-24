<?php 
    // connect to the database
    include 'includes/db.php';
     $post_id= $_GET['id'];  // get the post title in a variable     
     $cookie_name = str_replace(" ", "-", $post_id); //create cookie name        
    //check for the session and cookie  
     if (!isset($_SESSION[$post_id]) && !isset($_COOKIE [$cookie_name]) ) {         
    //if no cookie and no session then set a cookie and a session for the post
     $_SESSION[$post_id] = $post_id; 
     setcookie($cookie_name, $post_id, time() + (86400 * 7), "/"); // 86400 = 1 day 
     $_COOKIE[$cookie_name] = $post_id;       
    //run a query to increment the views count for the post by 1 
     $query="UPDATE mrznja.postovi SET broj_pregleda = broj_pregleda+1 WHERE id ='$post_id'"; 
     mysqli_query($db, $query); 
   } 
   include 'header.html';
 ?>


    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };
    </script>

<!-- <div class="container">
    <div class="row"> -->
        <div class="col-md-offset-1 col-md-8 wrapper single-hate">
            <?php 
                $id = $_GET['id'];
                $sql = "SELECT * FROM mrznja.postovi WHERE id=$id";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                // Za svaku objavu
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="hate-item-full">';
                     echo '<div class=" hate-id">' . $row["id"]. "</div>". '<div class="hate-author"> - Objavio: ' . $row["username"]. "</div>" . '<div class="hate-post-full"> - Post: <br>' .'<p>'. $row["post"].'</p>'. "</div>".  "<br>". '<div class="hate-counter"> - Broj pregleda:'. $row['broj_pregleda'] . '</div>' . '<div class="hate-date"> - Datum: ' . $row['datum'] .'</div>';
                     echo '</div>';   
                   }
                } else {
                    echo '0 Objava';
                }
                ?>
                <!-- KOMENTARI -->
                <form action="postcomment.php" method="POST" accept-charset="UTF-8">
                    Korisničko ime: <input type="text" name="username" id="username">
                    Komentar: <textarea name="komentar" id="komentar">Upišite komentar</textarea>
                    <?php
                        $id = $_GET['id'];
                        echo '<input type="hidden" name="id" id="id" value="'.$id.'">';
                     ?>
                    <input type="submit" value="Komentiraj" name="odgovor">
                </form>
                
                 <?php 
                 //NEXT i PREV buttoni
                 $url = 'pregled.php?id=' . $id;
                 $sql = "SELECT * FROM mrznja.postovi WHERE id = (SELECT MAX(id) FROM mrznja.postovi)";
                 $result = mysqli_query($db, $sql);
                 if(!$result){
                  echo 'Ne radi';
                 }else{
                    while($row = mysqli_fetch_assoc($result)){
                      $najveci = $row['id'];
                      if($id == $najveci){
                        $id--;
                        $prev = 'pregled.php?id=' . $id;
                        echo '<a href="'.$prev.'" title="Previous button">Prijašnji</a>';
                      }elseif($id == 0){
                        $next = $id;
                        $next++;
                        $urlnext = 'pregled.php?id=' . $next;
                        echo '<a href="'.$urlnext.'" title="Previous button">Sljedeći</a>';
                      }else{
                        $next = $id;
                        $next++;
                        $prev = $id;
                        $prev--;
                        $nexturl = 'pregled.php?id=' . $next;
                        $prevurl = 'pregled.php?id=' . $prev;
                        echo '<a href="'.$nexturl.'" title="Next button" id="next" name="next"><span class="glyphicon glyphicon-chevron-left"></span>Sljedeći</a>';
                        echo '<a href="'.$prevurl.'" title="Previous button">Prijašnji<span class="glyphicon glyphicon-chevron-right"></span></a>';
                      }
                    }
         
                 }  
             ?>
         </div>
   <!-- </div> end row -->
<!-- </div> end container -->


        
        <?php 
            //Ispis komentara
            $id = $_GET['id'];
            $sql = "SELECT * FROM mrznja.komentari WHERE post_id=$id ORDER BY ID DESC";
            $result = mysqli_query($db, $sql);
            if(!$result){
                echo 'Greška prilikom dohvaćanja komentara';
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    echo '<br>#: ' . $row['id']. '<br>';
                    echo 'Komentar: ' . $row['komentar'] . '<br>';
                    echo 'Korisnik: ' . $row['username'] . '<br>';
                }
            }
         ?>



</body>

</html>