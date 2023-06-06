<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $to_user = $_POST['to_user'];
    $text= $_POST['message'];


    $insert_message = $conn->prepare("INSERT INTO `messages`(title, to_user, text,from_user) VALUES(?,?,?,?)");
    $insert_message->execute([$subject, $to_user, $text, $user_id]);


    $add_notification = $conn->prepare("INSERT INTO `notifications`(user_id, text,type) VALUES(?,?,'message')");
    $add_notification->execute([$to_user, 'رسالة جديدة.']);

    $message[] = 'تم إرسال الرسالة بنجاح!';

}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرسائل</title>

    <?php include 'components/links.php'; ?>

    <link rel="stylesheet" href="css/edit.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="container content-message" data-aos="zoom-out" data-aos-delay="200">

    <div class="row">

        <?php
        if (isset($_GET['tutor_id']))
        {
        ?>


            <form action="" method="post" data-aos="fade-right" class="container-60">

                <input class="send-message-title" type="text"  placeholder="العنوان" required  name="subject" class="box form-control my-3">
                <input type="hidden"  name="to_user" value="<?= $_GET['tutor_id']; ?>" class="box form-control">
                <textarea class="send-message" name="message" class="box form-control" placeholder="أدخل رسالتك" required cols="30" rows="10" maxlength="1000"></textarea>
                <input type="submit" value="إرسال رسالة" class="inline-btn message-btn-hover" name="submit">
            </form>
            <?php
        }else{
//            from_user = ? or

            if (isset($_GET['type']) && $_GET['type'] == 'in')
            {
                $messages = $conn->prepare("SELECT * FROM messages where to_user = ?");
                $messages->execute([$user_id]);
            }else{
                $messages = $conn->prepare("SELECT * FROM messages where from_user = ?");
                $messages->execute([$user_id]);
            }


            ?>
            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <?php
                if (isset($_GET['type']) && $_GET['type'] == 'in')
                {
                ?>

                <th scope="col-xs-3" class="h1 text-center">المرسل</th>
                <th scope="col-xs-3" class="h1 text-center">العنوان</th>
                <th scope="col-xs-3" class="h1 text-center">الرسالة</th>
                <th scope="col-xs-3" class="h1 text-center"></th>
                <?php
                }else{
                ?>

                <th scope="col-xs-3" class="h1">العنوان</th>
                <th scope="col-xs-3" class="h1">الرسالة</th>
                <th scope="col-xs-3" class="h1">المستقبل</th>
                <?php
                }
                ?>
            </tr>
            </thead>
            <tbody>
        <?php

            if($messages->rowCount() > 0){
                while($message = $messages->fetch(PDO::FETCH_ASSOC)){


                    $tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                    $tutor->execute([$message['from_user']]);
                    $tutor_first = $tutor->fetch(PDO::FETCH_ASSOC);
                    if (isset($_GET['type']) && $_GET['type'] == 'in')
                    {
        ?>
                        <tr>
                            <td class="h2 text-center pt-4" scope="row"><?= $tutor_first['name'] ?? ''; ?></td>
                            <td class="h2 text-center pt-4"><?= $message['title']; ?></td>
                            <td class="h2 text-center pt-4"><?= $message['text']; ?></td>
                            <td class="h2 text-center">
                                <a role="button" class="inline-btn message-btn-hover" style="margin: 0.5rem;" href="message.php?tutor_id=<?= $message['from_user']; ?>">إرسال رسالة</a>
                            </td>
                        </tr>
                        <?php
                    }else{
                        while($message = $messages->fetch(PDO::FETCH_ASSOC)){


                            $tutor_to = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                            $tutor_to->execute([$message['to_user']]);
                            $tutor_to_first = $tutor_to->fetch(PDO::FETCH_ASSOC);

                    ?>
                        <tr>
                            <td class="h2 pt-4 pb-4"><?= $message['title']; ?></td>
                            <td class="h2 pt-4 pb-4"><?= $message['text']; ?></td>
                            <td class="h2 pt-4 pb-4"><?= $tutor_to_first['name'] ?? ''; ?></td>

                        </tr>
                    <?php
                }
                }
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


</section>

<!-- contact section ends -->








<?php include 'components/footer.php'; ?>

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>