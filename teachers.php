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
   <title>معلمون</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading" data-aos="zoom-out">مدرسين خبراء</h1>

   <form action="search_tutor.php" method="post" class="search-tutor" data-aos="zoom-out" data-aos-delay="200">
      <input type="text" name="search_tutor" maxlength="100" placeholder="بحث عن مدرس ..." required>
      <button type="submit" name="search_tutor_btn" class="fas fa-search"></button>
   </form>

   <div class="box-container">

      <div class="box offer" data-aos="zoom-out" data-aos-delay="400">
         <h3>كن مدرسًا</h3>
         <p class="">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى</p>
         <a href="admin/register.php" class="inline-btn">ابدء الأن</a>
      </div>

      <?php


          $followers = $conn->prepare("SELECT * FROM `followers` where user_id = ?");
          $followers->execute([$user_id]);
          $followers_ids = [];

          if($followers->rowCount() > 0){
              while($follower = $followers->fetch(PDO::FETCH_ASSOC)){
                  $followers_ids[] = $follower['following_id'];
              }
          }


         $select_tutors = $conn->prepare("SELECT * FROM `tutors`");
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


                $count_followers = $conn->prepare("SELECT * FROM `followers` WHERE following_id = ?");
                $count_followers->execute([$tutor_id]);
                $total_followers = $count_followers->rowCount();

      ?>
      <div class="box" data-aos="zoom-out" data-aos-delay="400">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_tutor['profession']; ?></span>
            </div>
         </div>
         <p>قوائم التشغيل : <span><?= $total_playlists; ?></span></p>
         <p>عدد المتابعين : <span><?= $total_followers; ?></span></p>
         <p>إجمالي مقاطع الفيديو : <span><?= $total_contents ?></span></p>
         <p>إجمالي الإعجابات : <span><?= $total_likes ?></span></p>
         <p>مجموع التعليقات : <span><?= $total_comments ?></span></p>
         <form action="tutor_profile.php" method="post">
            <input type="hidden" name="tutor_email" value="<?= $fetch_tutor['email']; ?>">
            <input type="submit" value="عرض الصفحة الشخصية" name="tutor_fetch" class="inline-btn">
         </form>
          <?php
          if (in_array($tutor_id,$followers_ids))
          {
               ?>
          <form action="follow.php" method="post">
              <input type="hidden" name="tutor_id" value="<?= $tutor_id; ?>">
              <input type="submit" value="الغاء متابعة" class="inline-btn">
          </form>
              <a role="button" class="inline-btn" href="message.php?tutor_id=<?= $tutor_id; ?>">إرسال رسالة</a>
               <?php
          }else{
             ?>
              <form action="follow.php" method="post">
                  <input type="hidden" name="tutor_id" value="<?= $tutor_id; ?>">
                  <input type="submit" value="متابعة" class="inline-btn">
              </form>
              <?php
          }
          ?>
      </div>
      <?php
            }
         }else{
            echo '<p class="empty">لم يتم العثور على مدرسين !</p>';
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