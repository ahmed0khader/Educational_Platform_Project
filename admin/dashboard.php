<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

$select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$select_contents->execute([$tutor_id]);
$total_contents = $select_contents->rowCount();

$select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$select_playlists->execute([$tutor_id]);
$total_playlists = $select_playlists->rowCount();

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
$select_likes->execute([$tutor_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
$select_comments->execute([$tutor_id]);
$total_comments = $select_comments->rowCount();

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>لوحة التحكم</title>
   <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <?php include '../components/links.php'; ?>
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="dashboard">

   <h1 class="heading">لوحة التحكم</h1>

   <div class="box-container">

      <div class="box">
         <h3>مرحباً!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="profile.php" class="btn">عرض الملف الشخصي</a>
      </div>

      <div class="box">
         <h3><?= $total_contents; ?></h3>
         <p>إجمالي المحتويات</p>
         <a href="add_content.php" class="btn">إضافة محتوى جديد</a>
      </div>

      <div class="box">
         <h3><?= $total_playlists; ?></h3>
         <p>إجمالي قوائم التشغيل</p>
         <a href="add_playlist.php" class="btn">إضافة قائمة تشغيل جديدة</a>
      </div>

      <div class="box">
         <h3><?= $total_likes; ?></h3>
         <p>إجمالي الإعجابات</p>
         <a href="contents.php" class="btn">عرض المحتويات</a>
      </div>

      <div class="box">
         <h3><?= $total_comments; ?></h3>
         <p>مجموع التعليقات</p>
         <a href="comments.php" class="btn">تعليقات عرض</a>
      </div>

      <div class="box">
         <h3>حدد مسرعا</h3>
         <p>تسجيل الدخول أو التسجيل</p>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">تسجيل الدخول</a>
            <a href="register.php" class="option-btn">إنشاء حساب</a>
         </div>
      </div>

   </div>

</section>















<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>