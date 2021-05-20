<?php

    // Файлы phpmailer
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';

    // Переменные, которые отправляет пользователь
    $telephone = $_POST['tel'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Формирование самого письма
    $title = "Заголовок письма";
    $body = "
    <h2>Новое письмо</h2>
    <b>Телефон:</b> $telephone<br>
    <b>Почта:</b> $email<br><br>
    <b>Сообщение:</b><br>$message
    ";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        // Настройки вашей почты
        $mail->Host       = 'zebric7@gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'Zebric Zebriv'; // Логин на почте
        $mail->Password   = 'google7875'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('mail@yandex.ru', 'Имя отправителя'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('test@gmail.com');  

        // Отправка сообщения
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body;    

        // Проверяем отравленность сообщения
        if ($mail->send()) {$result = "success";}
        else {$result = "error";}

    } catch (Exception $e) {
        $result = "error";
        $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    }

    // Отображение результата
    echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
?>

