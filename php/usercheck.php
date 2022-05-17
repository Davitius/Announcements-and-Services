<?php
require_once ('connect.php');
$usermail = $_COOKIE['usermail'];
$userpass = filter_var(trim($_POST['userpass']), FILTER_SANITIZE_STRING);

if(mb_strlen($userpass) < 3 || mb_strlen($userpass) > 20){
   $x3 = 'პაროლი არ შეესაბამება მოთხოვნებს.';
    header ("Location: ../messages.php?get=$x3");
    exit();
}

$userpass = md5($userpass."jhtg765687yighcf");

//require_once 'connect.php';

$result = $mysql->query("SELECT * FROM `users` WHERE `usermail` = '$usermail'");

$userlist = $result->fetch_assoc();

$star1 = $star2 = $star3 = $star4 = $star5 = 0;

if(!$userlist || count($userlist) == 0){
    $mysql->query("INSERT INTO `users`
    (`usermail`,
    `userpass`,
    `star1`,
    `star2`,
    `star3`,
    `star4`,
    `star5`)
    VALUES
    ('$usermail',
    '$userpass',
    '$star1',
    '$star2',
    '$star3',
    '$star4',
    '$star5')");
    $mysql->close();

    $x2 = 'თქვენ წარმატებით დარეგისტრირდით, . <br>' . 'გთხოვთ გაიაროთ ავტორიზაცია.' . '<br>';
    header ("Location: ../messages.php?get=$x2");
}
?>
