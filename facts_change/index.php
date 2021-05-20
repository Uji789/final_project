<?php 

    session_start();

    $id = $_GET['id'];

    require_once('../php/connect.php');

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
                    <li class="menu__item"><a class="menu__link" href="/facts_page/index.php"><img class="menu__img" src="./img/home.png" alt="Home"></a></li>
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
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/facts_page/index.php"><img class="menu__img" src="./img/home.png" alt="Home"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/education.png" alt="Education"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/profile.png" alt="Profile"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/email.png" alt="Email"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="#"><img class="menu__img" src="./img/settings.png" alt="Settings"></a></li>
                                <li class="mobile-menu__item"><a class="mobile-menu__link" href="/php/logout.php"><img class="menu__img" src="./img/exit.png" alt="Exit"></a></li>
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
            </div>
            <div class="change">
                <form action="../php/updateFact.php" class="form change__form" method="POST">
                    <div class="change__form-field not__margin">
                        <label for="">Заголовок факта:</label>
                        <input type="text" name="fact_title" id="" value="<?php echo $post['fact_title'] ?>">
                    </div>
                    <div class="change__form-field">
                        <label for="">Описание факта:</label>
                        <input type="text" name="fact_text" id="" value="<?php echo $post['fact_text'] ?>">
                    </div>
                    <div class="control">
                        <input type="text" name="fact_id" hidden value="<?php echo $post['id'] ?>">
                        <button class="button button__accent" type="submit">Обновить</button>
                        <a href="../facts_page/index.php">
                            <button class="button button__white" type="submit">Вернуться</button>
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="./js/main.js"></script>
</body>
</html>