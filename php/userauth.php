<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE){
    session_start();
}

$usermail = filter_var(trim($_POST['usermail']), FILTER_SANITIZE_STRING);
$userpass = filter_var(trim($_POST['userpass']), FILTER_SANITIZE_STRING);
$userpass = md5($userpass."jhtg765687yighcf");

require_once 'connect.php';

$query = $mysql->query("SELECT * FROM `users` WHERE `usermail` = '$usermail' AND `userpass` = '$userpass'");

$userlist = $query->fetch_assoc();


if ($userlist !=0){
    setcookie('loginuser', $usermail, time() + 3600, "/");
    header ('Location: ../index.php');
    //echo "ქუქი შეიქმნა";
}
if ($userlist == 0){
    $x1 = 'ელ. ფოსტა ან პაროლი არასწორეა.';
    header ("Location: ../messages.php?get=$x1");
}
?>
