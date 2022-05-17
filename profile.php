<?php
//სესიის შემოწმება
if (!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == ''):
header ('Location: index.php');
?>
<?php else:
require_once ('php/connect.php');

$author = $_COOKIE['loginuser'];
$sqlquery = "SELECT * FROM services WHERE user = '$author' ORDER BY id DESC";
$resultat = $mysql->query($sqlquery);

$authorquery = "SELECT * FROM users WHERE usermail = '$author'";
$resultauth = $mysql->query($authorquery);
$auth = $resultauth->fetch_object();

//მომხმარებლის რეიტინგის გამოთვლა
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

<!-- მენიუ -->
  <?php
        include 'php/headerloged.php';
    ?>

<main>

<div class="row">
 <div class="col-lg-1"></div>

  <div class="col-lg-10">
<div class="row">

     <!--მომხმარებლის სურათი -->
      <div class="col-lg-4">
       <div class="col-lg-12">
        <center>
             <?php
            $image = $user['userpic'];
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
     <div class="col-lg-12">
     <form action="php/userupdate.php" method="post" enctype="multipart/form-data">
<?php
         $get = $_GET['get'];
         if($get == 'განცხადების განთავსებისთვის საჭიროა პირადი ინფორმაციის განახლება.'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>
   <?php
         if($get == 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg; jpeg;'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

    <?php
         if($get == 'პაროლი უნდა იყოს მინიმუმ 5 სიმბოლო' . '<br>' . 'და მაქსიმუმ 12 სიმბოლო'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

    <?php
         if($get == 'მონაცემები წარმატებით განახლდა'): ?>
         <center><label class="" style="font-family: GeoArt; color: green; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

    <?php
         if($get == 'მობილური ფორმატი უნდა იყოს:' . '<br>' . '5xxxxxxxx, სულ 9 სიმბოლო.'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

<label class="nstitle">სახელი.</label><label class="nstrs">*</label>
<input type="text" class="form-control" id="name" name="name" placeholder="<?= $user['name'] ?>" required>
<label class="nstitle">გვარი.</label>
<input type="text" class="form-control" id="lname" name="lname" placeholder="<?= $user['lname'] ?>">
<label class="nstitle">მობილური</label><label class="nstrs">*</label>
<input type="number" class="form-control" id="mobile" name="mobile" placeholder="<?= $user['mobile'] ?>" required maxlength="9">

<label class="nstitle">მომსახურების სფერო.</label><label class="nstrs">*</label>
     <select class="form-control" name="category" id="category" required>
        <option value="<?= $user['category'] ?>"><?= $user['category'] ?></option>
         <option value="ავტო სერვისი">ავტო სერვისი.</option>
         <option value="განათლება">განათლება.</option>
         <option value="გართობა, გასართობი ცენტრები">გართობა, გასართობი ცენტრები.</option>
         <option value="გაქირავება">გაქირავება.</option>
         <option value="დასუფთავება, დალაგება">დასუფთავება, დალაგება.</option>
         <option value="იურიდიული მომსახურება">იურიდიული მომსახურება.</option>
         <option value="კომპიუტერული მომსახურება">კომპიუტერული მომსახურება.</option>
         <option value="მშენებლობა, რემონტი">მშენებლობა, რემონტი.</option>
         <option value="მოგზაურობა, ტურიზმი">მოგზაურობა, ტურიზმი.</option>
         <option value="საკვები პროდუქტები">საკვები პროდუქტები.</option>
         <option value="სპეცტექნიკა">სპეცტექნიკა.</option>
         <option value="სარეკლამო მომსახურება">სარეკლამო მომსახურება.</option>
         <option value="ტვირთის გადაზიდვა, ლოჯისტიკა">ტვირთის გადაზიდვა, ლოჯისტიკა.</option>
         <option value="უსაფრთხოება">უსაფრთხოება.</option>
         <option value="ფოტო, ვიდეო გადაღება">ფოტო, ვიდეო გადაღება.</option>
         <option value="ფინანსური მომსახურება, ბუღალტერია">ფინანსური მომსახურება, ბუღალტერია.</option>
         <option value="ცხოველების მოვლა, ჯანმრთელობა">ცხოველების მოვლა, ჯანმრთელობა.</option>
         <option value="ჯანმრთელობა, სილამაზე">ჯანმრთელობა, სილამაზე.</option>
         <option value="ხელოვნება">ხელოვნება.</option>
         <option value="ძიძის, მომვლელის მომსახურება">ძიძის, მომვლელის მომსახურება.</option>
         <option value="სხვა მომსახურება">სხვა მომსახურება.</option>
     </select>
<label class="nstitle">პაროლი.</label>
<input type="password" class="form-control" id="userpass" name="userpass" placeholder="" value="<?= $user['userpass'] ?>">
<label class="nstitle">ფოტო.</label>
    <input type="file" name="userpic" class="form-control" id="userpic">
<br>
   <center><input type="checkbox" required> <label class="nstitle">_ ვეთანხმები.</label></center>
   <br>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="userupdate" style="border-radius: 30px">მონაცემების განახლება</button>
     </form>
     </div>
      </div>


      <div class="col-lg-4">
<center>
           <div class="col-lg-12">
            <label class="nstitle">თქვენი რეიტინგი და შეფასება.</label>
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
            <label class="">სულ გაქვთ <?php echo $starquantity; ?> შეფასება.</label>
      </div>
      </center>
      </div>
    </div><!-- /.row -->

<br>
<hr class="featurette-divider">
<br>

<!-- მომხმარებლის განცხადებები -->
<center><h3 class="nstitle3">ჩემი განცხადებები</h3></center>
    <div class="row" style="height: 530px; overflow-x:hidden;">
<?php
  $author = $_COOKIE['loginuser'];

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
        <br><br>
        <p><a class="btn btn-warning" href="statementdelete.php?id=<?php echo $row->id ?>" style="border-radius: 20px">წაშლა</a></p>
</div>
        </center>
      </div>
     <?php endwhile; ?>
      </div>
  </div><!-- /.container -->


  <div class="col-lg-1"></div>
    </div>


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
<?php endif; ?>


