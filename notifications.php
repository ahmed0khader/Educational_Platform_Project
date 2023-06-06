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
    <title>الاشعارات</title>

    <?php include 'components/links.php'; ?>


</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">
<h1 class="heading" data-aos="zoom-out">الاشعارات</h1>
    <div class="row">

        <?php
            $notifications = $conn->prepare("SELECT * FROM notifications where user_id = ? order by id desc");
        $notifications->execute([$user_id]);

            ?>
            <table class="table table-striped table-hover" data-aos="zoom-out">
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
                        <?php

                        if($notification['type'] == 'new'){

                            ?>
                <tr>
                            <td class="pt-4 pb-4">
                                <a class="h2" href="watch_video.php?get_id=<?= $notification['related_to']; ?>"><?= $notification['text']; ?></a>
                            </td>
                </tr>
                            <?php

                        }else{


                        ?>
                <tr>
                            <td class="h2 pt-4 pb-4">
                                <a href="message.php?type=in"><?= $notification['text']; ?></a>
                            </td>
                </tr>
                            <?php
                        }
                        }
                    ?>

                    <?php

                }


                $update = $conn->prepare("UPDATE `notifications` SET seen = 1 WHERE user_id = ?");
                $update->execute([$user_id]);

                ?>
                </tbody>
            </table>



    </div>


</section>

<!-- contact section ends -->











<?php include 'components/footer.php'; ?>

<!-- Scripts -->
<?php include 'components/link_scripts.php'; ?>

</body>
</html>