<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
    $tutor_id = $_COOKIE['tutor_id'];
}else{
    $tutor_id = '';
    header('location:login.php');
}

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $to_user = $_POST['to_user'];
    $text= $_POST['message'];


    $insert_message = $conn->prepare("INSERT INTO `messages`(title, to_user, text,from_user) VALUES(?,?,?,?)");
    $insert_message->execute([$subject, $to_user, $text, $tutor_id]);


    $add_notification = $conn->prepare("INSERT INTO `notifications`(user_id, text,type) VALUES(?,?,'message')");
    $add_notification->execute([$to_user, 'رسالة جديدة.']);

    $message[] = 'تم ارسال الرسالة بنجاح!';

}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرسائل</title>
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <?php include '../components/links.php'; ?>
    <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="playlist-form">

    <h1 class="heading">الرسائل</h1>

    <div class="row">

        <?php
        if (isset($_GET['user_id']))
        {
            ?>


            <form action="" method="post" >
                <p>إرسال رسالة <span>*</span></p>
<!--                <select name="status" class="box" required="">-->
<!--                    <option value="" selected="" disabled="">-- select status</option>-->
<!--                    <option value="active">active</option>-->
<!--                    <option value="deactive">deactive</option>-->
<!--                </select>-->
<!--                <p>playlist title <span>*</span></p>-->
<!--                <input type="text" name="title" maxlength="100" required="" placeholder="enter playlist title" class="box">-->
<!--                <p>playlist description <span>*</span></p>-->
<!--                <textarea name="description" class="box" required="" placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>-->
<!--                <p>playlist thumbnail <span>*</span></p>-->
<!--                <input type="file" name="image" accept="image/*" required="" class="box">-->
<!--                <input type="submit" value="create playlist" name="submit" class="btn">-->

                <input type="text"  placeholder="العنوان" required  name="subject" class="box">
                <input type="hidden"  name="to_user" value="<?= $_GET['user_id']; ?>" class="box">
                <textarea name="message" class="box" placeholder="أدخل رسالتك" required cols="30" rows="10" maxlength="1000"></textarea>
                <input type="submit" value="إرسال رسالة" class="inline-btn" name="submit">

            </form>

            <?php
        }else{
//            from_user = ? or
            $messages = $conn->prepare("SELECT * FROM `messages` where to_user = ?");
            $messages->execute([$tutor_id]);


            ?>
            <div class="box-container">


            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col"  class="h1 text-center fw-bold">المرسل</th>
                <th scope="col"  class="h1 text-center fw-bold">العنوان</th>
                <th scope="col"  class="h1 text-center fw-bold">الرسالة</th>
                <th scope="col"  class="h1 text-center fw-bold">-</th>
            </tr>
            </thead>
            <tbody>
            <?php


            if($messages->rowCount() > 0){
                while($message = $messages->fetch(PDO::FETCH_ASSOC)){


                    $user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $user->execute([$message['from_user']]);
                    $user_first = $user->fetch(PDO::FETCH_ASSOC);


                    ?>
                    <tr>
                        <th scope="row"  class="h2 text-center"><?= $user_first['name']; ?></th>
                        <td  class="h2 text-center"><?= $message['title']; ?></td>
                        <td  class="h2 text-center"><?= $message['text']; ?></td>
                        <td  class="h2 text-center"><a href="message.php?user_id=<?= $message['from_user']; ?>" class="btn btn-messages">ارسال رسالة</a></td>
                    </tr>
                    <?php
                }
                ?>

                <?php

            }

            ?>

            </tbody>
            </table>

            <?php
        }
        ?>
        </div>

    </div>

</section>













<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

<script>
    document.querySelectorAll('.playlists .box-container .box .description').forEach(content => {
        if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
    });
</script>

</body>
</html>