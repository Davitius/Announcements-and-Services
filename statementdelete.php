<?php
require_once ('php/connect.php');
ob_start();
$statement_id = $_GET['id'];

$sqlquery = "SELECT * FROM services WHERE id = '$statement_id'";
$resultat = $mysql->query($sqlquery);
$row = $resultat->fetch_object();

$author = $row->user;
$authorquery = "SELECT * FROM users WHERE usermail = '$author'";
$resultauth = $mysql->query($authorquery);
$auth = $resultauth->fetch_object();

//<!-- მომხმარებლის რეიტინგის გამოთვლა -->
include ('php/rating.php');


if(($row->counter) == '')
{$count = 0;}
else{$count = $row->counter;}
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

<!-- <სესიის შემოწმება და მენიუ> -->
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

  <!-- განცხადების სურათების კარუსელი -->
  <div class="col-lg-10">
<div class="row">
      <div class="carousel col-lg-8">
      <div class="carousel col-lg-12">
   <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
 <?php
            $image1 = $row->pic1;
      if(!$image1 == ""): ?>
             <?php    $show_img = base64_encode($image1); ?>
        <img class="carouselimg" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
           <?php else: ?>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
           <div class="container">
          <div class="carousel-caption text-start">
            <p>სურათი არ არის ატვირთული.</p>
          </div>
        </div>
            <?php endif; ?>
      </div>

      <div class="carousel-item">
       <?php
            $image2 = $row->pic2;
      if(!$image2 == ""): ?>
             <?php    $show_img = base64_encode($image2); ?>
        <img class="carouselimg" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
           <?php else: ?>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
           <div class="container">
          <div class="carousel-caption text-start">
            <p>სურათი არ არის ატვირთული.</p>
          </div>
        </div>
            <?php endif; ?>
        </div>

     <div class="carousel-item">
       <?php
            $image3 = $row->pic3;
      if(!$image3 == ""): ?>
             <?php    $show_img = base64_encode($image3); ?>
        <img class="carouselimg" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
           <?php else: ?>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
           <div class="container">
          <div class="carousel-caption text-start">
            <p>სურათი არ არის ატვირთული.</p>
          </div>
        </div>
            <?php endif; ?>
        </div>

        <div class="carousel-item">
       <?php
            $image4 = $row->pic4;
      if(!$image4 == ""): ?>
             <?php    $show_img = base64_encode($image4); ?>
        <img class="carouselimg" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
           <?php else: ?>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
           <div class="container">
          <div class="carousel-caption text-start">
            <p>სურათი არ არის ატვირთული.</p>
          </div>
        </div>
            <?php endif; ?>
        </div>

        <div class="carousel-item">
         <?php
            $image5 = $row->pic5;
      if(!$image5 == ""): ?>
             <?php    $show_img = base64_encode($image5); ?>
        <img class="carouselimg" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
           <?php else: ?>
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
           <div class="container">
          <div class="carousel-caption text-start">
            <p>სურათი არ არის ატვირთული.</p>
          </div>
        </div>
            <?php endif; ?>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    </div>
      </div>

<!-- განცხადების ავტორის მონაცემები -->
<div class="col-lg-4">
<center>
<div class="col-lg-12">
<h4>განცხადების ავტორი:</h4>
<br>
<p class="usernamelname"><?php echo $auth->name . ' ' .$auth->lname ?></p>
   <br>
