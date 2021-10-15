<?php
$page = $_GET['page'];
if(!$page)header('Location: index.php?page=1');
require ("confdb/db.php");
require ("Message.php");
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Все Сообщения</title>
    </head>
<body>
    <div class="Border FlexForm">
        <form action="Message.php" method="POST" required>
        <h3>Написать Сообщение:</h3>
        <label for="heading">Заголовок<label><br><input class="FieldMessage" type="text" id="heading" name="heading" required><br>
        <label for="author">Автор</label><br><input class="FieldMessage" type="text" id="author" name="author" required><br>
        <div>Сообщение</div>
        <textarea  id="message" name="message"  name="text" rows="6" cols="40" required></textarea><br>
        <button type="submit">Добавить</button>
        </form>
    </div>
    <br>
<div><div><? echo AllMessage(); ?></div></div>
</body>
</html>