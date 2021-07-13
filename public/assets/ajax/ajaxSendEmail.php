<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //Проверка, если это ajax запрос, то код выполняется
    require_once('../../../plugins/phpmailer/PHPMailerAutoload.php'); // подключаем библиотеку для отправки писем

    $mail = new PHPMailer; // создаем объект класса PHPMailer
    $mail->CharSet = 'utf-8'; // задаем кодировку utf-8

    $email = $_POST['email']; // задаем переменной $email почту, введённую пользователем
    if ($email == '') { // если почта не задана пользователем, выводить сообщение
        echo 'Вы не указали почту';
        die();
    }
    if ($_POST['amount'] == '') { // если сумма в рублях не задана пользователем, выводить сообщение
        echo 'Вы не указали сумму, руб';
        die();
    }
    if ($_POST['currency'] == 'selectCurrency') { // если валюта для конвертации не задана пользователем, выводить сообщение
        echo 'Вы не указали валюту для конвертации';
        die();
    }

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.ru';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nurik.programmer';                 // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'iezvheuwqbkezluo';                 // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('nurik.programmer@yandex.ru');  // от кого будет уходить письмо?
    $mail->addAddress($email);                            // Кому будет уходить письмо


    $mail->isHTML(true);                           // Set email format to HTML
    $mail->Subject = 'Запись на обмен валюты';
    $mail->Body = '
				<p>Сумма, руб: <b>' . $_POST['amount'] . '</b></p>
				<p>Валюта для конвертации: <b>' . $_POST['nameOfCurrency'] . '</b></p>
				<p>Валюта <b>' . $_POST['nameOfCurrency'] . '</b> в рублях: <b>' . $_POST['currency'] . '</b></p>
				<p>Сумма в валюте: <b>' . $_POST['amountCurrency'] . '</b></p>
				';
    $mail->AltBody = '';

    if (!$mail->send()) { // если письмо не было отправлено, выводить ошибку
        echo 'Произошла внутренняя ошибка!';
    } else { // иначе вывести сообщение об успешной записи на обмен валюты
        echo 'Запись на обмен валюты произведена успешно! Проверьте почту ' . $_POST['email'];
    }
} else{ // иначе переводить пользователя на главную страницу
    header("Location: /");
    die();
}