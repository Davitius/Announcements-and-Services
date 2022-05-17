<?php
require_once ('connect.php');
$usermail = $_COOKIE['loginuser'];
$category = $_POST['category'];

$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$lname = filter_var(trim($_POST['lname']),
FILTER_SANITIZE_STRING);
$mobile = filter_var(trim($_POST['mobile']),
FILTER_SANITIZE_STRING);

$userpass = filter_var(trim($_POST['userpass']),
FILTER_SANITIZE_STRING);


 if(mb_strlen($mobile) != 9){
           $error = 'მობილური ფორმატი უნდა იყოს:' . '<br>' . '5xxxxxxxx, სულ 9 სიმბოლო.';
        header ("Location: ../profile.php?get=$error");
    exit();
 }


    if(mb_strlen($userpass) == 32){
        $userpass = $_POST['userpass'];
    }
    else{
       if(mb_strlen($userpass) < 5 || mb_strlen($userpass) > 12){
           $error = 'პაროლი უნდა იყოს მინიმუმ 5 სიმბოლო' . '<br>' . 'და მაქსიმუმ 12 სიმბოლო';
        header ("Location: ../profile.php?get=$error");
    exit();
       }
        else{$userpass = md5($userpass."jhtg765687yighcf");}
    }






if(!empty($_FILES['userpic']['tmp_name'])){

$img_type = substr($_FILES['userpic']['type'], 0, 5);
$img_size = 1024*1024;

    if(!empty($_FILES['userpic']['tmp_name']) and $img_type === 'image' and $_FILES['userpic']['size'] <= $img_size){
$userpic = addslashes(file_get_contents($_FILES['userpic']['tmp_name']));

    $query = "UPDATE `users` SET `name`='".$name."', `lname`='".$lname."', `mobile`='".$mobile."', `category`='".$category."', `userpass`='".$userpass."', `userpic`='".$userpic."' WHERE `usermail` = '".$usermail."'";
    $query_run = mysqli_query($connect, $query) or die(mysqli_error());
                                     }
    else{
       $error = 'სურათი არ უნდა აღემატებოდეს 1 მეგაბაიტს.' . '<br>' . 'და უნდა იყოს ერთერთი ფორმატი: jpg; jpeg;';
        header ("Location: ../profile.php?get=$error");
         }
}
else{

 $query = "UPDATE `users` SET `name`='".$name."', `lname`='".$lname."', `mobile`='".$mobile."', `category`='".$category."', `userpass`='".$userpass."' WHERE `usermail` = '".$usermail."'";
    $query_run = mysqli_query($connect, $query) or die(mysqli_error());
}


     if($query_run)
    {
        $error = 'მონაცემები წარმატებით განახლდა';
        header ("Location: ../profile.php?get=$error");
        exit();
    }
    else
    {
        echo "მონაცემები არ განახლდა";
    }
?>
