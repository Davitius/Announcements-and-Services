<?php

//ბაზასთან კავშირისთვის საჭირო პარამეტრები.
$Host = 'localhost';
$DB_UserName = 'root';
$DB_Password = '';
$DB_Name = 'amqaridb';


$connect = mysqli_connect($Host, $DB_UserName, $DB_Password, $DB_Name);
if(!$connect){
    die ('ბაზასთან კავშირის შეცდომა');
}

$mysql = new mysqli($Host, $DB_UserName, $DB_Password, $DB_Name);

?>
