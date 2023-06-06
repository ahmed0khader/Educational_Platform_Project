<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['tutor_fetch'])){

   $tutor_email = $_POST['tutor_email'];
   $tutor_email = filter_var($tutor_email, FILTER_SANITIZE_STRING);
   $select_tutor = $conn->prepare('SELECT * FROM `tutors` WHERE email = ?');
   $select_tutor->execute([$tutor_email]);

   $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
   $tutor_id = $fetch_tutor['id'];

   $count_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
   $count_playlists->execute([$tutor_id]);
   $total_playlists = $count_playlists->rowCount();

   $count_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
   $count_contents->execute([$tutor_id]);
   $total_contents = $count_contents->rowCount();

   $count_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
   $count_likes->execute([$tutor_id]);
   $total_likes = $count_likes->rowCount();

   $count_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
   $count_comments->execute([$tutor_id]);
   $total_comments = $count_comments->rowCount();

}else{
   header('location:teachers.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الملف الشخصي للمدرس</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers profile section starts  -->

<section class="tutor-profile">

   <h1 class="heading" data-aos="zoom-out">تفاصيل الملف الشخصي</h1>

   <div class="details">
      <div class="tutor" data-aos="zoom-out" data-aos-delay="200">
         <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
         <h3><?= $fetch_tutor['name']; ?></h3>
         <span><?= $fetch_tutor['profession']; ?></span>
      </div>
      <div class="flex" data-aos="zoom-out" data-aos-delay="200">
         <p>إجمالي قوائم التشغيل : <span><?= $total_playlists; ?></span></p>
         <p>إجمالي مقاطع الفيديو : <span><?= $total_contents; ?></span></p>
         <p>إجمالي الإعجابات : <span><?= $total_likes; ?></span></p>
         <p>مجموع التعليقات : <span><?= $total_comments; ?></span></p>
      </div>
   </div>

</section>

<!-- teachers profile section ends -->

<section class="courses">

   <h1 class="heading" data-aos="zoom-out">أحدث الدورات </h1>

   <div class="box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? AND status = ?");
         $select_courses->execute([$tutor_id, 'active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box" data-aos="zoom-out" data-aos-delay="200">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_course['title']; ?></h3>
         <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">عرض قائمة التشغيل</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">لم يتم إضافة دورات بعد !</p>';
      }
      ?>

   </div>

</section>

<!-- courses section ends -->




<?php include 'components/footer.php'; ?>    

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>