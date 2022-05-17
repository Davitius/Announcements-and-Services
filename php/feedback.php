
<?php

if (!$connect)
{
    die ('ბაზასთან კავშირის შეცდომა');
}

if(isset($_POST['addfeedback'])){

$serviceid = $statement_id;
$servantuser = $author;

$comment = $_POST['feedbacktext'];
$feedbackstar = $_POST['feedbackstar'];

$feedbackmail = $_COOKIE['loginuser'];
$date = 7;


$result = $mysql->query("SELECT * FROM `feedbacks` WHERE `feedbackmail` = '$feedbackmail'");
$userlist = $result->fetch_assoc();

if(!$userlist || count($userlist) == 0){
    $mysql->query("INSERT INTO `feedbacks`
    (`serviceid`,
    `servantuser`,
    `comment`,
    `feedbackstar`,
    `feedbackmail`,
    `date`)
    VALUES
    ('$serviceid',
    '$servantuser',
    '$comment',
    '$feedbackstar',
    '$feedbackmail',
    '$date'");
    $mysql->close();
    ob_end_clean;
    header ('Location: index.php');
    exit();
    }
    }

?>


