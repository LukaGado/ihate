<?php 
include 'includes/db.php';
    session_start();
    
    //Za predaju mržnje
  include 'includes/objava.php';
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
        <div class="col-md-offset-1 col-md-8 wrapper">
          <div class="index-left col-md-offset-1 col-md-7">
            <form action="index.php" method="POST" charset="utf-8">
              <div class="form-group col-xs-6">
                <label class="control-label col-sm-2" for="username">Nadimak:</label><br> 
                <input class="form-control" type="text" id="username" name="username"></div>
             <div class="form-group col-xs-10">
                <label class="control-label col-sm-2" for="post">Post:</label><br>
                <textarea class="form-control" rows="3" maxlength="500" name="post" id="post" onkeyup="countChar(this)"></textarea></div>
              <div class="control-label col-sm-5">
                <p style="float:left;">Preostalo znakova:&nbsp</p>
                <div id="charNum">500</div></div>
             <div class="form-group col-xs-4">
                <label class="control-label" for="vercode">Unesite kod:</label> 
                <img src="includes/captcha.php" class="nowidth"> &nbsp <input class="form-control" type="text" name="vercode" style="margin-top:10px;" /></div><br>
                <button class="btn btn-hate btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-fire"></span> Mrzi!</button>
                </form>
              </div> <!-- end index-left -->
                <div class="right-image col-md-5">
                  <img src="img/angry-sheep.png" />
                </div>

                <div style="clear:both;"></div> 

                      
        </div>
   <!-- </div> end row -->
<!--</div> end container -->

 </body>
 </html>