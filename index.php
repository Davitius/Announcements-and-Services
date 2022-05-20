<?php
require_once ('php/connect.php');
ob_start();

// ======= ძებნა =========
     if(isset($_GET['productsearch'])){
        $searchKey = $_GET['productsearch'];
        $sqlquery = "SELECT * FROM services WHERE title LIKE '%$searchKey%' ORDER BY id DESC";
     }
else {
     $sqlquery = "SELECT * FROM services ORDER BY id DESC LIMIT 12";
}
$resultat = $mysql->query($sqlquery);

$servants = "SELECT * FROM users";
    $servantsresult = $mysql->query($servants);


$deltimmequery = "SELECT * FROM timestamp";
$timmeresultat = $connect->query($deltimmequery);
$timme = $timmeresultat->fetch_object();

//<!-- შემოწმება: დღეს მოხდა თუ არაა ვადაგასულების წაშლა-->
 $date = $timme->deltime;
    $start = strtotime($date);
    $today = strtotime(date("Y-m-d"));
    $pastdays = ceil(abs($today - $start) / 86400);
$lastdays = 1 - $pastdays; // რამდენ დღეში ერთხელ გაასუფთავოს ვადაგასულები

if($lastdays <= 0){
    ob_end_clean;
    header ('Location: php/oldstdel.php');
    exit();
}

 $locationsearch = $_GET['location'];
?>

<!doctype html>
<html lang="en">
  <head>
   <?php
      include 'php/head.php';
      ?>
  </head>
  <body>

<!-- <header> -->
  <?php
    if (!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == ''){
    include 'php/headernotreg.php';
    } else {
        include 'php/headerloged.php';
    }
    ?>



<main>
<!-- სარეკლამო კარუსელი  -->
  <?php
    include 'php/carousel.php';
    ?>


    <div class="row">
<div class="col-lg-1"></div>
  <div class="col-lg-10">
<br><br>
 <div class="slider col-lg-12">
  <center>
  <label class="nstitle2">საუკეთესო შემსრულებლები:</label>
  <br>
   <?php
     include 'php/best_performers.php';
      ?>
      </center>
      </div>

<div class="row">
<!-- რეკლამა #1 ჩარჩო  -->
<div class="col-lg-4">
       <center><div class="col-lg-12"  style="border-radius: 0; width:340px; height: 280px; padding:0;";>
        <img class="" alt="რეკლამა" width: auto; width="340px;" height="280px" src="img/add1.png">
       </div> </center>
        </div>


<!-- ძებნის ჩარჩო  -->
<div class="col-lg-4">
<div class="col-lg-12">
<center>
<label class="nstitle3" style="font-size: 130%;">მოიძიე თქვენთვის სასურველი სერვისი</label>
<br>



<!-- ძებნის ველები -->
<form action="" method="GET">
   <a class="btn refresh" href="index.php">განახლება</a>
   <select class="form-control" name="location" id="location" style="border-radius: 5px; width: 100%; font-size: 110%; height: 50px">
         <option value="თბილისი">თბილისი.</option>
         <option value="ბათუმი">ბათუმი.</option>
         <option value="ქუთაისი">ქუთაისი.</option>
         <option value="რუსთავი">რუსთავი.</option>
         <option value="გორი">გორი.</option>
         <option value="ზუგდიდი">ზუგდიდი.</option>
         <option value="ფოთი">ფოთი.</option>
         <option value="ხაშური">ხაშური.</option>
         <option value="სამტრედია">სამტრედია.</option>
         <option value="სენაკი">სენაკი.</option>
         <option value="ზესტაფონი">ზესტაფონი.</option>
         <option value="მარნეული">მარნეული.</option>
         <option value="თელავი">თელავი.</option>
         <option value="ახალციხე">ახალციხე.</option>
         <option value="ქობულეთი">ქობულეთი.</option>
         <option value="ოზურგეთი">ოზურგეთი.</option>
         <option value="კასპი">კასპი.</option>
         <option value="ჭიათურა">ჭიათურა.</option>
         <option value="წყალტუბო">წყალტუბო.</option>
         <option value="საგარეჯო">საგარეჯო.</option>
         <option value="გარდაბანი">გარდაბანი.</option>
         <option value="ბორჯომი">ბორჯომი.</option>
         <option value="ტყიბული">ტყიბული.</option>
         <option value="ხონი">ხონი.</option>
         <option value="ბოლნისი">ბოლნისი.</option>
         <option value="ახალქალაქი">ახალქალაქი.</option>
         <option value="გურჯაანი">გურჯაანი.</option>
         <option value="მცხეთა">მცხეთა.</option>
         <option value="ყვარელი">ყვარელი.</option>
         <option value="ახმეტა">ახმეტა.</option>
         <option value="ქარელი">ქარელი.</option>
         <option value="ლანჩხუთი">ლანჩხუთი.</option>
         <option value="დუშეთი">დუშეთი.</option>
         <option value="საჩხერე">საჩხერე.</option>
         <option value="დედოფლისწყარო">დედოფლისწყარო.</option>
         <option value="ლაგოდეხი">ლაგოდეხი.</option>
         <option value="ნინოწმინდა">ნინოწმინდა.</option>
         <option value="აბაშა">აბაშა.</option>
         <option value="წნორი">წნორი.</option>
         <option value="თერჯოლა">თერჯოლა.</option>
         <option value="მარტვილი">მარტვილი.</option>
         <option value="ხობი">ხობი.</option>
         <option value="წალენჯიხა">წალენჯიხა.</option>
         <option value="ვანი">ვანი.</option>
         <option value="ბაღდათი">ბაღდათი.</option>
         <option value="ვალე">ვალე.</option>
         <option value="ჩხოროწყუ">ჩხოროწყუ.</option>
         <option value="თეთრიწყარო">თეთრიწყარო.</option>
         <option value="დმანისი">დმანისი.</option>
         <option value="ონი">ონი.</option>
         <option value="წალკა">წალკა.</option>
         <option value="ამბროლაური">ამბროლაური.</option>
         <option value="სიღნაღი">სიღნაღი.</option>
         <option value="ცაგერი">ცაგერი.</option>
         <option value="ჯვარი">ჯვარი.</option>
     </select>
    <input type="text" style="border-radius: 5px; width: 100%; font-size: 110%; height: 50px" placeholder="საძიებო სიტყვა..." class="form-control" name="productsearch" id="" placeholder="" value=<?php echo @$_GET['productsearch']; ?> >

   <button class="btnsearch" type="submit" value="" name="search">ძებნა</button>
   </form>
    </center>
