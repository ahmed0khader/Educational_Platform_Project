<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

if(isset($_POST['like_content'])){

   if($user_id != ''){

      $content_id = $_POST['content_id'];
      $content_id = filter_var($content_id, FILTER_SANITIZE_STRING);

      $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ? LIMIT 1");
      $select_content->execute([$content_id]);
      $fetch_content = $select_content->fetch(PDO::FETCH_ASSOC);

      $tutor_id = $fetch_content['tutor_id'];

      $select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND content_id = ?");
      $select_likes->execute([$user_id, $content_id]);

      if($select_likes->rowCount() > 0){
         $remove_likes = $conn->prepare("DELETE FROM `likes` WHERE user_id = ? AND content_id = ?");
         $remove_likes->execute([$user_id, $content_id]);
         $message[] = 'تمت إزالتها من الإعجابات!';
      }else{
         $insert_likes = $conn->prepare("INSERT INTO `likes`(user_id, tutor_id, content_id) VALUES(?,?,?)");
         $insert_likes->execute([$user_id, $tutor_id, $content_id]);
         $message[] = 'يضاف إلى الإعجابات!';
      }

   }else{
      $message[] = 'الرجاء تسجيل الدخول أولا!';
   }

}

if(isset($_POST['add_comment'])){

   if($user_id != ''){

      $id = unique_id();
      $comment_box = $_POST['comment_box'];
      $comment_box = filter_var($comment_box, FILTER_SANITIZE_STRING);
      $content_id = $_POST['content_id'];
      $content_id = filter_var($content_id, FILTER_SANITIZE_STRING);

      $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ? LIMIT 1");
      $select_content->execute([$content_id]);
      $fetch_content = $select_content->fetch(PDO::FETCH_ASSOC);

      $tutor_id = $fetch_content['tutor_id'];

      if($select_content->rowCount() > 0){

         $select_comment = $conn->prepare("SELECT * FROM `comments` WHERE content_id = ? AND user_id = ? AND tutor_id = ? AND comment = ?");
         $select_comment->execute([$content_id, $user_id, $tutor_id, $comment_box]);

         if($select_comment->rowCount() > 0){
            $message[] = 'تمت إضافة التعليق بالفعل!';
         }else{
            $insert_comment = $conn->prepare("INSERT INTO `comments`(id, content_id, user_id, tutor_id, comment) VALUES(?,?,?,?,?)");
            $insert_comment->execute([$id, $content_id, $user_id, $tutor_id, $comment_box]);
            $message[] = 'تمت إضافة تعليق جديد!';
         }

      }else{
         $message[] = 'هناك خطأ ما!';
      }

   }else{
      $message[] = 'الرجاء تسجيل الدخول أولا!';
   }

}

