<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
   $select_user->execute([$user_id]);
   $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

   $prev_pass = $fetch_user['password'];
   $prev_image = $fetch_user['image'];

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

  if(!empty($name)){
   $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
   $update_name->execute([$name, $user_id]);
   $message[] = 'تم تحديث اسم المستخدم بنجاح!';
  }

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   if(!empty($email)){
      $select_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
      $select_email->execute([$email]);
      if($select_email->rowCount() > 0){
         $message[] = 'البريد الالكتروني اخذ من قبل!';
      }else{
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $message[] = 'تم تحديث البريد الإلكتروني بنجاح!';
      }
   }

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'حجم الصورة كبير جدًا!';
      }else{
         $update_image = $conn->prepare("UPDATE `users` SET `image` = ? WHERE id = ?");
         $update_image->execute([$rename, $user_id]);
         move_uploaded_file($image_tmp_name, $image_folder);
         if($prev_image != '' AND $prev_image != $rename){
            unlink('uploaded_files/'.$prev_image);
         }
         $message[] = 'تم تحديث الصورة بنجاح!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $message[] = 'كلمة المرور القديمة غير متطابقة!';
      }elseif($new_pass != $cpass){
         $message[] = 'تأكيد كلمة المرور غير متطابقة!';
      }else{
         if($new_pass != $empty_pass){
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$cpass, $user_id]);
            $message[] = 'تم تحديث كلمة السر بنجاح!';
         }else{
            $message[] = 'الرجاء إدخال كلمة مرور جديدة!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تحديث الملف الشخصي</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container" style="min-height: calc(100vh - 19rem);">

   <form action="" method="post" enctype="multipart/form-data" data-aos="zoom-out" data-aos-delay="200">
      <h3 >تحديث الملف الشخصي</h3>
      <div class="flex">
         <div class="col">
            <p>اسمك</p>
            <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="100" class="box">
            <p>البريد الإلكتروني</p>
            <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" maxlength="100" class="box">
            <p>موافق</p>
            <input type="file" name="image" accept="image/*" class="box">
         </div>
         <div class="col">
               <p>كلمة المرور القديمة</p>
               <input type="password" name="old_pass" placeholder="أدخل كلمة المرور القديمة" maxlength="50" class="box">
               <p>كلمة المرور الجديدة</p>
               <input type="password" name="new_pass" placeholder="أدخل كلمة المرور الجديدة" maxlength="50" class="box">
               <p>تأكيد كلمة المرور</p>
               <input type="password" name="cpass" placeholder="تأكيد كلمة المرور" maxlength="50" class="box">
         </div>
      </div>
      <input class="update-btn" type="submit" name="submit" value="تحديث الملف">
   </form>

</section>

<!-- update profile section ends -->


<?php include 'components/footer.php'; ?>

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>