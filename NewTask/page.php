<?
require("confdb/db.php");
require ("Message.php");
$Message_id = $_GET['id'];

if(isset($_GET['del'])){
    $id = htmlspecialchars( $_GET['del']);
    $sql = "DELETE * FROM message WHERE id = $Message_id";
    return header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Сообщение</title>
    </head>
<body>
    <div class="FlexBlock"><a class="BackButton" href="/">Назад</a></div><br><br>
<div><?echo FullMessage();?></div>
    <div class="FlexForm">
        <form action="Message.php" method="POST" required>
        <div>Написать Комментарий</div><br>
        <label for="Name">Имя</label><br><input class="FieldMessage" type="text" id="Name" name="Name" required><br>
        <input  type="hidden" id="message_id"  name="message_id" value = "<?echo $Message_id;?>">
        <div>Комментарий</div>
        <textarea id="comment" name="comment" name="text" rows="6" cols="40" required></textarea><br>
        <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>