if(isset($_POST['delete_comment'])){

   $delete_id = $_POST['comment_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
   $verify_comment->execute([$delete_id]);

   if($verify_comment->rowCount() > 0){
      $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
      $delete_comment->execute([$delete_id]);
      $message[] = 'تم حذف التعليق بنجاح!';
   }else{
      $message[] = 'التعليق تم حذفه بالفعل!';
   }

}

if(isset($_POST['update_now'])){

   $update_id = $_POST['update_id'];
   $update_id = filter_var($update_id, FILTER_SANITIZE_STRING);
   $update_box = $_POST['update_box'];
   $update_box = filter_var($update_box, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ? AND comment = ?");
   $verify_comment->execute([$update_id, $update_box]);

   if($verify_comment->rowCount() > 0){
      $message[] = 'تمت إضافة التعليق بالفعل!';
   }else{
      $update_comment = $conn->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
      $update_comment->execute([$update_box, $update_id]);
      $message[] = 'تم تحرير التعليق بنجاح!';
   }

}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>شاهد الفيديو</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<?php
   if(isset($_POST['edit_comment'])){
      $edit_id = $_POST['comment_id'];
      $edit_id = filter_var($edit_id, FILTER_SANITIZE_STRING);
      $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ? LIMIT 1");
      $verify_comment->execute([$edit_id]);
      if($verify_comment->rowCount() > 0){
         $fetch_edit_comment = $verify_comment->fetch(PDO::FETCH_ASSOC);
?>
<section class="edit-comment">
   <h1 class="heading" data-aos="zoom-out">تعديل التعليق</h1>
   <form action="" method="post">
      <input type="hidden" name="update_id" value="<?= $fetch_edit_comment['id']; ?>">
      <textarea name="update_box" class="box" maxlength="1000" required placeholder="الرجاء إدخال تعليقك" cols="30" rows="10"><?= $fetch_edit_comment['comment']; ?></textarea>
      <div class="flex">
         <a href="watch_video.php?get_id=<?= $get_id; ?>" class="inline-option-btn">إلغاء التحرير</a>
         <input type="submit" value="تحديث الان" name="update_now" class="inline-btn">
      </div>
   </form>
</section>
<?php
   }else{
      $message[] = 'لم يتم العثور على التعليق!';
   }
}
?>

<!-- watch video section starts  -->

<section class="watch-video">

   <?php
      $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ? AND status = ?");
      $select_content->execute([$get_id, 'active']);
      if($select_content->rowCount() > 0){
         while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
            $content_id = $fetch_content['id'];

            $select_likes = $conn->prepare("SELECT * FROM `likes` WHERE content_id = ?");
            $select_likes->execute([$content_id]);
            $total_likes = $select_likes->rowCount();  

            $verify_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND content_id = ?");
            $verify_likes->execute([$user_id, $content_id]);

            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
            $select_tutor->execute([$fetch_content['tutor_id']]);
            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
   ?>
   <div class="video-details"> 
      <video src="uploaded_files/<?= $fetch_content['video']; ?>" class="video" data-aos="zoom-out" data-aos-delay="200" poster="uploaded_files/<?= $fetch_content['thumb']; ?>" controls autoplay></video>
      <h3 class="title"><?= $fetch_content['title']; ?></h3>
      <div class="info">
         <p><i class="fas fa-calendar"></i><span><?= $fetch_content['date']; ?></span></p>
         <p><i class="fas fa-heart"></i><span><?= $total_likes; ?> الإعجابات</span></p>
      </div>
      <div class="tutor wow animate__fadeInDown animate__animated animate__delay-1s" data-wow-duration="1s" data-wow-offset="150">
         <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
         <div>
            <h3><?= $fetch_tutor['name']; ?></h3>
            <span><?= $fetch_tutor['profession']; ?></span>
         </div>
      </div>
      <form action="" method="post" class="flex" data-aos="zoom-out" data-aos-delay="400">
         <input type="hidden" name="content_id" value="<?= $content_id; ?>">
         <a href="playlist.php?get_id=<?= $fetch_content['playlist_id']; ?>" class="inline-btn">عرض قائمة التشغيل</a>
         <?php
            if($verify_likes->rowCount() > 0){
         ?>
         <button type="submit" name="like_content"><i class="fas fa-heart"></i><span>أعجبني</span></button>
         <?php
         }else{
         ?>
         <button type="submit" name="like_content"><i class="far fa-heart"></i><span>يعجبني</span></button>
         <?php
            }
         ?>
      </form>
      <div class="description" data-aos="zoom-out" data-aos-delay="600"><p><?= $fetch_content['description']; ?></p></div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">لم تتم إضافة مقاطع فيديو حتى الآن!</p>';
      }
   ?>

</section>

<!-- watch video section ends -->

<!-- comments section starts  -->

<section class="comments">

   <h1 class="heading" data-aos="zoom-out">اضف تعليق</h1>

   <form action="" method="post" class="add-comment" data-aos="zoom-out" data-aos-delay="200">
      <input type="hidden" name="content_id" value="<?= $get_id; ?>">
      <textarea name="comment_box" required placeholder="اكتب تعليقك ..." maxlength="1000" cols="30" rows="10"></textarea>
      <input type="submit" value="أضف تعليق" name="add_comment" class="inline-btn">
   </form>

   <h1 class="heading" data-aos="zoom-out" data-aos-delay="400">تعليقات المستخدمين</h1>

   
   <div class="show-comments" data-aos="zoom-out" data-aos-delay="600">
      <?php
         $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE content_id = ?");
         $select_comments->execute([$get_id]);
         if($select_comments->rowCount() > 0){
            while($fetch_comment = $select_comments->fetch(PDO::FETCH_ASSOC)){   
               $select_commentor = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_commentor->execute([$fetch_comment['user_id']]);
               $fetch_commentor = $select_commentor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box" style="<?php if($fetch_comment['user_id'] == $user_id){echo 'order:-1;';} ?>">
         <div class="user">
            <img src="uploaded_files/<?= $fetch_commentor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_commentor['name']; ?></h3>
               <span><?= $fetch_comment['date']; ?></span>
            </div>
         </div>
         <p class="text"><?= $fetch_comment['comment']; ?></p>
         <?php
            if($fetch_comment['user_id'] == $user_id){ 
         ?>
         <form action="" method="post" class="flex-btn" data-aos="zoom-out" data-aos-delay="400">
            <input type="hidden" name="comment_id" value="<?= $fetch_comment['id']; ?>">
            <button type="submit" name="edit_comment" class="inline-option-btn">تعديل التعليق</button>
            <button type="submit" name="delete_comment" class="inline-delete-btn" onclick="return confirm('حذف هذا التعليق؟');">حذف تعليق</button>
         </form>
         <?php
         }
         ?>
      </div>
      <?php
       }
      }else{
         echo '<p class="empty">لم يتم إضافة أي تعليقات حتى الآن!</p>';
      }
      ?>
      </div>
   
</section>

<!-- comments section ends -->


<?php include 'components/footer.php'; ?>

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>