<?php
            $image = $auth->userpic;
      if(!$image == ""): ?>
             <?php    $show_img = base64_encode($image); ?>
       <img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="" width="215" height="215" class="rounded-circle">
           <?php else: ?>
            <img alt="" width="215" height="215" class="rounded-circle" src="img/usericon.png">
            <?php endif; ?>
            <br> <br>
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
         <br>
        <div class="panel-group" id="collapse-group">
                        <div class="btn btn-light">
                            <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#collapse-group" href="#el1">შეაფასა <?php echo $starquantity . '-მომხმარებელმა.'; ?></a>
                            </div>
                                <div id="el1" class="collapse">
                                <div class="panel-body">
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
                                </div>
                                </div>
                            </div>
                        </div>

   <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#0058ff" class="bi bi-phone-vibrate-fill" viewBox="0 0 16 16">
  <path d="M4 4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4zm5 7a1 1 0 1 0-2 0 1 1 0 0 0 2 0zM1.807 4.734a.5.5 0 1 0-.884-.468A7.967 7.967 0 0 0 0 8c0 1.347.334 2.618.923 3.734a.5.5 0 1 0 .884-.468A6.967 6.967 0 0 1 1 8c0-1.18.292-2.292.807-3.266zm13.27-.468a.5.5 0 0 0-.884.468C14.708 5.708 15 6.819 15 8c0 1.18-.292 2.292-.807 3.266a.5.5 0 0 0 .884.468A7.967 7.967 0 0 0 16 8a7.967 7.967 0 0 0-.923-3.734zM3.34 6.182a.5.5 0 1 0-.93-.364A5.986 5.986 0 0 0 2 8c0 .769.145 1.505.41 2.182a.5.5 0 1 0 .93-.364A4.986 4.986 0 0 1 3 8c0-.642.12-1.255.34-1.818zm10.25-.364a.5.5 0 0 0-.93.364c.22.563.34 1.176.34 1.818 0 .642-.12 1.255-.34 1.818a.5.5 0 0 0 .93.364C13.856 9.505 14 8.769 14 8c0-.769-.145-1.505-.41-2.182z"/>
</svg>
   <label class="userphone"><?php echo $auth->mobile ?></label>
    </div>
    </center>
      </div>
    </div><!-- /.row -->



<div class="row">
<!-- განცხადების ტექსტი -->
<div class="col-lg-8">
    <div class="col-lg-12" style="height: 270px; overflow-x: hidden;">
<p class="servicetext"><?php echo $row->servicetext ?></p>
<br>
    </div>
</div>


<!-- განცხადების მონაცემები -->
<dov class="col-lg-4">
<div class="col-lg-12">

<?php echo 'ID: ' . $statement_id . '<br>'; ?>

<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#0058ff" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>

<label class="usernamelname"><?php echo '' . $count; ?></label>
<br>
<?php echo $row->stdate; ?>

<hr class="featurette-divider">


<p class="usernamelname"><?php echo 'კატეგორია: ' . $row->category; ?></p>
<hr class="featurette-divider">


<?php if($row->price == 1): ?>
<label class="usernamelname">ფასი: შეთანხმებით.</label>
<?php else: ?>
<label class="usernamelname"><?php echo 'ფასი: ' . $row->price . 'ლ.'?></label>
<?php endif; ?>

<hr class="featurette-divider">

    </div>
</dov>
</div>




<div class="row">
<!-- განცხადების რუქა -->
<div class="col-lg-6">
    <center>
   <div class="col-lg-12">
    <?php if($row->map != ''): ?>
<div class="panel-group" id="collapse-group">
                        <div class="btn btn-light">
                            <div class="panel-heading">
                         <a data-toggle="collapse" data-parent="#collapse-group" href="#el2">ჩვენება რუქაზე</a>
                            </div>
                                <div id="el2" class="collapse">
                                <div class="panel-body">
<center><p class=""><?php echo $row->map ?></p></center>
                                </div>
                                </div>
                            </div>
                        </div>
<?php else: ?>
<label class="servicetext">მდებარეობა რუქაზე: </label>
<label class="servicetext">არ არის მითითებული.</label>
<br><br><br><br><br>
<?php endif; ?>
</div>
</center>
</div>

