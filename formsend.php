<!DOCTYPE HTML>
<html>
<head>
<title>Страница благодарности</title>
<meta charset="utf-8">
<!--- Google Analytics !--->
</head>
<body>
<?php
header('Content-Type: text/html; charset=utf-8');
extract($_POST);
$message = ('
<table style="background: #EEE;border: 1px solid #A5A5A5;width: 100%;margin-bottom:10px;">
<tbody>



<tr>
<td style="border-bottom: 1px solid #A2A2A2;width: 193px;border-right: 1px solid #A2A2A2;">
<h4 style="margin: 4px;">	Ваше имя:	</h4></td>
<td style="border-bottom: 1px solid #A2A2A2;padding: 4px;">	'. $name_form .'</td>
</tr>

<tr>
<td style="border-bottom: 1px solid #A2A2A2;width: 193px;border-right: 1px solid #A2A2A2;">
<h4 style="margin: 4px;">	Телефон:</h4></td>
<td style="border-bottom: 1px solid #A2A2A2;padding: 4px;">	'. $phone_form .'</td>
</tr>


<tr>
<td style="border-bottom: 1px solid #A2A2A2;width: 193px;border-right: 1px solid #A2A2A2;">
<h4 style="margin: 4px;">	E-mail:</h4></td>
<td style="border-bottom: 1px solid #A2A2A2;padding: 4px;">	'. $email_form .'</td>
</tr>


<tr><td style="width: 193px;border-right: 1px solid #A2A2A2;">
<h4 style="margin: 4px;">	Комментарии:</h4></td>
<td style="padding: 4px;">	'. $text_form1 .'	</td>
</tr>

</tbody></table>
');

include "class.phpmailer.php";// подключаем класс

$mail = new PHPMailer();
$mail->From = "invictaglobal.ru";
$mail->Subject = "Тема письма";
$mail->FromName = "Отправитель";
$mail->AddAddress('invicta39@mail.ru');
$mail->IsHTML(true);
if(isset($_FILES['files']))
{
if($_FILES['files']['error'] == 0)
{
$mail->AddAttachment($_FILES['files']['tmp_name'],$_FILES['files']['name']);
}
}
$mail->Body = $message;
if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);
{
?>
<b style="display: block;
text-align: center;
margin-top: 12px;
font-family: roboto;
font-size: 20pt;
font-weight: 200;
line-height: 1.2em;">Спасибо за отправку запроса. Мы свяжемся с вами.<br><a href="/">Нажмите, чтобы вернуться на главную страницу</b><img src="http://invictaglobal.ru/done.jpg" alt="Сделано!" title="Сделано!" style="margin: 0px auto;display: block;margin-top: 27px"/></a>'
<?php 
}
if (!empty($_POST['submit'])) send_mail();

?>

<!--  Yandex metrika !--->
</body>
</html>