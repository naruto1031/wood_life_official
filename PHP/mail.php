<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="none,noindex,nofollow">
    <title>Document</title>
</head>
<body>
<?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $to = "naruto0614@au.com";
  $title = $_POST['title'];
  $message = $_POST['coment'];
  $headers = "From: {$_POST['to']}";

  if(mb_send_mail($to, $title, $message, $headers))
  {
    echo "メール送信成功です";
  }
  else
  {
    echo "メール送信失敗です";
  }


?> 
<a href="../introduce_form.php">戻る</a>
</body>
</html>

