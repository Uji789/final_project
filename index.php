<?php 

session_start();

require_once('php/connect.php');

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Big Project. Team 4</title>

  <link rel="stylesheet" href="fonts/SFUIText/stylesheet.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,regular,500,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular" rel="stylesheet" />

  <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>
  <!-- Scroll out  -->

  <link rel="stylesheet" href="slick/slick.css">
  <link rel="stylesheet" href="slick/slick-theme.css">

  <!-- darkmode -->
  <noscript>
    <link rel="stylesheet" type="text/css" href="css/light.css"></noscript>

  <!--  Slick Slider -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="header__wrap">
        <div class="header__inner">
          <a class="logo logo--header" href="index.php">
            <img class="logo__img" src="img/logo.svg" alt="Logo image">
          </a>

          <nav class="navigation header__nav">
            <ul class="nav__list">
              <li class="nav__item">
                <a class="nav__link" href="index.php">Главная</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="login.php">Курсы</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="#prices">Прайс</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="#about-us">О нас</a>
              </li>
            </ul>
          </nav>

          <div class="burger__menu">
            <nav class="mobile-nav">
              <a class="logo" href="index.php">
                <img class="logo__img logo--white" src="img/logo--white.svg" alt="Logo image">
              </a>
              <ul class="mobile-nav__list">
                <li class="mobile-nav__item">
                  <a class="mobile-nav__link" href="index.php">Главная</a>
                </li>
                <li class="mobile-nav__item">
                  <a class="mobile-nav__link" href="login.php">Курсы</a>
                </li>
                <li class="mobile-nav__item">
                  <a class="mobile-nav__link" href="#prices">Прайс</a>
                </li>
                <li class="mobile-nav__item">
                  <a class="mobile-nav__link" href="#about-us">О нас</a>
                </li>
              </ul>
              <img class="close" src="img/close.svg" alt="Close">
            </nav>
          </div>
        </div>
        <div class="header__btns">
          <button id="mode-toggler" class="btn btn--sm header__btn" href="log-in.html">Сменить тему</button>
          <a class="btn btn--sm header__btn" href="login.php">Личный кабинет</a>
        </div>

        <button class="burger" type="button">
          <span class="burger__item">Menu</span>
        </button>
      </div>
    </div>
  </header> <!-- /.Header-->

  <!-- Main -->
  <main>

    <!-- Hero -->
    <section class="hero  border--bottom" id="hero">
      <div class="container">
        <div class="hero__wrap">
          <div class="container--sm">
            <h1 class="hero__title">Только качественные курсы</h1>
            <p class="hero__text">На нашем сайте собраны лучшие курсы на разные темы. Курсы программирования,
              продвижения, SMM, языковые курсы. Это малая часть того, что есть в нашей базе</p>
          </div>
        </div>
      </div>
    </section> <!-- /.Hero -->

    <!-- About us-->
    <section class="about-us  border--bottom" id="about-us">

      <!-- Декор элементы-->
      <img class="clouds--sm" src="img/clouds-sm.svg" alt="Clouds" data-scroll>
      <img class="clouds--md" src="img/clouds-md.svg" alt="Clouds" data-scroll>
      <img class="clouds--lg" src="img/clouds-lg.svg" alt="Clouds" data-scroll>
      <!-- /. Декор элементы -->

      <div class="container--sm">

        <div class="section__heading">
          <h4 class="section__suptitle section__suptitle--black">О нас</h4>
          <h3 class="section__title section__title--black section__title--default">Только факты</h3>
        </div>

        <div class="about-us__wrap" data-scroll>
          <!-- About us Wrap-->
          <?php 
            $db_data = mysqli_query($connect, "SELECT * FROM `bp_facts`");
            while ($post = mysqli_fetch_assoc($db_data)){
              ?>
                <div class="about-us__item">
                  <div class="about-us__img">
                    <img class="about-us__icon" src="./img/<?php echo $post['fact_img'] ?>" alt="Time image">
                  </div>
                  <h5 class="about-us__heading"><?php echo $post['fact_title'] ?></h5>
                  <p class="about-us__text"><?php echo $post['fact_text'] ?></p>
                </div>
              <?
            }
          ?>
        </div> <!-- /.About us Wrap-->

        <div class="about-us__actions">
          <a class="about-us__link btn btn--link" href="#">Больше фактов</a>
          <span class="about-us__divider">или</span>
          <a class="about-us__btn btn btn--default btn--green" href="log-in.html">Присоединиться</a>
        </div>

      </div>
    </section> <!-- /.About us-->

    <!-- Info-->
    <div class="info  border--bottom">
      <div class="info__courses">
        <div class="container--sm">
          <div class="info__item" data-scroll>
            <img class="info__img" src="img/speed.svg" alt="Speed image">
            <span class="info__num">97%</span>
            <p class="info__text">Успешно пройденных курсов</p>
          </div>
        </div>
      </div>
      <div class="info__lectors">
        <div class="container--sm">
          <div class="info__item info__item--revert" data-scroll>
            <img class="info__img" src="img/users.svg" alt="Users image">
            <span class="info__num">250</span>
            <p class="info__text info__text--revert">Преподавателей</p>
          </div>
        </div>
      </div>
    </div> <!-- /. Info-->

    <!-- Reviews-->
    <section class="reviews  border--bottom">
      <!-- Reviews-->
      <div class="container container--no-padding">

        <div class="reviews__wrap">
          <!-- Reviews Wrap -->
          <div class="section__heading reviews__heading" data-scroll>
            <h4 class="section__suptitle section__suptitle--blue section__suptitle--m-lg">Отзывы</h4>
            <h3 class="section__title section__title--blue section__title--lg">Что говорят студенты</h3>
          </div>

          <div class="slider__wrap slider">
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>
            <div>
              <div class="slider__item">
                <p class="slider__text">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
                  tractatos, vero tractatos ius an, in mel diceret persecuti.
                </p>
                <img class="slider__author" src="img/user-photo.jpg" alt="Author photo">
              </div>
            </div>

          </div> <!-- /. Slider-->
        </div> <!-- /. Reviews Wrap -->

      </div>
    </section> <!-- /. Reviews -->

    <!-- FAQ -->
    <section class="faq-section">
      <div class="container--sm">

        <div class="section__heading faq-section__heading" data-scroll>
          <h4 class="section__suptitle section__suptitle--blue">FAQ</h4>
          <h3 class="section__title section__title--blue section__title--default">Список популярных вопросов</h3>
        </div>

        <div class="accordion__wrap">
          <!-- Accordion -->
          <!-- Написать скрипт аккордеона + при активном пунтке менять стрелку вниз трансформом -->
          <div class="accordion__item">
            <div class="accordion__header">Вопрос номер 1</div>
            <p class="accordion__content">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam.
          </div>
          <div class="accordion__item">
            <div class="accordion__header">Вопрос номер 2</div>
            <p class="accordion__content">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti.
          </div>
          <div class="accordion__item">
            <div class="accordion__header">Вопрос номер 3</div>
            <p class="accordion__content">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti.
            </p>
          </div>
          <div class="accordion__item">
            <div class="accordion__header">Вопрос номер 4</div>
            <p class="accordion__content">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti.
          </div>
          <div class="accordion__item">
            <div class="accordion__header">Вопрос номер 5</div>
            <p class="accordion__content ">Quidam vocibus eum ne, erat consectetuer voluptatibus ut nam. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti. Eu usu vidit
              tractatos, vero tractatos ius an, in mel diceret persecuti.
          </div>
        </div> <!-- /. Accordion -->

      </div>
    </section> <!-- /. FAQ -->

    <!-- Feedback -->
    <section class="feedback">
      <div class="container--sm">

        <div class="section__heading faq-section__heading" data-scroll>
          <h4 class="section__suptitle section__suptitle--blue">Feedback</h4>
          <h3 class="section__title section__title--blue section__title--default">Напишите нам!</h3>
          <p class="section__text">Оставьте свои контактные данные и наш консультант свяжется с Вами!</p>
        </div>

        <!-- Feedback Form -->
        <form class="form form--feedback validate" action="#" method="POST">

          <div class="form__span"></div>
          <label class="form__label form__label--feedback" for="name">Имя </label>
          <input class="form__input form__input--feedback" type="text" title="Только русские символы, от 2х до 25ти" placeholder="Введите Ваше имя"
            pattern="[а-яА-Я][а-я]+" minlength="2" maxlength="25" name="name" required>

          <label class="form__label form__label--feedback" for="phone">Номер телефона</label>
          <input class="form__input form__input--feedback" type="tel" title="Только цифры, например 0961111111" pattern="[0-9]+" placeholder="Введите Ваш номер телефона"
            maxlength="11" minlength="10" name="phone" required>

          <label class="form__label form__label--feedback" for="email">Почта</label>
          <input class="form__input form__input--feedback" type="email" title="Только почтовые ящики на gmail.com, ukr.net, mail.ru" pattern="(\W|^)[\w.\-]{0,25}@(ukr\.net|mail\.ru|gmail\.com)(\W|$)" placeholder="Введите Вашу почту" name="email"
            required>

          <div class="feedback__actions">
            <button class="feedback__btn btn btn--default btn--green " type="submit">Отправить</button>
          </div>

        </form> <!-- /. Feedback Form-->
      </div>
    </section> <!-- /. Feddback-->

    <!-- Prices -->
    <section class="prices" id="prices">
      <div class="container--sm">
        <div class="prices__wrap">
          <h2 class="prices__title" data-scroll>Самые вкусные тарифы</h2>
          <p class="prices__text">Предлагаем вам ознакомиться со списком тарифным планов</p>
          <a class="prices__btn btn" href="#">Перейти к тарифам</a>
        </div>
      </div>
    </section> <!-- /. Prices -->

  </main> <!-- /.Main -->

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer__wrap">
        <!-- Footer Wrap-->
        <div class="footer__inner" data-scroll>
          <a class="logo" href="index.html">
            <img class="logo__img" src="img/logo.svg" alt="Logo-icon">
          </a>
          <nav class="navigation navigation--footer">
            <ul class="nav__list">
              <li class="nav__item">
                <a class="nav__link" href="#">Главная</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="login.php">Курсы</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="#prices">Прайс</a>
              </li>
              <li class="nav__item">
                <a class="nav__link" href="#about-us">О нас</a>
              </li>
            </ul>
          </nav>
        </div>
        <a class="btn btn--sm btn--black footer__btn" href="log-in.php" data-scroll>Личный кабинет</a>
      </div> <!-- /. Footer Wrap-->
      <div class="footer__copyright" data-scroll>Copyright © 2018 by Random site</div>
    </div>
  </footer> <!-- /. Footer-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="slick/slick.min.js"></script>
  <script src="js/slider.js"></script>
  <script src="js/darkmode.min.js"></script>
  <script src="js/nameValidate.js"></script>
  <script src="js/main-page.js"></script>

  <script>
    var options = {
      light: "css/light.css",
      dark: "css/dark.css",
      checkSystemScheme: true,
      saveOnToggle: true
    };
    var DarkMode = new DarkMode(options);


    // Function for `mode-toggler` button
    var ModeToggler = document.getElementById('mode-toggler')
    ModeToggler.onclick = function () {
      DarkMode.toggleMode();
      //document.querySelector(".logo__img").src="img/logo--white.svg";
      //getM();
      //  kase();
      //  function kase() {
      //    let aaa = document.querySelectorAll(".logo__img");
      //    aaa.forEach((element) => {
      //     let bb = element.src.split("/");
      //      bb=bb[bb.length-1];
      //      if (bb=="logo.svg") {
      //        //console.log(aaa.src.split("/").length-1)
      //        element.src = "img/logo--white.svg";
      //      } else if (bb=="logo--white.svg") {
      //        }
      //            element.src = "img/logo.svg";

      //       });
      //   }
    }


    // Detects mode on LocalStorage, if `true` – display a button
    //getModeRemoverState()


  </script>
</body>

</html>