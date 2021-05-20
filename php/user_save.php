<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if ($username == '') {
            unset($username);
        }
    } 
    
    if (isset($_POST['password'])) {
        $password=$_POST['password'];
        if ($password =='') {
            unset($password);
        }
    }

    //! если пользователь не ввел логин или пароль, то выдаем ошибку
    if (empty($username) or empty($password)){

        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $username = trim($username);
    $password = trim($password);

    require_once("connect.php");

    //! проверка на существование пользователя с таким же логином
    $result = mysqli_query($connect, "SELECT id FROM users WHERE username='$username'");
    $myrow = mysqli_fetch_assoc($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    //!  если такого нет, то сохраняем данные
    $result2 = mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES (NULL, '$name', '$username', '$email', '$password', '1');");
    //! Проверяем, есть ли ошибки
    if ($result2 == 'TRUE'){
        echo "Вы успешно зарегистрированы!";
    }else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
?>