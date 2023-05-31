<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'path/to/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';


    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru','phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('guest@gmail.com','Гість сторінки French Bulldogs');
    $mail->addAddress('stasglova2004@gmail.com');
    $mail->Subject = 'Повідомлення від гістя сторінки French Bulldogs';

    $body ='<h1>Лист від гістя</h1>';

    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['telephone']))){
        $body.='<p><strong>Телефон:</strong> '.$_POST['telephone'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Повідомлення:</strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    if(!$mail->send()){
        $message= 'Помилка';
    }else{
        $message= 'Дані відправлено!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>