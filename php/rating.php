<?php
$star1 = $auth->star1;
$star1q = $star1;
$star2 = $auth->star2;
$star2q = $star2/2;
$star3 = $auth->star3;
$star3q = $star3/3;
$star4 = $auth->star4;
$star4q = $star4/4;
$star5 = $auth->star5;
$star5q = $star5/5;

$starquantity = $star1q+$star2q+$star3q+$star4q+$star5q;
if($starquantity !=0){
    $rating = ($star1+$star2+$star3+$star4+$star5)/$starquantity;
                     }else {$rating = 0;}
?>
