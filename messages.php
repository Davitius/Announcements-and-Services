<?php
$get = $_GET['get'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Head -->
    <?php
    include 'php/head.php';
    ?>

</head>
<body>

<header>
   <!-- მენიუ -->
    <?php
    include 'php/headernotreg.php';
    ?>
</header>


<main>
 <!-- სარეკლამო კარუსელი -->
  <?php
    include 'php/carousel.php';
    ?>


<div class="row">
<div class="col-lg-1"></div>



<div class="col-lg-10">
  <div class="row">

  <!-- მარცხენა ფანჯარა (რჩევები) -->
   <div class="col-lg-4">
   <div class="col-lg-12" style="height: 250px; overflow-x: hidden;">
   <center><label class="login_headers"> ადამიანური სიბრძნის მოსაპოვებლად</label>
    <br><label class="login_headers">საჭირო რჩევები</label></center>
    <br>
    <center>
    <?php include 'php/tips.php';
echo $tips[rand(0, count($tips)-1)]; ?>
      </center>
       </div>
  </div>


   <div class="col-lg-4">
   <div class="col-lg-12">

<!-- მესეჯი: ელ. ფოსტა ან პაროლი არასწორეა.  -->
       <?php if($get == 'ელ. ფოსტა ან პაროლი არასწორეა.'): ?>
       <center>
       <label class="" style="font-family: GeoArt; color: red; font-size: 130%; font-weight: bold;"><?php echo $get; ?></label>
       <br><br>
       <a class="" href="login.php"><button class="btn-back">უკან დაბრუნება</button></a>
       <br>
       </center>
       <?php endif; ?>

<!-- მესეჯი: პაროლი არ შეესაბამება მოთხოვნებს.  -->
       <?php if($get == 'პაროლი არ შეესაბამება მოთხოვნებს.'): ?>
       <center>
       <label class="" style="font-family: GeoArt; color: red; font-size: 130%; font-weight: bold;"><?php echo $get; ?></label>
       <br><br>
       <a class="" href="register.php"><button class="btn-back">უკან დაბრუნება</button></a>
       <br>
       </center>
       <?php endif; ?>

<!-- მესეჯი: თქვენ წარმატებით დარეგისტრირდით.  -->
       <?php if($get == 'თქვენ წარმატებით დარეგისტრირდით, . <br>' . 'გთხოვთ გაიაროთ ავტორიზაცია.' . '<br>'): ?>
       <center>
       <label class="" style="font-family: GeoArt; color: green; font-size: 130%; font-weight: bold;"><?php echo $get; ?></label>
       <br><br>
       <a class="" href="login.php"><button class="btn-back">ავტორიზაცია</button></a>
       <br>
       </center>
       <?php endif; ?>

<!-- მესეჯი: მომხმარებელი ესეთი მეილით უკვე არსებობს.  -->
       <?php if($get == 'მომხმარებელი ესეთი მეილით უკვე არსებობს.'): ?>
       <center>
       <label class="" style="font-family: GeoArt; color: red; font-size: 130%; font-weight: bold;"><?php echo $get; ?></label>
       <br><br>
       <a class="" href="register.php"><button class="btn-back">უკან დაბრუნება</button></a>
       <br>
       </center>
       <?php endif; ?>



  </div>
      </div>

  <!-- მარჯვენა ფანჯარა (მომსახურების პირობები) -->
   <div class="col-lg-4">
   <div class="col-lg-12" style="height: 250px; overflow-x: hidden;">
    <center><label class="login_headers">მომსახურების პირობები</label></center>
   <?php include 'php/t_service.php'; ?>
  </div>
    </div>
    </div>
    </div>


<div class="col-lg-1"></div>
    </div>
<br><br><br>

<!-- FOOTER -->
    <?php
        include 'php/footer.php';
        ?>


</main>
<!-- Bootstrap Script -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
