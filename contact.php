<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $name = $_POST['name']; 
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email']; 
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number']; 
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg']; 
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if($select_contact->rowCount() > 0){
      $message[] = 'تم ارسال الرسالة بالفعل!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'تم ارسال الرسالة بنجاح!';
   }

}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>اتصال</title>

   <?php include 'components/links.php'; ?>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="assets-login-register/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets-login-register/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets-login-register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets-login-register/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets-login-register/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets-login-register/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets-login-register/register/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets-login-register/contact/main.css">
<!--===============================================================================================-->

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <!-- <div class="row">

      <form action="" method="post" data-aos="fade-right">
         <h3>ابقى على تواصل</h3>
         <input type="text" placeholder="أدخل أسمك" required maxlength="100" name="name" class="box">
         <input type="email" placeholder="أدخل بريدك الإلكتروني" required maxlength="100" name="email" class="box">
         <input type="number" min="0" max="9999999999" placeholder="أدخل رقمك" required maxlength="10" name="number" class="box">
         <textarea name="msg" class="box" placeholder="أدخل رسالتك" required cols="30" rows="10" maxlength="1000"></textarea>
         <input type="submit" value="إرسال رسالة" class="inline-btn" name="submit">
      </form>

      <div class="image" data-aos="fade-right" data-aos-delay="200">
         <img src="images/9814.jpg" alt="">
      </div>

   </div> -->




   <div class="contact1">
		<div class="container-contact1" data-aos="zoom-out">
			

			<form class="contact1-form validate-form" method="post">
				<span class="contact1-form-title">
            ابقى على تواصل
				</span>

				<div class="wrap-input1 validate-input">
					<input class="input1" type="text" name="name" placeholder="أدخل أسمك">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input">
					<input class="input1" type="email" name="email" placeholder="أدخل بريدك الإلكتروني">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input">
					<input class="input1" type="number" min="0" max="9999999999" required maxlength="10" name="number" placeholder="أدخل رقمك">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input">
					<textarea class="input1" name="msg" placeholder="الرسالة"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
            <input type="submit" value="إرسال رسالة" class="inline-btn" name="submit">
				</div>
			</form>
         <div class="contact1-pic js-tilt" data-tilt>
				<img src="assets-login-register/images/contact-us.png" alt="IMG">
			</div>
		</div>
	</div>


   <div class="box-container">

      <div class="box" data-aos="zoom-out">
         <i class="fas fa-phone"></i>
         <h3>رقم الهاتف</h3>
         <a href="tel:+972-59-898-6203">+972-59-898-6203</a>
         <a href="tel:+972-59-898-6203">+972-59-898-6203</a>
      </div>

      <div class="box" data-aos="zoom-out" data-aos-delay="200">
         <i class="fas fa-envelope"></i>
         <h3>عنوان البريد الإلكتروني</h3>
         <a href="mailto:ahmekhader@gmail.com">ahmekhader@gmail.com</a>
         <a href="mailto:ahmekhader@gmail.com">ahmekhader@gmail.com</a>
      </div>

      <div class="box" data-aos="zoom-out" data-aos-delay="400">
         <i class="fas fa-map-marker-alt"></i>
         <h3>عنوان المكتب</h3>
         <a href="#">فلسطين شمال قطاع غزة 
            فلسطين شمال قطاع غزة فلسطين شمال قطاع غزة 
         </a>
      </div>
   </div>

</section>

<!-- contact section ends -->











<?php include 'components/footer.php'; ?>  

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

<!--===============================================================================================-->	
<script src="assets-login-register/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets-login-register/vendor/bootstrap/js/popper.js"></script>
	<script src="assets-login-register/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets-login-register/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets-login-register/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets-login-register/js/main.js"></script>
<!--===============================================================================================-->

</body>
</html>