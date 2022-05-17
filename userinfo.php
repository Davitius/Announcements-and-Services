<?php

require_once ('php/connect.php');

$author = $_COOKIE['loginuser'];
$sqlquery = "SELECT * FROM services WHERE user = '$author' ORDER BY id DESC";
$resultat = $mysql->query($sqlquery);

$id = $_GET['id'];
$authorquery = "SELECT * FROM users WHERE id = '$id'";
$resultauth = $mysql->query($authorquery);
$auth = $resultauth->fetch_object();

//<!-- მომხმარებლის რეიტინგის გამოთვლა -->
include ('php/rating.php');
?>
<!doctype html>
<html lang="en">
  <head>
   <?php
      include 'php/head.php'; //HEAD
      include 'php/rstarsstyle.php'; //მომხმარებლის რეიტინგის ვარსკვლავების სტილი
      ?>


  </head>
  <body>

<!-- სესიის შემოწმება და მენიუ -->
 <?php
    if (!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == ''){
    include 'php/headernotreg.php';
    } else {
        include 'php/headerloged.php';
    }
    ?>

<main>

<div class="row">
 <div class="col-lg-1"></div>

  <div class="col-lg-10">
<div class="row">

     <!-- მომხმარებლის სურათის ჩარჩო -->
      <div class="col-lg-4">
       <div class="col-lg-12" style="height:310px">
        <center>
<br>
             <?php
            $image = $auth->userpic;;
      if(!$image == ""): ?>

            <?php    $show_img = base64_encode($image); ?>
            <img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="" width="230" height="230" class="rounded-circle">

           <?php else: ?>
            <img class="userpic" src="img/usericon.png" alt="" width="230" height="230" class="rounded-circle">
            <?php endif; ?>

        </center>
        </div>
      </div>

<!-- მომხმარებლის პირადი ინფო -->
<div class="col-lg-4">
     <div class="col-lg-12" style="height:310px"> <!-- მონაცემების ჩარჩო -->
<?php
         $get = $_GET['get'];
         if($get == 'განცხადების განთავსებისთვის საჭიროა პირადი ინფორმაციის განახლება.'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

<label class="nstitle">სახელი: <?php echo $auth->name; ?></label><br><br>
<label class="nstitle">გვარი: <?php echo $auth->lname; ?></label><br><br>
<label class="nstitle">მობილური: <?php echo $auth->mobile; ?></label><br><br>
<label class="nstitle">მომსახურების სფერო: <?php echo $auth->category; ?></label><br><br>
     </div>
      </div>

<!-- მომხმარებლის რეიტინგი -->
      <div class="col-lg-4">
<center>
           <div class="col-lg-12" style="height:310px"> <!-- რეიტინგის ჩარჩო -->
            <label class="nstitle">რეიტინგი და შეფასება.</label>
          <br><br>
<label class="">რეიტინგი: _</label>
<label class="reitingnumber"><?php echo round($rating, 1); ?></label>
<?php if (round($rating, 1) == 0): ?>
<img class="ratingstar" src="img/emptystar.png">  <?php endif; ?>
<?php if (round($rating, 1) > 0 && round($rating, 1) <= 0.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 0.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 1 && round($rating, 1) <= 1.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 1.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 2 && round($rating, 1) <= 2.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 2.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 3 && round($rating, 1) <= 3.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 3.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 4 && round($rating, 1) <= 4.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 4.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<br><br>

         <label class="">შეფასებები:</label>
            <br>
<div class="statistic">
<div class="first"><img class="xstar" src="img/1star.PNG"></div>
<div class="second"><img class="xstar" src="img/2star.PNG"></div>
<div class="third"><img class="xstar" src="img/3star.PNG"></div>
<div class="fourth"><img class="xstar" src="img/4star.PNG"></div>
<div class="fifth"><img class="xstar" src="img/5star.PNG"></div>
</div>

<div class="statisticnumbers">
<div class="firstn"><label class=""><?php echo $star1q; ?></label></div>
<div class="secondn"><label class=""><?php echo $star2q; ?></label></div>
<div class="thirdn"><label class=""><?php echo $star3q; ?></label></div>
<div class="fourthn"><label class=""><?php echo $star4q; ?></label></div>
<div class="fifthn"><label class=""><?php echo $star5q; ?></label></div>
</div>
           <br>
            <label class="">სულ შეაფასა <?php echo $starquantity; ?>-მა მომხმარებელმა.</label>
      </div>
      </center>
      </div>
    </div><!-- /.row -->

<br>
<hr class="featurette-divider">
<br>

<center><h3 class="nstitle3">განცხადებები:</h3></center>

<!-- მომხმარებლის მიერ დადებული განცხადებები -->
    <div class="row" style="height: 450px; overflow-x:hidden;">

<?php
  $author = $auth->usermail;

$sqlquery = "SELECT * FROM services WHERE user = '$author'";
$resultat = $connect->query($sqlquery);
?>


<?php while( $row = $resultat->fetch_object() ): ?>
<div class="col-lg-2">
<center>
<div class="col-lg-12">
<?php
 $date = $row->stdate;
    $start = strtotime($date);
    $today = strtotime(date("Y-m-d"));
    $pastdays = ceil(abs($today - $start) / 86400);
    $lastdays = 30 - $pastdays;

    if($lastdays >=15): ?>
        <label class="txtdayleftgreen"><?php echo 'დარჩა ' . $lastdays . ' დღე'; ?></label><br>
        <?php endif; ?>

     <?php  if($lastdays < 15 && $lastdays >= 6): ?>
        <label class="txtdayleftyellow"><?php echo 'დარჩა ' . $lastdays . ' დღე'; ?></label><br>
        <?php endif; ?>
      <?php   if($lastdays <= 5 ): ?>
        <label class="txtdayleftred"><?php echo 'დარჩა ' . $lastdays . ' დღე'; ?></label><br>
        <?php endif; ?>


       <br>
        <?php
$showimg=$row->pic1;
if(!$showimg == ""): ?>
<?php   $show_img = base64_encode($showimg); ?>
         <a class="" href="statementdetails.php?id=<?php echo $row->id ?>"> <img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="" width="170" height="170" class="rounded-circle"></a>

<?php else: ?>
        <a class="" href="statementdetails.php?id=<?php echo $row->id ?>"><img class="rounded-circle" src="img/nophoto1.png" alt="" width="170" height="170"></a>
<?php endif; ?>
<br><br>
 <div class="frontservice">
        <p class="titletext"><?php echo $row->title ?></p>
</div>


<label class="servicetext"><?php echo round($rating, 1); ?></label>
<?php if (round($rating, 1) == 0): ?>
<img class="ratingstar" src="img/emptystar.png">  <?php endif; ?>
<?php if (round($rating, 1) > 0 && round($rating, 1) <= 0.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 0.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 1 && round($rating, 1) <= 1.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 1.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 2 && round($rating, 1) <= 2.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 2.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 3 && round($rating, 1) <= 3.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 3.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 4 && round($rating, 1) <= 4.5): ?>
<img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
<?php if (round($rating, 1) > 4.5): ?>
<img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <br>
<label class="" style="font-size: 90%; color: black">სულ შეფასება: <?php echo $starquantity; ?></label>
</div>
        </center>
      </div>
     <?php endwhile; ?>
      </div>
  </div><!-- /.container -->

  <div class="col-lg-1"></div></div>

<br>
  <!-- FOOTER -->
   <?php
      include 'php/footer.php';
      ?>

</main>
   <!-- Bootstrap JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



