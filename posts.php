<?php
include 'header.html';
?>

<!-- <div class="container">
    <div class="row"> -->
        <div class="col-md-offset-1 col-md-8 wrapper hate-container">
            <?php 
      include 'includes/db.php';
      $num_rec_per_page=10;

      if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
      $start_from = ($page-1) * $num_rec_per_page; 
      $sql = "SELECT * FROM mrznja.postovi ORDER BY id DESC LIMIT $start_from, $num_rec_per_page"; 
      $rs_result = mysqli_query ($db, $sql); //run the query

 
      if (mysqli_num_rows($rs_result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($rs_result)) {
            $text = $row['post'];
            $novitext = wordwrap($text, 28, "<br />\n");
            echo '<div class="hate-item">';
              echo '<div class=" hate-id">' . $row["id"]. "</div>". '<div class="hate-author"> - Objavio: ' . $row["username"]. "</div>" . '<div class="hate-post"> - Post: <br>' .'<p>'. $novitext .'</p>'. "</div>".  "<br>". '<div class="hate-counter"> - Broj pregleda:'. $row['broj_pregleda'] . '</div>' . '<div class="hate-date"> - Datum: ' . $row['datum'] .'</div>';
              //Stvaranje URL-a
            $url = 'pregled.php?id=' . $row['id'];
            echo '<div class="hate-see-more"><a href="' . $url . '">Više</a></div>';
            echo '</div>';    }    
        } else {
            echo "0 objava";
        }


      $sql = "SELECT * FROM mrznja.postovi"; 
      $rs_result = mysqli_query($db, $sql); //run the query
      $total_records = mysqli_num_rows($rs_result);  //count number of records
      $total_pages = ceil($total_records / $num_rec_per_page); 

      if($_GET['page'] < 1){
        header("Location: posts.php?page=1");
      }

      $url = $_GET['page'];
      if($total_pages == $url-1){
        $url = $_GET['page'];
        $url--;
        echo "<a href='posts.php?page=".$url."'>".'Prijašnja'."</a> "; // GO NEXT        
        echo 'Zadnja stranica';
      }else{
        $url++;
        if($total_pages+1 == $url){
          $url = $url - 2;
          echo "<a href='posts.php?page=".$url."'>".'Sljedeća'."</a> "; // GO NEXT
          echo 'Na zadnjoj ste stranici';
        }else{
          echo "<a href='posts.php?page=".$url."'>".'Sljedeća'."</a> "; // GO NEXT
        }
      }
  ?>
        </div>
   <!-- </div> end row -->
<!-- </div> end container -->

</body>

</html>