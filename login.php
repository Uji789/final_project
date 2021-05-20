<?php 

session_start();

require_once('php/connect.php');

$db_data = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` LIKE '$password'");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In. Big Project</title>

  <link rel="stylesheet" type="text/css" href="fonts/SFUIText/stylesheet.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,regular,500,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular" rel="stylesheet" />

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="container">

    <!-- Wrapper-->
    <div class="log-in__wrapper">

      <div class="log-in__tabs tab">
        <ul class="tab__list">
          <li class="tab__item tab__item--active" data-tabindex="1">Вход</li>
          <li class="tab__item" data-tabindex="2">Регистрация</li>
        </ul>
      </div>

      <!-- Log-in Content-->
      <div class="log-in__content">

        <!-- Sign in Form-->
        <form action="php/reg_action.php" method="POST" class="form form--enter">

          <label class="form__label" for="Username">Username</label>
          <input class="form__input" type="text" placeholder="Write Your Username" data-validate-field="username"
            name="username" required>

          <label class="form__label" for="password">Password</label>
          <input class="form__input" type="password" placeholder="Write Your Password" data-validate-field="password"
            name="password" required>
          <div class="log-in__actions">
            <!-- <a href="/user_panel/index.php"> -->
              <button class="btn log-in__btn" type="submit">Войти</button>
            <!-- </a> -->
          </div>

        </form> <!-- /. Sign in Form-->

      </div> <!-- /. Log-in Content-->

      <!-- Log-in Content -->
      <div class="log-in__content">
        <!-- Registration Form-->
        <form action="php/user_save.php" method="POST" class="form form--registration">

          <label class="form__label" for="name">Name</label>
          <input class="form__input" type="text" placeholder="Write Your Name" minlength="2" data-validate-field="name"
            name="name" required>

          <label class="form__label" for="username">Username</label>
          <input class="form__input" type="text" placeholder="Write Your Username" minlength="2"
            data-validate-field="username" name="username" required>


          <label class="form__label" for="email">Email</label>
          <input class="form__input" type="email" placeholder="Write Your Email" data-validate-field="email"
            name="email" required>

          <label class="form__label" for="password">Password</label>
          <input class="form__input" type="password" placeholder="Write Your Password" data-validate-field="password"
            name="password" required>

          <div class="log-in__actions">
            <button class="btn log-in__btn btn--registr" type="submit">Зарегистрироваться</button>
          </div>

        </form> <!-- /. Registration Form-->
      </div> <!-- /. Log-in Content-->

      <div class="modal">Спасибо за регистрацию!<br>Теперь у Вас есть доступ к курсам!</div>

    </div> <!-- /. Wrapper-->

  </div>

  <script src="js/just-validate.min.js"></script>
  <script src="js/login-page.js"></script>

</body>

</html>