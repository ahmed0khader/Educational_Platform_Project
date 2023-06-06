<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">U-Courses <span style="color:#0ea2bd">Admin</span></a>

      <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="البحث..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
          <div class="fas position-relative">
              <?php

              $count_notifications = $conn->prepare("SELECT * FROM `notifications` WHERE user_id = ? and seen=0");
              $count_notifications->execute([$tutor_id]);
              $total_notifications = $count_notifications->rowCount();

              if ($total_notifications){

              ?>
              <a href="notifications.php">
                  
               <?php
               }else{
               ?>
               <a href="notifications.php">
               <?php
               }
               ?>
                  <i class="fa-sharp fa-solid fa-bell"></i>
                  <?php

                  if ($total_notifications){

                  ?>
              </a>
              <span class="badge rounded-pill badge-notification bg-danger position-absolute p-2" style="font-size:15px"><?= $total_notifications > 0 ? $total_notifications : ''; ?></span>
          <?php

          }
          ?>
          </a>
          </div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn">عرض الملف الشخصي</a>
         
         <a href="../components/admin_logout.php" onclick="return confirm('الخروج من هذا الموقع؟');" class="delete-btn">تسجيل الخروج</a>
         <?php
            }else{
         ?>
         <h3>الرجاء تسجيل الدخول أو التسجيل</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">تسجيل دخول</a>
            <a href="register.php" class="option-btn">إنشاء حساب</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn">عرض الملف الشخصي</a>
         <?php
            }else{
         ?>
         <h3>الرجاء تسجيل الدخول أو التسجيل</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">تسجيل دخول</a>
            <a href="register.php" class="option-btn">إنشاء حساب</a>
         </div>
         <?php
            }
         ?>
      </div>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
      <a href="playlists.php"><i class="fa-solid fa-bars-staggered"></i><span>قوائم التشغيل</span></a>
      <a href="message.php"><i class="fa-solid fa-message"></i><span>الرسائل</span></a>
      <a href="contents.php"><i class="fas fa-graduation-cap"></i><span>المحتويات</span></a>
      <a href="comments.php"><i class="fas fa-comment"></i><span>التعليقات</span></a>
      <a href="../components/admin_logout.php" onclick="return confirm('الخروج من هذا الموقع؟');"><i class="fas fa-right-from-bracket"></i><span>تسجيل الخروج</span></a>
   </nav>

</div>

<!-- side bar section ends -->