<?php 

session_start();

require_once('../php/connect.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="user-wrapper">
        <main class="user-main">
            <aside class="user-header">
                <nav class="user-header__list">
                    <ul class="user-header__menu">
                        <li class="user-header__item" tabindex="0">
                            <a href="#" class="user-header__link">
                                <img class="user-header__image" src="img/facebook.svg" alt="facebook">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/facebook.svg" alt="facebook">
                                </span>
                            </a>
                        </li>
                        <li class="user-header__item-close">
                            <img class="user-header__close" src="img/close.svg" alt="close">
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a href="/user_panel/index.php" class="user-header__link">
                                <img class="user-header__image" src="img/home.svg" alt="home">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/home.svg" alt="home">
                                </span>
                                <span class="user-header__text">Главная</span>
                            </a>
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a href="#" class="user-header__link">
                                <img class="user-header__image" src="img/shool.svg" alt="shool">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/shool.svg" alt="shool">
                                </span>
                                <span class="user-header__text">Курсы</span>
                            </a>
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a href="#" class="user-header__link">
                                <img class="user-header__image" src="img/user.svg" alt="user">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/user.svg" alt="user">
                                </span>
                                <span class="user-header__text">Аккаунт</span>
                            </a>
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a href="#" class="user-header__link">
                                <img class="user-header__image" src="img/email.svg" alt="email">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/email.svg" alt="email">
                                </span>
                                <span class="user-header__text">Оповещения</span>
                            </a>
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a class="user-header__link" href="#">
                                <img class="user-header__image" src="img/settings.svg" alt="settings">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/settings.svg" alt="settings">
                                </span>
                                <span class="user-header__text">Настройки</span>
                            </a>
                        </li>
                        <li class="user-header__item" tabindex="0">
                            <a href="/php/logout.php" class="user-header__link">
                                <img class="user-header__image" src="img/logout.svg" alt="logout">
                                <span class="user-header__focus hide">
                                    <img class="user-header__picture" src="img/focus/logout.svg" alt="logout">
                                </span>
                                <span class="user-header__text">Выйти</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <div class="user-container-tablet">
                <section class="user-main-content">
                    <div class="user-title">
                        <div class="user-title__info">
                            <h1 class="user-title__name">Привет, <?php echo $_SESSION['username'] ?> !</h1>
                            <p class="user-title__text">Рад, что ты снова зашел</p>
                        </div>
                        <div class="user-title__picture">
                            <img class="user-title__image" src="img/user.png" alt="user">
                        </div>
                    </div>
                    <div class="user-current-rate user-current-rate--fix">
                        <div class="user-current-rate__wrapper user-current-rate__wrapper--fix">
                            <div class="user-current-rate__image">
                                <img class="user-current-rate__logo" src="img/flag.svg" alt="flag">
                            </div>
                            <div class="user-current-rate__info">
                                <h3 class="user-current-rate__title">Испанский язык</h3>
                                <p class="user-current-rate__text">Автор: Alejandro Velazquez</p>
                            </div>
                        </div>
                        <div class="user-current-rate__process">
                            <img class="user-current-rate__picture" src="img/process.png" alt="process">
                        </div>
                        <div class="user-current-rate__progress">
                            <a class="btn-procced btn-procced__progress btn-procced__progress--accent" href="#" tabindex="0">Продолжить</a>
                        </div>
                    </div>
                    <div class="user-course">
                        <div class="container">
                            <h2 class="user-course__title">Курсы</h2>
                            <div class="user-course__menu">
                                <div class="controls filter__controls">
                                    <button class="filter filter__button filter__button--active" data-filter="all" tabindex="0">Все
                                        курсы</button>
                                    <button class="filter filter__button" data-filter=".filter__new"  tabindex="0">Новые</button>
                                    <button class="filter filter__button" data-filter=".filter__popular"  tabindex="0">Самые
                                        популярные</button>
                                </div>
                            </div>
                            <div class="filter__blocks">
                                <?php
                                    $db_data = mysqli_query($connect, "SELECT * FROM `bp_posts`");
                                    while ($post = mysqli_fetch_assoc($db_data)) {
                                        // * цикл для сортировки с добавлением классов filter__new и filter__popular
                                        for ($i = 0; $i<= $post['id']; $i++){
                                            if($i % 2){
                                                $class = 'filter__new';
                                            } else {
                                                $class = 'filter__popular';
                                            }
                                        }
                                        ?>
                                            <div class="mix <?php echo $class ?>" data-myorder="<?php echo $post['id'] ?>">
                                                <div class="user-current-rate">
                                                    <div class="user-current-rate__wrapper">
                                                        <div class="user-current-rate__image">
                                                            <img class="user-current-rate__logo" src="img/<?php echo $post['post_image'] ?>" alt="figma">
                                                        </div>
                                                        <div class="user-current-rate__info">
                                                            <h3 class="user-current-rate__title"><?php echo $post['post_title'] ?></h3>
                                                            <p class="user-current-rate__text">Автор: <?php echo $post['post_author'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="user-current-rate__time">
                                                        <img class="user-current-rate__clock" src="img/clock.svg" alt="clock">
                                                        <span class="user-current-rate__timer"><?php echo $post['post_text'] ?></span>
                                                    </div>
                                                    <div class="user-current-rate__grade">
                                                        <img class="user-current-rate__picture" src="img/fire.svg" alt="rate">
                                                        <span class="user-current-rate__rating"><?php echo $post['post_intens'] ?></span>
                                                    </div>
                                                    <div class="user-current-rate__progress">
                                                        <a class=" user-current-rate__btn btn--default btn" href="/info_page/index.php?id=<?php echo $post['id'] ?>"  tabindex="0">О курсе</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <aside class="user-statistics animate__animated animate__fadeInRight">
                    <div class="user-search">
                        <div class="user-search__menu" tabindex="0">
                            <div class="user-search__burger-box">
                                <span class="user-search__burger"></span>
                            </div>
                        </div>    
                        <div class="user-search__input">
                            <input class="user-search__text" type="text" value="Введи название курса" tabindex="0">
                        </div>
                        <div class="user-search__image">
                            <img class="user-search__picture" src="img/user-img.jpg" alt="profile">
                            <a class="user-search__link" href="#" tabindex="0">
                                <img class="user-search__more" src="img/user-prof-list.svg" alt="profile list">
                            </a>
                        </div>
                    </div>
                    <div class="user-statistics-list">
                        <div class="user-statistics-list__finish">
                            <h1 class="user-statistics-list__quantity">11</h1>
                            <p class="user-statistics-list__name">Завершено курсов</p>
                        </div>
                        <div class="user-statistics-list__started">
                            <h1 class="user-statistics-list__quantity">4</h1>
                            <p class="user-statistics-list__name">Активных курсов</p>
                        </div>
                    </div>
                    <div class="user-statistics__graph">
                        <h2 class="user-statistics__graph__title">Ваша статистика</h2>
                        <h3 class="user-statistics__graph__name">Ваша статистка за неделю</h3>
                        <div class="user-statistics__graph__image">
                            <img class="user-statistics__graph__picture" src="img/graph.jpg" alt="graph">
                        </div>
                    </div>
                    <div class="user-additional-info">
                        <h2 class="user-additional-info__name">Еще больше курсов</h2>
                        <p class="user-additional-info__text">Открой доступ ко всей базе курсов за $ 9,99 / месяц</p>
                        <a class="btn-procced btn-procced__progress btn-procced__progress--accent btn__procced--accent" href="#" tabindex="0">Подписка</a>
                    </div>
                </aside>
            </div>

        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>