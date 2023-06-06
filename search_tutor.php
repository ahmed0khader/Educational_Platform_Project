<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>مدرسين خبراء</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="teachers">

   <h1 class="heading wow animate__fadeInDown animate__animated animate__delay-1s" data-wow-duration="1s" data-wow-offset="150">مدرسين خبراء</h1>

   <form action="" method="post" class="search-tutor wow animate__fadeInDown animate__animated animate__delay-1s" data-wow-duration="1s" data-wow-offset="150">
      <input type="text" name="search_tutor" maxlength="100" placeholder="بحث عن مدرس ..." required>
      <button type="submit" name="search_tutor_btn" class="fas fa-search"></button>
   </form>

   <div class="box-container">

      <?php
         if(isset($_POST['search_tutor']) or isset($_POST['search_tutor_btn'])){
            $search_tutor = $_POST['search_tutor'];
            $select_tutors = $conn->prepare("SELECT * FROM `tutors` WHERE name LIKE '%{$search_tutor}%'");
            $select_tutors->execute();
            if($select_tutors->rowCount() > 0){
               while($fetch_tutor = $select_tutors->fetch(PDO::FETCH_ASSOC)){

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
      ?>
      <div class="box wow animate__fadeInDown animate__animated animate__delay-2s" data-wow-duration="2s" data-wow-offset="150">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_tutor['profession']; ?></span>
            </div>
         </div>
         <p>قوائم التشغيل : <span><?= $total_playlists; ?></span></p>
         <p>إجمالي مقاطع الفيديو : <span><?= $total_contents ?></span></p>
         <p>إجمالي الإعجابات : <span><?= $total_likes ?></span></p>
         <p>مجموع التعليقات : <span><?= $total_comments ?></span></p>
         <form action="tutor_profile.php" method="post">
            <input type="hidden" name="tutor_email" value="<?= $fetch_tutor['email']; ?>">
            <input type="submit" value="عرض الصفحة الشخصية" name="tutor_fetch" class="inline-btn">
         </form>
      </div>
      <?php
               }
            }else{
               echo '<p class="empty">لم يتم العثور على نتائج !</p>';
            }
         }else{
            echo '<p class="empty">الرجاء البحث عن شيء !</p>';
         }
      ?>

   </div>

</section>

<!-- teachers section ends -->


<?php include 'components/footer.php'; ?>

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>