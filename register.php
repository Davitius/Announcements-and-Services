<?php
require_once ('php/connect.php');
ob_start(); ?>
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
   <div class="col-lg-12" style="height: 250px; overflow-x: hidden;">
   <center><label class="login_headers">რეგისტრაციის წესები.</label></center>
   <?php include 'php/regrules.php'; ?>
   </div>
  </div>

<!-- რეგისტრაციის ველები -->
   <div class="col-lg-4">
   <center>
   <div class="col-lg-12">
 <center><label class="login_headers">რეგისტრაცია</label></center>
<br>
   <?php if(!isset($_COOKIE['usermail']) || $_COOKIE['usermail'] == ''):
    ?>
   <form action="" method="post">

<label class="tservice">ვეთანხმები მომსახურების პირობებს. - </label>
<input type="checkbox" name=""required>
<br><br>

   <div class="btn-group">
  <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required>
  <button class="btn btn-success" type="submit" id="sendmail" name="sendmail">გაგზავნა</button></div>
       </form>
       <?php endif; ?>

      <!-- მეილის (მომხმარებლის) შემოწმება და მეილზე აქტივაციის კოდის გაგზავნა -->
       <?php
if(isset($_POST['sendmail'])){


    $usermail = $_POST['email'];
    $result = $mysql->query("SELECT * FROM `users` WHERE `usermail` = '$usermail'");

$userlist = $result->fetch_assoc();

if(!$userlist || count($userlist) == 0)
{
    $activecode=mt_rand(1000,9999);
    $from = "tsatestod@gmail.com";
    $to = trim($_POST['email']);
    $subject = "Activation Code";
    $message = "აქტივაციის კოდი: " . "<b>" . $activecode . "<b>";
    $headers = "From: $from\r\nReplay-to: $from\r\nContent-type: text/html; charset=utf-8\r\n";

if(mail($to, $subject, $message, $headers))
{
    ob_end_clean;
    $TikTak = 60; //აქტივაციის კოდის აქტუალურობის დრო. (წამი).
    setcookie('usermail', $to, time() + $TikTak, "/");
    setcookie('activecode', $activecode, time() + $TikTak, "/");
    $mailcookie = $_COOKIE['usermail'];
    header ('Location: register.php');
}
    else
    {
    echo '<br>' . 'აქტივაციის კოდი არ გაიგზავნა';
    }
}
     else
    {
        $x4 = 'მომხმარებელი ესეთი მეილით უკვე არსებობს.';
        header ("Location: messages.php?get=$x4");
    }
}
?>

<?php

       if(isset($_COOKIE['usermail']) || $_COOKIE['usermail'] != ''): ?>
      <center>
      <label class="massage_done">აქტივაციის კოდი გაიგზავნა.</label><br>
      <label class="massage_done">მეილზე: <?php echo $_COOKIE['usermail']; ?></label><br>
      <!--<?php echo $_COOKIE['activecode']; ?> -->
      </center>


<?php if(!isset($_COOKE['codedone']) || $_COOKIE['codedone'] == ''):
       ?>
       <br>
<form action="" method="post">
<div class="btn-group">
  <input class="form-control" type="text" maxlength="4" name="activecode" id="" placeholder="აქტივაციის კოდი">
    <button class="btn btn-success" type="submit" name="aqtivecodesubmit" id=""> დასტური</button>
  </div>

  </form>
    <?php endif; ?>
<?php endif; ?>


<!-- აქტივაციის კოდის შემოწმება -->
<?php
    if(isset($_POST['aqtivecodesubmit'])):
        if(trim($_POST['activecode']) == $_COOKIE['activecode']):
       $codedone = $_COOKIE['activecode'];

       setcookie('codedone', $codedone, time() + $TikTak, "/");
       header ('Location: register2.php');
       ?>

            <?php else: ?>
            <br>
            <label class="massage_alert">აქტივაციის კოდი არასწორეა!</label>
        <?php endif; ?>
    <?php endif; ?>

      </div>
      </center>

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


  <div class="col-lg-1">

   </div>
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


