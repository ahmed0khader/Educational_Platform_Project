<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
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
   <title>الصفحة الرئيسية</title>

   <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- quick select section starts  -->

<section class=" visually-hidden">

      <?php
         if($user_id != ''){
      ?>
      <div class="box wow animate__fadeInDown animate__animated animate__delay-2s visually-hidden" data-wow-duration="2s" data-wow-offset="150">
         <h3 class="title">الإعجابات والتعليقات</h3>
         <p>إجمالي الإعجابات : <span><?= $total_likes; ?></span></p>
         <a href="likes.php" class="inline-btn">عرض الإعجابات</a>
         <p>مجموع التعليقات : <span><?= $total_comments; ?></span></p>
         <a href="comments.php" class="inline-btn">تعليقات عرض</a>
         <p>قائمة التشغيل المحفوظة : <span><?= $total_bookmarked; ?></span></p>
         <a href="bookmark.php" class="inline-btn">عرض المرجعية</a>
      </div>
      <?php
         }else{ 
      ?>
      <div class="box wow animate__fadeInDown animate__animated animate__delay-2s" data-wow-duration="2s" data-wow-offset="150" style="text-align: center;">
         <h3 class="title">الرجاء تسجيل الدخول أو التسجيل</h3>
         <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">تسجيل الدخول</a>
            <a href="register.php" class="option-btn">إنشاء حساب</a>
         </div>
      </div>
      <?php
      }
      ?>

</section>

<!-- new website -->
<div class="img-hero-animated">
   <section id="hero-animated" class="hero-animated d-flex align-items-center">
      <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
         <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
         <h2>Welcome to <span>U-Courses</span></h2>
         <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
         <div class="d-flex">
            <a href="admin/register.php" class="btn-get-started scrollto"> كن مدرسًا</a>
         </div>
      </div>
   </section>
