<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- HEAD -->
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

  <!-- მარცხენა ფანჯარა. (რეგისტრაციის წესები) -->
  <div class="col-lg-4">
  <div class="col-lg-12">
  <center><label class="login_headers">რეგისტრაციის წესები.</label></center>
   <?php include 'php/regrules.php'; ?>
   </div>
    </div>


<!-- რეგისტრაციის ველები 2 -->
   <div class="col-lg-4">
   <center>
   <div class="col-lg-12">
   <h3 class="">რეგისტრაცია</h3>
<br>
<!-- აკტივაციის კოდის ვალიდურობის შემოწმება -->
<?php if(isset($_COOKIE['usermail']) && isset($_COOKIE['activecode']) && isset($_COOKIE['codedone'])): ?>
     <center>
      <label class="massage_done">აქტივაციის კოდი გაიგზავნა.</label><br>
      <label class="massage_done">მეილზე: <?php echo $_COOKIE['usermail']; ?></label><br>
      <label class="massage_done">აქტივაციის კოდი დადასტურებულია.</label>
      </center>
<br><br>
      <form action="php/usercheck.php" method="post">
 <div class="btn-group">
  <input class="form-control" name="userpass" id="" placeholder="პაროლი" required >
<center><button class="btn btn-success" name="register" id="" type="submit" >რეგისტრაცია</button> </center>
 </div>
  </form>
<?php else: ?>
<?php header ('Location: register.php'); ?>
<?php endif; ?>
       </div>
</center>
  </div>


<!-- მარჯვენა ფანჯარა. (მომსახურების წესები) -->
   <div class="right">
   <?php include 'php/t_service.php'; ?>
  </div>
    </div>
    </div>

<div class="col-lg-1"></div>
   </div>
   <br><br>

<!-- FOOTER -->
    <?php
        include 'php/footer.php';
        ?>
</main>
<!-- Bootstrap JS -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


