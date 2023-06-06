<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الملف الشخصي</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="profile">

   <h1 class="heading" data-aos="zoom-out">تفاصيل الملف الشخصي</h1>
 
   <div class="details">

      <div class="user" data-aos="zoom-out" data-aos-delay="200">
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <p>طالب</p>
         <a href="update.php" class="inline-btn">تحديث الملف</a>
      </div>

      <div class="box-container">
         <div class="box" data-aos="zoom-out" data-aos-delay="200">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <h3><?= $total_bookmarked; ?></h3>
                  <span>قوائم التشغيل المحفوظة</span>
               </div>
            </div>
            <a href="bookmark.php" class="inline-btn">عرض قوائم التشغيل</a>
         </div>

         <div class="box" data-aos="zoom-out" data-aos-delay="200">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <h3><?= $total_likes; ?></h3>
                  <span>دروس تعجبني</span>
               </div>
            </div>
            <a href="likes.php" class="inline-btn">دروس تعجبني</a>
         </div>

         <div class="box" data-aos="zoom-out" data-aos-delay="200">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <h3><?= $total_comments; ?></h3>
                  <span>تعليقات الفيديوهات</span>
               </div>
            </div>
            <a href="comments.php" class="inline-btn">عرض التعليقات</a>
         </div>

      </div>

   </div>

</section>

<!-- profile section ends -->


<!-- footer section starts  -->

<?php include 'components/footer.php'; ?>

<!-- footer section ends -->

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>