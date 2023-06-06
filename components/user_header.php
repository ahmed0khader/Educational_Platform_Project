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

      <a href="home.php" class="logo">U-Courses</a>

      <form action="search_course.php" method="post" class="search-form">
         <input type="text" name="search_course" placeholder="بحث" required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_course_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <!-- <div id="toggle-btn" class="fas fa-sun"></div> -->
         <!-- <div class="fa-sharp fa-solid fa-bell"></div> -->
         <div class="fas position-relative">
             <?php

             $count_notifications = $conn->prepare("SELECT * FROM `notifications` WHERE user_id = ? and seen=0");
             $count_notifications->execute([$user_id]);
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
            
                <i class="fa-sharp fa-solid fa-bell icon-notifications"></i>
                 <?php

                 if ($total_notifications){

                 ?>
             </a>
             
             <span class="badge rounded-pill badge-notification bg-danger position-absolute" style="font-size:15px"><?= $total_notifications > 0 ? $total_notifications : ''; ?></span>
         <?php

         }
         ?>
         </a>
         </div>


         
         <!-- <div id="user-btn" class="fas fa-user"></div> -->
         <div id="user-btn" class="fas fa-user">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);}
         ?>
         <!-- <img src="uploaded_files/ /*?=// $fetch_profile['image']; ?>*/" style="width: 100%; height:100%; border-radius: 4px;"   loading="lazy"alt=""> -->
         </div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>طالب</span>
         <a href="profile.php" class="btn" style="font-size:17px; padding:13px">عرض الصفحة الشخصية</a>
         <a href="components/user_logout.php" onclick="return confirm('هل ترغب بالخروج من هذا الموقع؟');" class="delete-btn">تسجيل خروج</a>
         <?php
            }else{
         ?>
         <h3>الرجاء تسجيل الدخول أو التسجيل</h3>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">تسجيل الدخول</a>
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
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>طالب</span>
         <?php
            }else{
         ?>
         <h3>الرجاء تسجيل الدخول أو التسجيل</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">تسجيل الدخول</a>
            <a href="register.php" class="option-btn">إنشاء حساب</a>
         </div>
         <?php
            }
         ?>
      </div>

   <nav class="s-navbar">
      <ul class="sidenav-menu">
               <li class="sidenav-item">
                  <a class="sidenav-link" href="home.php"> <i class="fas fa-home"></i><span>الصفحة الرئيسية</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="about.php"> <i class="fas fa-solid fa-address-card"></i><span>عنا</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="courses.php"> <i class="fas fa-graduation-cap"></i><span>الدورات</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="message.php?type=in">
                     <i class="fas fa-message"></i><span>الرسائل الواردة</span></a>
               </li>
              <li class="sidenav-item">
                  <a class="sidenav-link" href="message.php">
                      <i class="fas fa-paper-plane"></i><span>الرسائل المرسلة</span></a>
              </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="likes.php"> <i class="fas fa-heart"></i><span>المفضلة</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="teachers.php"> <i class="fas fa-chalkboard-user"></i><span>معلمون</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="contact.php"> <i class="fas fa-headset"></i><span>اتصل بنا </span></a>
               </li>
            </ul>
            <hr class="m-0" />
            <ul class="sidenav-menu s-navbar">
               <li class="sidenav-item">
                  <a class="sidenav-link" href="update.php"> <i class="fas fa-cogs"></i><span>إعدادات</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="profile.php"> <i class="fas fa-user"></i><span>الملف الشخصي</span></a>
               </li>
               <li class="sidenav-item">
                  <a class="sidenav-link" href="components/user_logout.php" onclick="return confirm('هل ترغب بالخروج من هذا الموقع؟');"> <i class="fas fa-user-astronaut"></i><span>تسجيل خروج</span></a>
               </li>
            </ul>
   </nav>

</div>

<!-- side bar section ends -->