</div>
</div>

<!-- რეკლამა #2 ჩარჩო  -->
<div class="col-lg-4">
       <center><div class="col-lg-12"  style="border-radius: 0; width:340px; height: 280px; padding:0;";>
        <img class="" alt="რეკლამა" width: auto; width="340px;" height="280px" src="img/add2.png">
       </div> </center>
        </div>
        </div>


<br><br>
<div class="searchresultDiv" id="searchresultID">
<center>
<?php

      if(isset($_GET['search'])): ?>
      <label class="searchresulttext1">ძებნის რეზულტატი :  <?php  echo $locationsearch . " > " . $searchKey; ?></label>
       <label class="searchresulttext2" id="CountedS2">X</label>
    <?php else: ?>
<label class="searchresulttext3" id="CountedS3">ბოლო 12 განთავსებული განცხადება.</label>
<?php endif; ?>
</center>
</div>

<!-- განცხადებების გამოტანის ადგილი  -->
 <div class="row" style="height: 860px; overflow-x: hidden;">


<!-- თითოეული გამოტანილი განცხადებისთვის რეიტინგის გამოთვლა -->
<?php
     $counted_services = 0;
     while($row = $resultat->fetch_object() ):
$author = $row->user;
$authorquery = "SELECT * FROM users WHERE usermail = '$author'";
$resultauth = $mysql->query($authorquery);
$auth = $resultauth->fetch_object();

$star1 = $auth->star1;
$star1q = $star1;
$star2 = $auth->star2;
$star2q = $star2/2;
$star3 = $auth->star3;
$star3q = $star3/3;
$star4 = $auth->star4;
$star4q = $star4/4;
$star5 = $auth->star5;
$star5q = $star5/5;
$starquantity = $star1q+$star2q+$star3q+$star4q+$star5q;
if($starquantity !=0){
    $rating = ($star1+$star2+$star3+$star4+$star5)/$starquantity;
                     }else {$rating = 0;}

?>

<?php
      $location = $row->location;
    if($locationsearch == $location || $locationsearch == ''):
     $counted_services++;
     ?>


<div class="col-lg-2">
<center>
<div class="col-lg-12">
<!-- განცხადება (ციკლში) -->
       <br>
       <div class="frontserviceimg">

        <?php
$showimg=$row->pic1;

if(!$showimg == ""): ?>

<?php   $show_img = base64_encode($showimg); ?>
      <a class="" href="statementdetails.php?id=<?php echo $row->id ?>"> <img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="" class="card-rounded-circle"></a>

<?php else: ?>
       <a class="" href="statementdetails.php?id=<?php echo $row->id ?>"><img class="card-rounded-circle" src="img/nophoto1.png" alt=""></a>

<?php endif; ?>

</div>
<br>

 <div class="frontservice">

        <label class="titletext"><?php echo $row->title ?></label>


</div>


<label class=""><?php echo $row->location ?></label>
       <br>
        <label class="servicetext"><?php echo round($rating, 1); ?></label>
         <?php
        if (round($rating, 1) == 0): ?>
        <img class="ratingstar" src="img/emptystar.png">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 0 && round($rating, 1) <= 0.5): ?>
        <img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 0.5): ?>
        <img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 1 && round($rating, 1) <= 1.5): ?>
        <img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 1.5): ?>
        <img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 2 && round($rating, 1) <= 2.5): ?>
        <img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 2.5): ?>
        <img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 3 && round($rating, 1) <= 3.5): ?>
        <img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 3.5): ?>
        <img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 4 && round($rating, 1) <= 4.5): ?>
        <img class="ratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 4.5): ?>
        <img class="ratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <br>
        <label class="card-rating-text">სულ შეფასება <?php echo $starquantity; ?></label>
     </div>
              </center>
        </div>
        <?php endif; ?>
     <?php endwhile; ?>
</div>
    </div>

 <div col-lg-1></div>
 </div>


<br><br><br>

  <!-- FOOTER -->
   <?php
      include 'php/footer.php';
      ?>


</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Slider JS -->
  <script src="../js/swiper-bundle.min.js"></script>

<!-- ძებნის რეზულტატის სკრიპტი. -->
<script>
    let list = document.getElementById('CountedS2');
    list.innerHTML = "ნაპოვნია: <?php echo $counted_services; ?> განცხადება.";
</script>


<!-- Slider script -->
<script>
    if(matchMedia){
    var screen = window.matchMedia("(max-width:1400px)");
        screen.addListener(changes);
        changes(screen);
    }

function changes(screen){
    if(screen.matches){
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 2,
      spaceBetween: 10,
      slidesPerGroup: 2,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    }
    else{
       var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      slidesPerGroup: 4,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    }
    }
  </script>
  </body>
</html>


