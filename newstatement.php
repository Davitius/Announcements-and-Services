<?php
//სესიის შემოწმება
if (!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == ''):
header ('Location: index.php');
?>
<?php else: ?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Head -->
   <?php
      include 'php/head.php';
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
<!-- ახალი განცხადების ფორმა -->
<form action="php/addservice.php" method="post" enctype="multipart/form-data">

<div class="row">

<!-- მომსახურების სფერო -->
     <div class="col-lg-6">
<div class="col-lg-12" style="background-color: white;">
        <center>
            <div class="container">
<label class="nstitle">მომსახურების სფერო.</label><label class="nstrs">*</label>
     <select class="form-control" name="category" id="category" required>
        <option value=""></option>
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
<br>
       <!-- სათაური -->
        <label class="nstitle">სათაური.</label><label class="nstrs">*</label>
      <input class="form-control" placeholder="მოკლე აღწერა. (მაქსიმუმ 45 სიმბოლო)" required name="title" id="title" maxlength="45">
      <br>


<!-- მდებარეობა -->
<label class="nstitle">მდებარეობა.</label><label class="nstrs">*</label>
       <select class="form-control" name="location" id="location" required>
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
            </div>
            <br>
        </center>
      </div>
</div>

<!--ასატვირთი ფოტოების ფანჯარა  -->
<div class="col-lg-6">
<div class="col-lg-12" style="background-color: white;">
<center>
        <label class="nstitle">ატვირთეთ ფოტოები.</label>
        <br>
<!-- სურათის ERROR შეტყობინება -->
        <?php
    $get = $_GET['get'];
         if($get == 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>
        <br>
        <div class="btn-group">
        <label class="">1_</label>
        <input type="file" name="pic1" class="form-control" id="pic1">
        </div>
        <br>
        <div class="btn-group">
        <label class="">2_</label>
        <input type="file" name="pic2" class="form-control" id="pic2">
        </div>
        <br>
        <div class="btn-group">
        <label class="">3_</label>
        <input type="file" name="pic3" class="form-control" id="pic3">
        </div>
        <br>
        <div class="btn-group">
        <label class="">4_</label>
        <input type="file" name="pic4" class="form-control" id="pic4">
        </div>
        <br>
        <div class="btn-group">
        <label class="">5_</label>
        <input type="file" name="pic5" class="form-control" id="pic5">
        </div>
<br><br>
</center>
      </div>
    </div>
    </div><!-- /.row -->

<hr class="featurette-divider">

<div class="row">
<!-- განცხადების ტექსტის ფაჯარა -->
<div class="col-lg-6">
<div class="col-lg-12" style="background-color: white; height: 450px;">
<center>
   <label class="nstitle">სერვისის ან განცხადების ტექსტი.</label><label class="nstrs">*</label>
   <br>
   <textarea class="form-control" type="text" placeholder="" name="servicetext" cols="70" rows="15" maxlength="" id="servicetext" required></textarea></center>
   <br>
    </div>
    </div>

<!-- ლოკაცია რუქაზე -->
  <div class="col-lg-6">
        <div class="col-lg-12" style="background-color: white; height: 450px;">
        <center>
            <div class="container">
<label class="nstitle">მონიშნეთ ლოკაცია რუქაზე.</label>
          <br>
          <!-- ლოკაციის ERROR შეტყობინება -->
          <?php
                    if($get == 'შეიყვანეთ მხოლოდ რუქის HTML კოდი!'): ?>
         <center><label class="" style="font-family: GeoArt; color: red; font-size: 100%; font-weight: bold;"><?php echo $get; ?></label></center><br>
         <?php endif; ?>

                <input class="form-control" name="map" id="map" placeholder="ჩასვით HTML კოდი" maxlength="500">
<br>
           <a href="https://www.google.com.ar/maps/@41.7380917,43.4712926,7.75z/data=!4m2!10m1!1e1">1. შედის გუგლის რუქაზე.</a>
           <br>
           <label class="">2. აირჩიეთ ადგილმდებარეობა.</label>
           <br>
           <label class="">3. მენიუში აირჩიეთ "გააზიარეთ ან მონიშნეთ რუქა".</label>
           <br>
           <label class="">4. გადადით "რუქის ჩაშენება-ზე".</label>
           <br>
           <label class="">5. დააკოპირეთ HTML კოდი და ჩასვით ველში..</label>
           <br><br>
           <label class="nstitle">ფასი.</label><label class="nstrs">*</label>
           <br>
           <input class="form-control" type="number" name="price" id="price" placeholder="" required>
           <label class="" style="font-size: 90%">თუ გსურთ რომ გამოჩნდეს "ფასი: შეთანხმებით", ჩაწერეთ ველში 0</label>
           <br>
            </div>
        </center>
      </div>
    </div>
  </div>
  <br>
  <center><input type="checkbox" required><label class="nstitle"> _ ვეთანხმები პირობებს.</label><label class="nstrs">*</label>
   <br><br>
    <button class="btn-addservice" type="submit" name="addservice">განცხადების განთავსება.</button></center>
    </form>

     <div class="col-lg-1"></div>
      </div>
  </div><!-- ROW -->


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
