<?php
    session_start();
    
    require_once('connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    //! занесение введенного пользователем логина в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['username'])) { 
        $username = $_POST['username'];
        if ($username == '') { 
            unset($username);
        } 
    };
    
    //! заносение введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') { 
            unset($password);
        } 
    };

    // ! проверка на администратора
    $admin = mysqli_query($connect, "SELECT * FROM users WHERE username ='$username' AND password= '$password'");
    if ($row = mysqli_fetch_array($admin)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === '0')  {
            header ('location: /admin_panel/index.php');
            exit;
        } else {
            header ('Location: /user_panel/index.php');
            exit;
        }
    } else {
        $error = "Имя пользователя или пароль недействительны";
    }

    //! если пользователь не ввел логин или пароль, то выдается ошибка и останавливается скрипт
    if (empty($username) or empty($password)){
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    };

    //! если логин и пароль введены,то обрабатываем их
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    //! удаляем лишние пробелы
    $username = trim($username);
    $password = trim($password);
    
    //! извлекаем из базы все данные о пользователе с введенным логином
    $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    $myrow = mysqli_fetch_assoc($result);
    if (empty($myrow['username'])){
        //! если пользователя с введенным логином не существует
        exit ("Извините, введённый вами login или пароль неверный.");
    } else {
        //! если существует, то сверяем пароли
        if ($myrow['password']==$password) {
            //! если пароли совпадают, то запускаем пользователю сессию
            $_SESSION['username']=$myrow['username'];
            $_SESSION['id']=$myrow['id'];

            header('Location: ../user_panel/index.php');
        } else {
            //! если пароли не сошлись
            exit ("Извините, введённый вами login или пароль неверный.");
        };
    };
?>