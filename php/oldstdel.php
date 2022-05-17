<?php
require_once ('connect.php');
ob_start();


$sqlquery = "SELECT * FROM services";
$resultat = $mysql->query($sqlquery);

while ($row = $resultat->fetch_object()){
$date = $row->stdate;
    $start = strtotime($date);
    $today = strtotime(date("Y-m-d"));
    $pastdays = ceil(abs($today - $start) / 86400);
    $aqtivdays = 30; //განცხადების აქტივობის დღეების რაოდენობა.
$lastdays = $aqtivdays - $pastdays;
//$id = 1;

        if($lastdays <=0){
   $querry = "DELETE FROM `services` WHERE `stdate` = '".$date."'";
            $querry_run = mysqli_query($connect, $querry) or die(mysqli_error());
}
    }


//$mysql->query("INSERT INTO `timestamp`
   // (`deltime`)
   // VALUES
   // ('$today')");
   // $mysql->close();
$todday = date("Y-m-d");
 $deltimequery = "UPDATE `timestamp` SET `deltime` = '".$todday."' WHERE  `id` =  '1'";
    $deltimequery_run = mysqli_query($connect, $deltimequery) or die(mysqli_error());

//UPDATE `timestamp` SET `deltime`='[value-1]' WHERE 1

 ob_end_clean();
    header('Location: ../index.php');

?>
