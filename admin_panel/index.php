<?php 

    session_start();
    require_once('../php/connect.php');

    $db_data = mysqli_query($connect, "SELECT * FROM `bp_posts`");
    
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <meta name="description" content="only admin">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="mobile-open">
        <img src="./img/hamburger.svg" alt="menu">
    </div>

    <header class="navigation">
        <div class="navigation-wrapper">
            <div class="navigation__logo">
                <!-- <img src="../img/logo.svg" alt="logo"> -->
                <p class="navigation__logo-font">F.</p>
            </div>
            <nav class="navigation__nav">
                <ul class="navigation__list">
                    <li class="navigation__item">
                        <a class="navigation__item-link" href="/admin_panel/index.php">
                            <img class="navigation__item-img" src="./img/home-icon.svg" alt="на главную">
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__item-link" href="#">
                            <img class="navigation__item-img" src="./img/learn-icon.svg" alt="курсы">
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__item-link" href="#">
                            <img class="navigation__item-img" src="./img/user-icon.svg" alt="личный кабинет">
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__item-link" href="#">
                            <img class="navigation__item-img" src="./img/mail-icon.svg" alt="сообщения">
                        </a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__item-link drop" href="../facts_page/index.php">
                            <img class="navigation__item-img" src="./img/options-icon.svg" alt="настройки">
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="navigation__exit">
                <a class="navigation__item-link" href="/php/logout.php">
                    <img class="navigation__item-img" src="./img/exit-icon.svg" alt="выход">
                </a>
            </div>
        </div>
        <!-- end navigation-wrapper -->

        <!-- mobile-menu -->
        <div class="mobile-menu ">
            <div class="mobile-menu__logo">
                <p class="mobile-menu__logo-font">F.</p>
                <a class="mobile-menu__btn">
                    <img src="./img/exit.svg" alt="exit">
                </a>
            </div>
            <nav class="mobile-menu__nav">
                <ul class="mobile-menu__list">
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__item-link" href="/index.php">
                            <img class="mobile-menu__item-img" src="./img/home-icon.svg" alt="на главную">
                            <span class="mobile-menu__name">Главная</span>
                        </a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__item-link" href="#">
                            <img class="mobile-menu__item-img" src="./img/learn-icon.svg" alt="курсы">
                            <span class="mobile-menu__name">Курсы</span>
                        </a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__item-link" href="#">
                            <img class="mobile-menu__item-img" src="./img/user-icon.svg" alt="личный кабинет">
                            <span class="mobile-menu__name">Аккаунт</span>
                        </a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__item-link" href="#">
                            <img class="mobile-menu__item-img" src="./img/mail-icon.svg" alt="сообщения">
                            <span class="mobile-menu__name">Оповещения</span>
                        </a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__item-link" href="../facts_page/index.php">
                            <img class="mobile-menu__item-img" src="./img/options-icon.svg" alt="настройки">
                            <span class="mobile-menu__name">Настройки</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <div class="mobile-menu__exit">
                <a class="mobile-menu__item-link" href="/php/logout.php">
                    <img class="mobile-menu__item-img" src="./img/exit-icon.svg" alt="выход">
                    <span class="mobile-menu__name">Выйти</span>
                </a>
            </div>
        </div>
        <!-- end mobile-menu -->
    </header>

    <div class="container">
        <div class="filter-wrapper">
            <h2 class="filter__title">Панель администратора</h2>

            <section>
                <h3 class="filter__title">Курсы</h3>
                <!-- controls -->
                <div class="controls filter__controls">
                    <button class="filter filter__button filter__button--active" data-filter="all" aria-label="Кнопка фильтра все курсы">Все курсы</button>
                    <button class="filter filter__button" data-filter=".filter__new" aria-label="Кнопка фильтра новые курсы">Новые</button>
                    <button class="filter filter__button" data-filter=".filter__popular" aria-label="Кнопка фильтра популярные курсы">Самые популярные</button>
                    <!-- <button class="sort filter__button" data-sort="myorder:asc">По возрастанию</button>
                    <button class="sort filter__button" data-sort="myorder:desc">По убыванию</button> -->
                </div>
                <!-- controls -->
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
                                    <div class="card">
                                        <div class="card__icon">
                                            <img class="card__icon-img" src="img/<?php echo $post['post_image'] ?>" alt="основы фотографии">
                                        </div>
                                        <div class="card__title">
                                            <a class="card__title-top" href="#"><?php echo $post['post_title'] ?></a>
                                            <div class="card__title-bottom">Автор: <?php echo $post['post_author'] ?></div>
                                        </div>
                                        <div class="card__clock">
                                            <img class="card__clock-icon" src="img/clock-icon.svg" alt="clock">
                                            <p class="card__clock-time"><?php echo $post['post_text'] ?></p>
                                        </div>
                                        <div class="card__rating">
                                            <img class="card__rating-icon" src="img/rating-icon.svg" alt="rating">
                                            <p class="card__rating-totall"><?php echo $post['post_intens'] ?></p>
                                        </div>
                                        <div class="card__buttons">
                                            <a class="btn btn--default btn--primary card__btn" href="/info_page/index.php?id=<?php echo $post['id'] ?>" aria-label="Кнопка подробнее">О курсе</a>
                                            <a class="btn btn--default btn--accent card__btn" href="/change_page/index.php?id=<?php echo $post['id'] ?>" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                            <a class="btn btn--default btn--alert card__btn" href="/php/deleteCours.php?id=<?php echo $post['id'] ?>" aria-label="Кнопка для удаления курса">Удалить курс</a>
                                        </div>
                                    </div>
                                </div>
                            <?
                        }
                    ?>
                    <!-- <div class="mix filter__new filter__popular" data-myorder="1">
                        <div class="card">
                            <div class="card__icon">
                                <img class="card__icon-img" src="./img/figma-icon.png" alt="фигма с нуля">
                            </div>
                            <div class="card__title">
                                <a class="card__title-top" href="#">Figma с нуля</a>
                                <div class="card__title-bottom">Автор: Christopher Morgan</div>
                            </div>
                            <div class="card__clock">
                                <img class="card__clock-icon" src="./img/clock-icon.svg" alt="clock">
                                <p class="card__clock-time">6ч 30мин</p>
                            </div>
                            <div class="card__rating">
                                <img class="card__rating-icon" src="./img/rating-icon.svg" alt="rating">
                                <p class="card__rating-totall">4,9</p>
                            </div>
                            <div class="card__buttons">
                                <a class="btn btn--default btn--primary card__btn" href="#" aria-label="Кнопка подробнее">О курсе</a>
                                <a class="btn btn--default btn--accent card__btn" href="#" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                <a class="btn btn--default btn--alert card__btn" href="#" aria-label="Кнопка для удаления курса">Удалить курс</a>
                            </div>
                        </div>
                    </div>
                    <div class="mix filter__new" data-myorder="2">
                        <div class="card">
                            <div class="card__icon">
                                <img class="card__icon-img" src="./img/foto-icon.png" alt="основы фотографии">
                            </div>
                            <div class="card__title">
                                <a class="card__title-top" href="#">Основы фотографии</a>
                                <div class="card__title-bottom">Автор: Gordon Norman</div>
                            </div>
                            <div class="card__clock">
                                <img class="card__clock-icon" src="./img/clock-icon.svg" alt="clock">
                                <p class="card__clock-time">3ч 15мин</p>
                            </div>
                            <div class="card__rating">
                                <img class="card__rating-icon" src="./img/rating-icon.svg" alt="rating">
                                <p class="card__rating-totall">4,7</p>
                            </div>
                            <div class="card__buttons">
                                <a class="btn btn--default btn--primary card__btn" href="#" aria-label="Кнопка подробнее">О курсе</a>
                                <a class="btn btn--default btn--accent card__btn" href="#" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                <a class="btn btn--default btn--alert card__btn" href="#" aria-label="Кнопка для удаления курса">Удалить курс</a>
                            </div>
                        </div>
                    </div>
                    <div class="mix filter__new" data-myorder="3">
                        <div class="card">
                            <div class="card__icon">
                                <img class="card__icon-img" src="./img/inst-icon.png" alt="Мастер Instagram">
                            </div>
                            <div class="card__title">
                                <a class="card__title-top" href="#">Мастер Instagram</a>
                                <div class="card__title-bottom">by David Green</div>
                            </div>
                            <div class="card__clock">
                                <img class="card__clock-icon" src="./img/clock-icon.svg" alt="clock">
                                <p class="card__clock-time">5ч 35мин</p>
                            </div>
                            <div class="card__rating">
                                <img class="card__rating-icon" src="./img/rating-icon.svg" alt="rating">
                                <p class="card__rating-totall">4,6</p>
                            </div>
                            <div class="card__buttons">
                                <a class="btn btn--default btn--primary card__btn" href="#" aria-label="Кнопка подробнее">О курсе</a>
                                <a class="btn btn--default btn--accent card__btn" href="#" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                <a class="btn btn--default btn--alert card__btn" href="#" aria-label="Кнопка для удаления курса">Удалить курс</a>
                            </div>
                        </div>
                    </div>
                    <div class="mix filter__popular" data-myorder="4">
                        <div class="card">
                            <div class="card__icon">
                                <img class="card__icon-img" src="./img/pen-icon.png" alt="курсы рисования">
                            </div>
                            <div class="card__title">
                                <a class="card__title-top" href="#">Курсы рисования</a>
                                <div class="card__title-bottom">by Jean Tate</div>
                            </div>
                            <div class="card__clock">
                                <img class="card__clock-icon" src="./img/clock-icon.svg" alt="clock">
                                <p class="card__clock-time">11ч 30мин</p>
                            </div>
                            <div class="card__rating">
                                <img class="card__rating-icon" src="./img/rating-icon.svg" alt="rating">
                                <p class="card__rating-totall">4,8</p>
                            </div>
                            <div class="card__buttons">
                                <a class="btn btn--default btn--primary card__btn" href="#" aria-label="Кнопка подробнее">О курсе</a>
                                <a class="btn btn--default btn--accent card__btn" href="#" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                <a class="btn btn--default btn--alert card__btn" href="#" aria-label="Кнопка для удаления курса">Удалить курс</a>
                            </div>
                        </div>
                    </div>
                    <div class="mix filter__new" data-myorder="5">
                        <div class="card">
                            <div class="card__icon">
                                <img class="card__icon-img" src="./img/photoshop-icon.png" alt="Основы Photoshop">
                            </div>
                            <div class="card__title">
                                <a class="card__title-top" href="#">Основы Photoshop</a>
                                <div class="card__title-bottom">by David Green</div>
                            </div>
                            <div class="card__clock">
                                <img class="card__clock-icon" src="./img/clock-icon.svg" alt="clock">
                                <p class="card__clock-time">5ч 35мин</p>
                            </div>
                            <div class="card__rating">
                                <img class="card__rating-icon" src="./img/rating-icon.svg" alt="rating">
                                <p class="card__rating-totall">4,7</p>
                            </div>
                            <div class="card__buttons">
                                <a class="btn btn--default btn--primary card__btn" href="#" aria-label="Кнопка подробнее">О курсе</a>
                                <a class="btn btn--default btn--accent card__btn" href="#" aria-label="Кнопка для редактирования курса">Изменить курс</a>
                                <a class="btn btn--default btn--alert card__btn" href="#" aria-label="Кнопка для удаления курса">Удалить курс</a>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="btn">проба</div>
                <div class="btn btn--black">проба</div>
                <div class="btn btn--green">проба</div>
                <div class="btn btn--default">проба</div>
                <div class="btn btn--sm">проба</div> -->
            </section>
        </div>
        <!-- filter-wrapper -->

    </div>
    <!-- container -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
    <!-- <script src="../js/mixitup.min.js"></script> -->
    <script src="./js/script.js"></script>
</body>

</html>