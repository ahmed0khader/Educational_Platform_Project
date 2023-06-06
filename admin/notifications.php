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


    $add_notification = $conn->prepare("INSERT INTO `notifications`(user_id, text) VALUES(?,?)");
    $add_notification->execute([$to_user, 'رسالة جديدة.']);

    $message[] = 'message sent successfully!';

}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاشعارات</title>
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

    <h1 class="heading" data-aos="zoom-out">الاشعارات</h1>

    <div class="row">
        <?php
        $notifications = $conn->prepare("SELECT * FROM notifications where user_id = ? order by id desc");
        $notifications->execute([$tutor_id]);

        ?>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">-</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if($notifications->rowCount() > 0){
                while($notification = $notifications->fetch(PDO::FETCH_ASSOC)){

                    ?>
                    <tr >
                        <td class="h2 pt-4 pb-4 mb-3">
                            <?= $notification['text']; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

                <?php

            }


            $update = $conn->prepare("UPDATE `notifications` SET seen = 1 WHERE user_id = ?");
            $update->execute([$tutor_id]);

            ?>
            </tbody>
        </table>

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