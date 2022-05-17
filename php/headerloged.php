<?php
require_once ('php/connect.php');
$author = $_COOKIE['loginuser'];
$user = mysqli_query($connect, "SELECT * FROM users WHERE usermail = '$author'");
$user = mysqli_fetch_assoc($user);
?>




 <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="" href="index.php"><label class="navbartitle">ამქარი</label></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarCollapse" style="color: yellow">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
           <a class="nav-link" href="index.php" style="color: white; hover: lawngreen">მთავარი</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" style="color: white; hover: lawngreen">ჩვენს შესახებ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" style="color: white; hover: lawngreen">კონტაქტი</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="php/profilecheck.php"><button class="btn-nav2" style="border-radius: 20px"> + სერვისის დამატება</button></a>
          </li>
        </ul>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            $image = $user['userpic'];
      if(!$image == ""): ?>
             <?php    $show_img = base64_encode($image); ?>
        <img src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="" width="32" height="32" class="rounded-circle">
           <?php else: ?>
            <img src="img/usericon.png" width="32" height="32" class="rounded-circle">
            <?php endif; ?>
            <label class="user" style="color: white; hover: lawngreen">კაბინეტი</label>
          </a>

         <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px" aria-labelledby="dropdownUser1">

         <li><a class="dropdown-item" href="" style="font-size: 70%; color: white; hover: lawngreen" ><?php echo $author; ?></a></li>
    <li><a class="dropdown-item" href="newstatement.php" style="color: white; hover: lawngreen">სირვისის დამატება</a></li>
    <li><a class="dropdown-item" href="profile.php" style="color: white; hover: lawngreen">ჩემი პროფილი</a></li>
    <li><hr class="dropdown-divider" style="color: white; hover: lawngreen"></li>
    <li><a class="dropdown-item" href="php/userexit.php" style="color: white; hover: lawngreen">გასვლა</a></li>

  </ul>

        </div>

        <div class="d-flex gap-5 justify-content-center" id="dropdownMacos" >

</div>

      </div>
    </div>
  </nav>
</header>
















