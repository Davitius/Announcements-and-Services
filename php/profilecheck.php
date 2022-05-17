<?php
require_once ('connect.php');

$author = $_COOKIE['loginuser'];
$sqlquery = "SELECT * FROM users WHERE usermail = '$author'";
$resultat = $mysql->query($sqlquery);
$row = $resultat->fetch_object();

$name = $row->name;
$mobile = $row->mobile;
$category = $row->category;



 if (!isset($_COOKIE['loginuser']) || $_COOKIE['loginuser'] == '')
 {

         $x1 = 'ახალი სერვისის დამატებისთვის' . '<br>' .'საჭიროა გაიაროთ ავტორიზაცია.';
            header ("Location: ../login.php?get=$x1");
 }
else{



if(($name != '') && ($mobile != '') && ($category != ''))
{
    header ('Location: ../newstatement.php');

}
else
{
    $y1 = 'განცხადების განთავსებისთვის საჭიროა პირადი ინფორმაციის განახლება.';
    header ("Location: ../profile.php?get=$y1");
}

}



?>
