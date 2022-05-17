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

<!-- ავტორიზაციის ველები -->
   <div class="col-lg-4">
   <div class="col-lg-12">
       <center><label class="login_headers">ავტორიზაცია</label></center>
<br>
<?php
       $get = $_GET['get'];    ?>
       <center><label class="" style="color:red"><?php echo $get; ?></label></center>

<form action="php/userauth.php" method="post">
    <div class="form-floating">
      <input type="email" class="form-control" id="usermail" name="usermail" placeholder="name@example.com" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="userpass" name="userpass" placeholder="Password" required>
      <label for="floatingPassword">პაროლი</label>
    </div>
    <br>
    <button class="login" type="submit" name="userlogin">შესვლა</button>

  </form>

  </div>
      </div>

  <!-- მარჯვენა ფანჯარა (მომსახურების პიროებები) -->
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
<!-- Bootstrap Js -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