<!-- შეფასებები და კომენტარები -->
<div class="col-lg-6">
<div class="col-lg-12">
<center>
    <div class="content">
                <div class="tabs">
                    <nav class="tabs__items">
                        <a href="#tab_01" class="tabs__item"><span>შეაფასე და დატოვე კომენტარი.</span></a>
                        <a href="#tab_02" class="tabs__item"><span>სხვა კომენტარები.</span></a>
                    </nav>
                    <div class="tabs__body">
                        <div id="tab_01" class="tabs__block">
                           <br>


 <!-- კომენტარის და შეფასების დაწერა. (ასევე შემოწმება ავტორიზაციაზე და გამეორებაზე) -->
                            <?php
    $feedbackquery = "SELECT * FROM feedbacks WHERE serviceid = '$statement_id'";
    $feedbackresult = $mysql->query($feedbackquery);

    if(!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == ''):?>
        <label class="" style="color: aliceblue">შეფასების და კომენტარის დასატოვებლად გაიარეთ ავტორიზაცია.</label>
    <?php else: ?>

 <?php  if($_COOKIE['loginuser'] == $row->user): ?>

     <label class="" style="color: aliceblue">თქვენივე განთავსებულ განცხადებას ვერ შეაფასებთ.</label>
          <?php  goto label1; ?>

<?php endif; ?>

<?php
    while($feedb = $feedbackresult->fetch_object()):
        $usercookie = $_COOKIE['loginuser'];
        $key2 = $feedb->feedbackmail; ?>

  <?php  if($key2 == $usercookie): ?>

   <label class="" style="color: aliceblue">თქვენივე უკვე შეაფასეთ.</label>
  <?php goto label2; ?>

   <?php endif; ?>
    <?php endwhile; ?>
    <form action="" method="post">

    <select class="feedbacknum" name="feedbackstar" id="feedbackstar">
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
    </select>
    <img class="xstar2" src="img/ystar.PNG">
    <br>
    <textarea class="form-control" name="feedbacktext" id="feedbacktext" rows="3"></textarea>
    <br>
     <button class="form-control" type="submit" name="addfeedback" style="background-color: #23c762">შეაფასე.</button>
     </form>
                       <?php label2: ?>
                        <?php label1: ?>
                        <?php endif; ?>
</div>


        <!--  კომენტარების გამოტანა -->
<?php
            date_default_timezone_set('Asia/Tbilisi');
            $feedbshow = "SELECT * FROM feedbacks WHERE serviceid = '$statement_id'";
            $resultfshow = $mysql->query($feedbshow);

?>
                        <div id="tab_02" class="tabs__block">
<?php while($show = $resultfshow->fetch_object()): ?>
                           <label class=""><?php echo $show->feedb_name . ' ' . $show->feedb_lname ?></label>
                           <br>
<?php
    $sonfb = $show->feedbackstar;
  for($sonfb; $sonfb>=1; $sonfb--): ?>
          <img class="ratingstar" src="img/ystar.PNG">
<?php endfor; ?>
                            <br>
                           <label class=""><?php echo $show->date ?></label>
                           <br>
                           <textarea class="form-control" rows="3"><?php echo $show->comment ?></textarea>
                           <hr class="featurette-divider">
<?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="text">
                </div>
            </div>
            </center>
</div>
    </div>

</div>


            <hr class="featurette-divider">
            <!-- განცხადების წაშლა -->
    <form action="" method="post">
     <center>
      <label class="" style="color: black">მსურს განცხადების წაშლა - </label>
       <input class="" type="checkbox" required>
       <br><br>
        <button class="btn btn-danger" name="statementdelete" id="statementdelete">წაშლა</button>
        </center>
    </form>
      </div>
  </div><!-- /.container -->



<div class="col-lg-1"></div>
<br>
  <!-- FOOTER -->
   <?php
      include 'php/footer.php';
      ?>
</main>
   <!-- Bootstrap JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="../js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="../js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
<!-- განცხადების წაშლა -->
<?php
if(isset($_POST['statementdelete'])){

        $querry = "DELETE FROM `services` WHERE `id` = $statement_id";
            $querry_run = mysqli_query($connect, $querry) or die(mysqli_error());
    }
    if($querry_run)
    {
        ob_end_clean();
        header('Location: profile.php');
        exit();
    }

?>
