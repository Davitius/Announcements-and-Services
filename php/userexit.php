<?php
//error_reporting(E_ERROR);
setcookie('loginuser', $usermail, time() - 3600, "/");
header('Location: ../index.php');

?>
