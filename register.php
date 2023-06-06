<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   
   if($select_user->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm passowrd not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         
         $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
         $verify_user->execute([$email, $pass]);
         $row = $verify_user->fetch(PDO::FETCH_ASSOC);
         
         if($verify_user->rowCount() > 0){
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<title>إنشاء حساب</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <?php include 'components/links.php'; ?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
	<link rel="stylesheet" type="text/css" href="assets-login-register/register/css/main.css">
<!--===============================================================================================-->
</head>

</head>
<body>



<div class="limiter">
		<div class="skewed container-login100">
			<div class="header finisher-header" style="width: 100%; height: 100vh;">
				<div class="wrap-login100">
					

					<form class="login100-form validate-form" method="post" enctype="multipart/form-data">
						<span class="login100-form-title">
							تسجيل الدخول
						</span>

						<div class="wrap-input100 validate-input" data-validate = "أسم المستخدم مطلوب">
							<input class="input100" type="text" name="name" placeholder="اسم المستخدم">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate = "مطلوب بريد إلكتروني صالح example@example.com">
							<input class="input100" type="email" name="email" placeholder="البريد الالكتروني">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "مطلوب كلمة مرور">
							<input class="input100" type="password" name="pass" placeholder="كلمة المرور">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "تأكيد كلمة المرور">
							<input class="input100" type="password" name="cpass" placeholder="تأكيد كلمة المرور">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						
						<div class="wrap-input100 validate-input" data-validate = "">
							<input class="input100" type="file" name="image" accept="image/*" class="box" style="padding: 1rem">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-image" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
              <input type="submit" name="submit" class="login100-form-btn" value="إنشاء حساب">
						</div>

						<div class="text-center p-t-20">
							<a class="txt2" href="login.php">
								تسجيل الدخول
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
					<div class="login100-pic js-tilt p-t-100" data-tilt>
						<img src="assets-login-register/images/img-01.png" alt="IMG">
					</div>
				</div>
			</div>
		</div>
	</div>

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
<!-- background -->
	<script src="assets-login-register/js/finisher-header.es5.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      new FinisherHeader({
        "count": 20,
        "size": {
          "min": 59,
          "max": 122,
          "pulse": 0.5
        },
        "speed": {
          "x": {
            "min": 0,
            "max": 1.6
          },
          "y": {
            "min": 0,
            "max": 1
          }
        },
        "colors": {
          "background": "#1691a7",
          "particles": [
            "#2c3e50",
            "#87ddfe",
            "#8481ff",
            "#cccccc",
            "#82ce60"
          ]
        },
        "blending": "screen",
        "opacity": {
          "center": 0,
          "edge": 1
        },
        "skew": 0,
        "shapes": [
          "c",
          "t",
          "s"
        ]
      });
      </script>

</body>
</html>

<!-- <script type="text/javascript">
      new FinisherHeader({
        "count": 20,
        "size": {
          "min": 59,
          "max": 122,
          "pulse": 0.5
        },
        "speed": {
          "x": {
            "min": 0,
            "max": 1.6
          },
          "y": {
            "min": 0,
            "max": 1
          }
        },
        "colors": {
          "background": "#3f3d56",
          "particles": [
            "#0ea2bd",
            "#87ddfe",
            "#8481ff",
            "#cccccc",
            "#1691a7"
          ]
        },
        "blending": "screen",
        "opacity": {
          "center": 0,
          "edge": 1
        },
        "skew": 0,
        "shapes": [
          "c",
          "t",
          "s"
        ]
      });
      </script> -->