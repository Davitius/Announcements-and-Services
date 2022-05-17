<section>
    <div class="swiper mySwiper container">
      <div class="swiper-wrapper content">

<?php
          while($roww = $servantsresult->fetch_object()):
$star1 = $roww->star1;
$star1q = $star1;
$star2 = $roww->star2;
$star2q = $star2/2;
$star3 = $roww->star3;
$star3q = $star3/3;
$star4 = $roww->star4;
$star4q = $star4/4;
$star5 = $roww->star5;
$star5q = $star5/5;
$starquantity = $star1q+$star2q+$star3q+$star4q+$star5q;

if($starquantity !=0){
    $rating = ($star1+$star2+$star3+$star4+$star5)/$starquantity;
                     }else {$rating = 0;}
          $showuserimg=$roww->userpic;
          ?>

<!--  რეიტინგის დონე საუკეთესო შემსრულებლებში.  -->
 <?php if($rating >= 0): ?>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
            <?php  if(!$showuserimg == ""): ?>
<?php   $show_img = base64_encode($showuserimg); ?>
                <a class="" href="userinfo.php?id=<?php echo $roww->id ?>"><img class="servicefrontfoto" src="data:image/jpeg;base64, <?php echo $show_img ?>"></a>
<?php else: ?>
                <a class="" href="userinfo.php?id=<?php echo $roww->id ?>"><img class="servicefrontfoto" src="img/usericon.png"></a>
<?php endif; ?>
            </div>
            <div class="media-icons">

            </div>
            <div class="name-profession">

              <span class="name"><?php echo $roww->name ?></span>
              <span class="profession"><?php echo $roww->category ?></span>
            </div>

            <div class="rating">
            <label class=""><?php echo $row->location ?></label>
       <br>
        <label class="bservicetext"><?php echo round($rating, 1); ?></label>
         <?php
        if (round($rating, 1) == 0): ?>
        <img class="bratingstar" src="img/emptystar.png">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 0 && round($rating, 1) <= 0.5): ?>
        <img class="bratingstar" src="img/hystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 0.5): ?>
        <img class="bratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 1 && round($rating, 1) <= 1.5): ?>
        <img class="bratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 1.5): ?>
        <img class="bratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 2 && round($rating, 1) <= 2.5): ?>
        <img class="bratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 2.5): ?>
        <img class="bratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 3 && round($rating, 1) <= 3.5): ?>
        <img class="bratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 3.5): ?>
        <img class="bratingstar" src="img/ystar.PNG">  <?php endif; ?>
        <?php
        if (round($rating, 1) > 4 && round($rating, 1) <= 4.5): ?>
        <img class="bratingstar" src="img/hystar.PNG">  <?php endif; ?>
         <?php
        if (round($rating, 1) > 4.5): ?>
        <img class="bratingstar" src="img/ystar.PNG">  <?php endif; ?>
            </div>

          <div class="button">
               <span class="profession">სულ შეფასება <?php echo $starquantity; ?></span>

            </div>

          </div>
          </div>
          <?php endif; ?>
            <?php endwhile; ?>
      </div>
    </div>

    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </section>
