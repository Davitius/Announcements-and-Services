<?php

$user = $_COOKIE['loginuser'];
$category = $_POST['category'];
$title = htmlspecialchars($_POST['title']);
$location = $_POST['location'];
$price = htmlspecialchars($_POST['price']);
$map_input = htmlspecialchars($_POST['map']);
$map_check = substr($map_input, 33, 6);



//echo $map_check;

if(!empty($map_input)){
if($map_check != 'google'){
$error = 'შეიყვანეთ მხოლოდ რუქის HTML კოდი!';
header ("Location: ../newstatement.php?get=$error");
exit();
}else{
$map = $_POST['map'];
}
}else{
$map = '';
}



$img_size1 = $img_size2 = $img_size3 = $img_size4 = $img_size5 = 1024*1024;
$img_type1 = substr($_FILES['pic1']['type'], 0, 5);
$img_type2 = substr($_FILES['pic2']['type'], 0, 5);
$img_type3 = substr($_FILES['pic3']['type'], 0, 5);
$img_type4 = substr($_FILES['pic4']['type'], 0, 5);
$img_type5 = substr($_FILES['pic5']['type'], 0, 5);


if(!empty($_FILES['pic1']['tmp_name'])){
 if($img_type1 === 'image' and $_FILES['pic1']['size'] <= $img_size1){
$pic1 = addslashes(file_get_contents($_FILES['pic1']['tmp_name']));
 }else{
$error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.';
        header ("Location: ../newstatement.php?get=$error");
     exit();
 }
}

if(!empty($_FILES['pic2']['tmp_name'])){
if($img_type2 === 'image' and $_FILES['pic2']['size'] <= $img_size2){
$pic2 = addslashes(file_get_contents($_FILES['pic2']['tmp_name']));
 }else{
$error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.';
        header ("Location: ../newstatement.php?get=$error");
     exit();
 }
}

if(!empty($_FILES['pic3']['tmp_name'])){
if($img_type3 === 'image' and $_FILES['pic3']['size'] <= $img_size3){
$pic3 = addslashes(file_get_contents($_FILES['pic3']['tmp_name']));
 }else{
$error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.';
        header ("Location: ../newstatement.php?get=$error");
     exit();
 }
}

if(!empty($_FILES['pic4']['tmp_name'])){
if($img_type4 === 'image' and $_FILES['pic4']['size'] <= $img_size4){
$pic4 = addslashes(file_get_contents($_FILES['pic4']['tmp_name']));
 }else{
$error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.';
        header ("Location: ../newstatement.php?get=$error");
     exit();
 }
}

if(!empty($_FILES['pic5']['tmp_name'])){
if($img_type5 === 'image' and $_FILES['pic5']['size'] <= $img_size5){
$pic5 = addslashes(file_get_contents($_FILES['pic5']['tmp_name']));
 }else{
$error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg ან jpeg.';
        header ("Location: ../newstatement.php?get=$error");
     exit();
 }
}


$servicetext = htmlspecialchars($_POST['servicetext']);
$stdate = date("Y-m-d");


require_once ('connect.php');
$mysql->query("INSERT INTO `services`
(`user`,
`category`,
`title`,
`location`,
`price`,
`pic1`,
`pic2`,
`pic3`,
`pic4`,
`pic5`,
`map`,
`servicetext`,
`stdate`)
VALUES
('$user',
'$category',
'$title',
'$location',
'$price',
'$pic1',
'$pic2',
'$pic3',
'$pic4',
'$pic5',
'$map',
'$servicetext',
'$stdate')");
$mysql->close();
header ('Location: ../index.php');

?>
