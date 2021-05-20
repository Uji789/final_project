<?php 

    session_start();
    require_once('../php/connect.php');

    $db_data = mysqli_query($connect, "SELECT * FROM `bp_facts`");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <li class="menu__item"><a class="menu__link" href="/admin_panel/index.php"><img class="menu__img" src="./img/home.png" alt="Home"></a></li>
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
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/admin_panel/index.php"><img class="menu__img" src="/change_page/img/home.png" alt="Home"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="/change_page/img/education.png" alt="Education"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="/change_page/img/profile.png" alt="Profile"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="/change_page/img/email.png" alt="Email"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="/change_page/img/settings.png" alt="Settings"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/php/logout.php"><img class="menu__img" src="/change_page/img/exit.png" alt="Settings"></a></li>
                            </ul>
                        <!-- </nav>
                        <div class="exit mobile__exit">
                            <a class="exit-link" href=""><img class="exit-link__img" src="./img/exit.png" alt=""></a>
                        </div> -->
                    </div>
                </div>
                <div class="content__subtitle">
                    <h2 class="content__subtitle-text">Настройки раздела "Только факты"</h2>
                </div>
                <div class="content__cards">
                <?php
                        $db_data = mysqli_query($connect, "SELECT * FROM `bp_facts`");
                        while ($post = mysqli_fetch_assoc($db_data)) {
                            ?>
                                <div class="card__wrap">
                                    <div class="content__card">
                                        <div class="content__card-img">
                                            <img src="img/<?php echo $post['fact_img'] ?>" alt="">
                                        </div>
                                        <h5 class="content__card-title"><?php echo $post['fact_title'] ?></h5>
                                        <p class="content__card-text"><?php echo $post['fact_text'] ?></p>
                                    </div>
                                    <div class="content__card-controls">
                                        <a href="../facts_change/index.php?id=<?php echo $post['id'] ?>">
                                            <button class="btn content__card-update">Изменить</button>
                                        </a>
                                        <a href="../php/deleteFact.php?id=<?php echo $post['id'] ?>">
                                            <button class="btn content__card-delete">Удалить</button>
                                        </a>
                                    </div>
                                </div>
                            <?
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>