</div>

   <main id="main">

   <!-- ======= Featured Services Section ======= -->
   <section id="featured-services" class="featured-services">
      <div class="container">

         <div class="row gy-4">

         <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
            <div class="service-item position-relative">
               <div class="icon"><i class="bi bi-chat-left-text icon"></i></div>
               <h4><a href="comments.php" class="stretched-link">مجموع التعليقات</a></h4>
               <p>مجموع تعليقات المستخدمين الخاصة بالمحتوى الذي تقدمه هي <span class="total-home"><?= $total_comments; ?></span> </p>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
            <div class="service-item position-relative">
               <div class="icon"><i class="bi bi-chat-left-heart icon"></i></div>
               <h4><a href="likes.php" class="stretched-link">إجمالي الإعجابات</a></h4>
               <p>مجموع الاعجابات المستخدمين الخاصة بالمحتوى الذي تقدمه هي <span class="total-home"><?= $total_likes; ?></span></p>

            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
            <div class="service-item position-relative">
               <div class="icon"><i class="bi bi-save icon"></i></div>
               <h4><a href="bookmark.php" class="stretched-link">قائمة التشغيل المحفوظة</a></h4>
               <p>مجموع قوائم التشغيل التي قمت بحفظها هي <span class="total-home"><?= $total_bookmarked; ?></span> </p>
               
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
            <div class="service-item position-relative">
               <div class="icon"><i class="bi bi-person-check icon"></i></div>
               <h4><a href="profile.php" class="stretched-link">الملف الشخصي</a></h4>
               <p>لمعرفة المزيد من التفاصيل قم بزيارة ملفك الشخصي من خلال النقر على كلمة الملف الشخصي </p>
            </div>
         </div><!-- End Service Item -->

         </div>

      </div>
   </section><!-- End Featured Services Section -->


   <!-- ======= Clients Section ======= -->
   <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

         <div class="clients-slider swiper">
         <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
         </div>
         </div>

      </div>
   </section><!-- End Clients Section -->

   <!-- ======= Call To Action Section ======= -->
   <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

         <div class="row g-5">

         <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3><em>U-Courses</em>هي عبارة عن بيئة خاصة بشر الدورات التعليمية و التكنولوجيا </h3><br>
            <p> هي منصّة تعليمية عبر الإنترنت مُخصّصة للبالغين، على عكس منصات مووك الأخرى التي تُقدّم برامج تقليدية اجتماعية. تهتم منصة يوديمي بالعديدِ من المحتويات بما في ذلك البرمجة، الترجمة، الرسم، الربح من النت أو الإبداع بصفة عامّة.</p>
            <a class="cta-btn align-self-start" href="contact.php">تواصل معنا </a>
         </div>

         <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <div class="img">
               <img src="assets/img/cta.jpg" alt="" class="img-fluid">
            </div>
         </div>

         </div>

      </div>
   </section><!-- End Call To Action Section -->



   <!-- ======= Features Section ======= -->
   <section id="features" class="features">
      <div class="container" data-aos="fade-up">

         <ul class="nav nav-tabs row gy-4 d-flex">

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
               <i class="bi bi-music-note-beamed color-cyan"></i>
               <h4>موسيقى</h4>
            </a>
         </li><!-- End Tab 1 Nav -->

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
               <i class="bi bi-code-slash color-indigo"></i>
               <h4>برمجيات</h4>
            </a>
         </li><!-- End Tab 2 Nav -->

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
               <i class="bi bi-pencil-fill color-teal"></i>
               <h4>علوم</h4>
            </a>
         </li><!-- End Tab 3 Nav -->

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
               <i class="bi bi-camera-fill color-red"></i>
               <h4>تصوير</h4>
            </a>
         </li><!-- End Tab 4 Nav -->

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-5">
               <i class="bi bi-briefcase-fill color-blue"></i>
               <h4>أعمال</h4>
            </a>
         </li><!-- End Tab 5 Nav -->

         <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-6">
               <i class="bi bi-book color-orange"></i>
               <h4>تكنولوجيا</h4>
            </a>
         </li><!-- End Tab 6 Nav -->

         </ul>

      </div>
   </section><!-- End Features Section -->

   <!-- ======= Services Section ======= -->
   <section id="services" class="services">
      <div class="container" data-aos="fade-up">

         <div class="section-header">
         <h2>خدماتنا</h2>
         </div>

         <div class="row gy-5">

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-1.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-activity"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>سوق الأوراق المالية</h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               </div>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-2.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-broadcast"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>دورات تعليمة </h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               </div>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-3.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-easel"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>التصوير الفوتوغرافي</h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               </div>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-4.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-bounding-box-circles"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>تنمية بشرية</h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               <a href="#" class="stretched-link"></a>
               </div>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-5.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-calendar4-week"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>دراسات متنوعة</h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               <a href="#" class="stretched-link"></a>
               </div>
            </div>
         </div><!-- End Service Item -->

         <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="700">
            <div class="service-item">
               <div class="img">
               <img src="assets/img/services-6.jpg" class="img-fluid" alt="">
               </div>
               <div class="details position-relative">
               <div class="icon">
                  <i class="bi bi-chat-square-text"></i>
               </div>
               <a href="#" class="stretched-link">
                  <h3>الهندسة المعمارية</h3>
               </a>
               <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى.</p>
               <a href="#" class="stretched-link"></a>
               </div>
            </div>
         </div><!-- End Service Item -->

         </div>

      </div>
   </section><!-- End Services Section -->


   <!-- ======= Team Section ======= -->
   <section id="team" class="team">
      <div class="container" data-aos="fade-up">

         <div class="section-header">
         <h2>فريقنا</h2>
         </div>

         <div class="row gy-5">

         <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
               <div class="member-img">
               <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
               </div>
               <div class="member-info">
               <div class="social">
                  <a href="https://twitter.com/home" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"><i class="bi bi-linkedin"></i></a> 
               </div>
               <h4>أحمد خضر</h4>
               <span>مطور ويب</span>
               </div>
            </div>
         </div><!-- End Team Member -->

         <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
            <div class="team-member">
               <div class="member-img">
               <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
               </div>
               <div class="member-info">
               <div class="social">
                  <a href="https://twitter.com/home" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"><i class="bi bi-linkedin"></i></a>
               </div>
               <h4>نضال رضوان</h4>
               <span>مصمم ويب</span>
               </div>
            </div>
         </div><!-- End Team Member -->

         <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
            <div class="team-member">
               <div class="member-img">
               <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
               </div>
               <div class="member-info">
               <div class="social">
                  <a href="https://twitter.com/home" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/" target="_blank"><i class="bi bi-linkedin"></i></a>
               </div>
               <h4>محمود الزعانين</h4>
               <span>مطور ويب</span>
               </div>
            </div>
         </div><!-- End Team Member -->

         </div>

      </div>
   </section><!-- End Team Section -->

   </main><!-- End #main -->

<!-- new website -->


<!-- quick select section ends -->

<!-- courses section starts  -->

<section class="courses">

   <div class="section-header wow animate__fadeInDown animate__animated animate__delay-1s" data-wow-duration="1s" data-wow-offset="150">
      <h2>أحدث الدورات</h2>
    </div>
   <div class="box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC LIMIT 6");
         $select_courses->execute(['active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
      ?>
      <!-- <div class="box wow animate__fadeInDown animate__animated animate__delay-2s" data-wow-duration="2s" data-wow-offset="150"> -->
      <div class="box" data-aos="zoom-in" data-aos-delay="400">
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
         echo '<p class="empty">لم يتم إضافة دورات بعد!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <!-- <a href="courses.php" class="inline-option-btn wow animate__fadeInDown animate__animated animate__delay-1s" data-wow-duration="1s" data-wow-offset="150">عرض المزيد</a> -->
      <a href="courses.php" class="inline-option-btn" data-aos="zoom-in" data-aos-delay="400">عرض المزيد</a>
   </div>

</section>

<!-- courses section ends -->


<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>