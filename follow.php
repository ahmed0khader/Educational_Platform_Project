<?php


include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:home.php');
}

$followers = $conn->prepare("SELECT * FROM `followers` where user_id = ? AND following_id = ?");
$followers->execute([$user_id, $_POST['tutor_id']]);


if($followers->rowCount() > 0){
    $remove = $conn->prepare("DELETE FROM `followers` WHERE user_id = ? AND following_id = ?");
    $remove->execute([$user_id, $_POST['tutor_id']]);
}else{
    $insert = $conn->prepare("INSERT INTO `followers`(user_id, following_id) VALUES(?,?)");
    $insert->execute([$user_id, $_POST['tutor_id']]);

    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_profile->execute([$user_id]);
    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

    $add_notification = $conn->prepare("INSERT INTO `notifications`(user_id, text,type) VALUES(?,?,'follow')");
    $add_notification->execute([$_POST['tutor_id'], 'قام '.$fetch_profile['name'].' بعمل متابعة لك.']);

}


header('location:teachers.php');