<?php 

    session_start();

    $id = $_GET['id'];

    require_once('php/connect.php');

    $db_data = mysqli_query($connect, "SELECT * FROM `bp_posts` WHERE `id` = '$id'");
    $post = mysqli_fetch_assoc($db_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройки курса</title>
    <link rel="stylesheet" href="./fonts/stylesheet.css">
    <link rel="stylesheet" href="./css/hamburgers.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="main">
        <section class="aside">
            <div class="logo aside__logo">
                <a href="#" class="aside__logo-link">
                    <img class="aside__logo-img" src="./img/logo.png" alt="Logo">
                </a>
            </div>
            <nav class="menu aside__menu">
                <ul class="menu-list aside__menu-list">
                    <li class="menu__item"><a class="menu__link" href="/index.php"><img class="menu__img" src="./img/home.png" alt="Home"></a></li>
                    <li class="menu__item"><a class="menu__link" href="#"><img class="menu__img" src="./img/education.png" alt="Education"></a></li>
                    <li class="menu__item"><a class="menu__link" href="#"><img class="menu__img" src="./img/profile.png" alt="Profile"></a></li>
                    <li class="menu__item"><a class="menu__link" href="#"><img class="menu__img" src="./img/email.png" alt="Email"></a></li>
                    <li class="menu__item"><a class="menu__link" href="#"><img class="menu__img" src="./img/settings.png" alt="Settings"></a></li>
                </ul>
            </nav>
            <div class="exit aside__exit">
                <a class="exit-link" href="/php/logout.php"><img class="exit-link__img" src="./img/exit.png" alt=""></a>
            </div>
        </section>
        <section class="content">
            <div class="container content__container">
                <div class="content__title">
                    <h2 class="content__title-text">Панель администратора</h2>
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="mobile">
                        <nav class="menu mobile__menu">
                            <ul class="menu-list mobile__menu-list">
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/admin_panel/index.php"><img class="menu__img" src="./img/home.png" alt="Home"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/education.png" alt="Education"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/profile.png" alt="Profile"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/email.png" alt="Email"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/settings.png" alt="Settings"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/php/logout.php"><img class="menu__img" src="./img/exit.png" alt="Settings"></a></li>
                            </ul>
                        <!-- </nav>
                        <div class="exit mobile__exit">
                            <a class="exit-link" href=""><img class="exit-link__img" src="./img/exit.png" alt=""></a>
                        </div> -->
                    </div>
                </div>
                <div class="content__subtitle">
                    <h2 class="content__subtitle-text"><?php echo $post['post_title'] ?></h2>
                    <div class="content__subtitle-img">
                        <img class="image" src="./img/<?php echo $post['post_image'] ?>" alt="">
                    </div>
                </div>
                <div class="content__addition">
                    <div class="content__addition-author">
                        <p class="content__addition-author-text">Автор курса:  <strong><?php echo $post['post_author'] ?></strong></p>
                    </div>
                    <div class="content__addition-time">
                        <p class="content__addition-time-text">Продолжительность курса:  <strong><?php echo $post['post_text'] ?></strong></p>
                    </div>
                    <div class="content__addition-rating">
                        <p class="content__addition-rating-text">Популярность курса:  <strong><?php echo $post['post_intens'] ?></strong></p>
                    </div>
                </div>
                <div class="content__about">
                    <p class="content__about-text"><?php echo nl2br($post['post_about'], false) ?></p>
                </div>
            </div>
            <div class="control">
            <input type="text" name="post_id" hidden value="<?php echo $post['id'] ?>">
                <a href="/admin_panel/index.php">
                    <button class="button button__white" type="submit">Вернуться</button>
                </a>
            </div>
        </section>
    </main>
    <script src="./js/main.js"></script>
</body>
</html>