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
   <title>عنا</title>

   <?php include 'components/links.php'; ?>
  <!-- Vendor CSS Files -->
  <link href="assets-about/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-about/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets-about/css/style.css" rel="stylesheet"></head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<!-- <section class="about">

   <div class="row">
      <div class="content" data-aos="fade-right">
         <h3 class="">لماذا أخترتنا؟</h3>
         <p class="">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى</p>
         <a href="courses.html" class="inline-btn">الدورات</a>
      </div>
      <div class="image" data-aos="fade-right" data-aos-delay="200">
         <img src="images/about-img1.svg" alt="">
      </div>
   </div>

   <div class="box-container">

   <div class="box" data-aos="zoom-out">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+10k</h3>
            <span>دروس مباشرة</span>
         </div>
      </div>

      <div class="box" data-aos="zoom-out" data-aos-delay="200">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+40k</h3>
            <span>الطلاب المتفوقين</span>
         </div>
      </div>

      <div class="box" data-aos="zoom-out" data-aos-delay="400">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+2k</h3>
            <span>مدرسين خبراء</span>
         </div>
      </div>

      <div class="box" data-aos="zoom-out" data-aos-delay="600">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <span>وضع العمل</span>
         </div>
      </div>

   </div>

</section> -->

<!-- about section ends -->

<!-- reviews section starts  -->

<!-- <section>
   <h1 class="heading" data-aos="zoom-in">تقييمات الطلاب</h1>
</section> -->




<main id="main">
    <!-- ======= Breadcrumbs ======= -->


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets-about/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>من المهم تحديد الهدف من التدريب ومعرفة مدى ملائمة الهدف للمتدربين بشكل فعلي، لا بد منن</h3>
            <p class="fst-italic">
            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف 
            </p>
            <ul>
              <li style="font-size: 15px"><i class="bi bi-check-circle"></i> لا تجمع المعلومات عن طريق الإنترنت فقط.</li>
              <li style="font-size: 15px"><i class="bi bi-check-circle"></i> لا بد أن تكون أمينا مع المؤسسة طالبة التدريب وتوضح لها احتياجات المتدربين الحقيقية.</li>
              <li style="font-size: 15px"><i class="bi bi-check-circle"></i> ويجب أن تجيب المادة التدريبية عن الأسئلة الخمسة المعروفة "لماذا، وماذا، وكيف، ومن، وأين"..</li>
            </ul>
            <p>
            ويفضل بالطبع أن يكون التدريب في مجال تخصص المدرب، وإن كان في غير تخصصه يجب أن يتسق مقدم التدريب
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <h4>طلاب</h4>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <h4>دورات</h4>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <h4>الأحداث</h4>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <h4>المدربون</h4>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>التوصيات</h2>
          <p>ماذا يقولون</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets-about/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>أحمد خضر</h3>
                  <h4>مطور ويب</h4>
                  <p style="font-size:15px">
                    <i class="bx bxs-quote-alt-left quote-icon-left"> </i>
                    من المهم تحديد الهدف من التدريب ومعرفة مدى ملائمة الهدف للمتدربين بشكل فعلي، لا بد من اختيار المواضيع التي تلبي حاجة المتدربين، ولا تعتمد على ما تحدده المؤسسة لك، بل عليك أن تقوم بجمع المعلومات والبحث عن احتياجات
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets-about/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>ناديا</h3>
                  <h4>مهندسة برمجيات</h4>
                  <p style="font-size:15px">
                    <i class="bx bxs-quote-alt-left quote-icon-left"> </i>
                    من المهم تحديد الهدف من التدريب ومعرفة مدى ملائمة الهدف للمتدربين بشكل فعلي، لا بد من اختيار المواضيع التي تلبي حاجة المتدربين، ولا تعتمد على ما تحدده المؤسسة لك، بل عليك أن تقوم بجمع المعلومات والبحث عن احتياجات
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets-about/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>فاطمة أحمد</h3>
                  <h4> Ul/Ux مصمم</h4>
                  <p style="font-size:15px">
                    <i class="bx bxs-quote-alt-left quote-icon-left"> </i>
                    من المهم تحديد الهدف من التدريب ومعرفة مدى ملائمة الهدف للمتدربين بشكل فعلي، لا بد من اختيار المواضيع التي تلبي حاجة المتدربين، ولا تعتمد على ما تحدده المؤسسة لك، بل عليك أن تقوم بجمع المعلومات والبحث عن احتياجات
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets-about/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>نضال رضوان</h3>
                  <h4>مطور تطبيقات هواتف</h4>
                  <p style="font-size:15px">
                    <i class="bx bxs-quote-alt-left quote-icon-left"> </i>
                    من المهم تحديد الهدف من التدريب ومعرفة مدى ملائمة الهدف للمتدربين بشكل فعلي، لا بد من اختيار المواضيع التي تلبي حاجة المتدربين، ولا تعتمد على ما تحدده المؤسسة لك، بل عليك أن تقوم بجمع المعلومات والبحث عن احتياجات
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
<!-- reviews section ends -->


<?php include 'components/footer.php'; ?>

<!-- Scripts -->

  <!-- Vendor JS Files -->
  <script src="assets-about/vendor/purecounter/purecounter_vanilla.js"></script>
  <?php include 'components/link_scripts.php'; ?>
  <!-- Template Main JS File -->
  <script src="assets-about/js/main.js"></script>

</body>
</html>