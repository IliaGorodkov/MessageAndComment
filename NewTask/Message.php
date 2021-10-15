<?php
require ("confdb/db.php");

$page = $_GET['page'];
$del = $_GET['id'];

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

function AllMessage(){
    require ("confdb/db.php");

    global $opt;
    global $page;
    global $pdo;

    $limit = 7;
    $number = ($page * $limit) - $limit;
    $countMessage = $pdo->query("SELECT COUNT(*) as count FROM message")->fetchColumn();
    $str_pag = ceil($countMessage / $limit);// получаем количество страниц

    $query = $pdo->query("SELECT * FROM message ORDER BY id DESC LIMIT $number,$limit ");

    $html = '';
    
    foreach ($query as $row){   
        
        $row['message'] = substr($row['message'],0,30);
        @$html .= "<div><a href=\"page.php?id={$row['id']}\"><b>{$row['heading']}</b></a></div>"// заносим данные из массива  в контейнеры
        ."<div>{$row['message']}...</div><hr>";
    }

    echo $html;//выводим шаблон с данными
    
    for ($i = 1; $i <= $str_pag; $i++){
        if($i == $_GET['page']){
            echo "<a class=\"PageButton\" style=\"color:orange;\" href=index.php?page=".$i.">".'<b>'.$i.'</b>'."</a> ";// Выводим выбранную страницу
        }else{
            echo "<a class=\"PageButton\" href=index.php?page=".$i.">".$i."</a> ";// Выводим остальные страницы
        }
    }
    
} 

function FullMessage(){
    require ("confdb/db.php");
    global $opt;
    global $pdo;

    $Message_id = $_GET['id'];

    $query = $pdo->query('SELECT * FROM message WHERE id =  '.$Message_id.'');// выбираем сообщение
    $requestComment = $pdo->query('SELECT comment,Name FROM message JOIN comment ON message.id = comment.message_id WHERE comment.message_id = '.$Message_id.'');// выбираем комментарии связаные с сообщением

    $html = '';
    $Comment = '';

    foreach ($query as $row){   
    @$html .= "<div id=\"BlockFullMessage\"><b>{$row['heading']}</b><br>{$row['message']}</div><br>"; //заносим данные из массива с полным сообщением в контейнеры
    }

    foreach ($requestComment as $val){   
    @$Comment .= "<div>{$val['Name']}:</div>"."<div>{$val['comment']}</div><hr><br>";// заносим комментарии из массива в контейнеры
    }
    return $html.'<h3>Комментарии</h3>'.$Comment;//возвращение шаблона
}
    
if(isset($_POST["message"])){
    return addMessage();
}

function addMessage(){
    require ("confdb/db.php");

    $heading = htmlspecialchars($_POST["heading"],ENT_QUOTES, "UTF-8");
    $author =  htmlspecialchars($_POST["author"],ENT_QUOTES, "UTF-8");
    $message =  htmlspecialchars($_POST["message"],ENT_QUOTES, "UTF-8");
        
    global $opt;
    global $pdo;

    /*Небольшая валидация*/
    if($heading == ' ' || $heading == '  '){
        echo "Вы не аписали Заголовок <a href='/'>Назад</a>";
        exit;
    }elseif($author == ' ' || $author == '  '){
        echo "Вы не Написали Автора <a href='/'>Назад</a>";
        exit;
    }elseif($message == ' ' || $message == '  '){
        echo "Вы не Написали Сообщение <a href='/'>Назад</a>";
        exit;
    }
   
    $sql = 'INSERT INTO message VALUES(:id,:heading,:author,:message)';/*запрос на добавление нового сообщения*/
    $query = $pdo->prepare($sql);//Создание подготовленного запроса
    $query->execute(['id'=> NULL,'heading'=>$heading,'author'=>$author,'message'=>$message]);
        
    return header('Location: /');
}

if(isset($_POST["comment"])){
    return addComment();
}

function addComment(){
    require ("confdb/db.php");
        
    $message_id =  htmlspecialchars($_POST["message_id"],ENT_QUOTES, "UTF-8");
    $Name =  htmlspecialchars($_POST["Name"],ENT_QUOTES, "UTF-8");
    $Comment =  htmlspecialchars($_POST["comment"],ENT_QUOTES, "UTF-8");

    global $opt;
    global $pdo;
    
    /*Небольшая валидация*/
    if($Name==' ' || $Name=='  '){
        echo "Вы не Написали Имя <a href='page.php?id=$message_id'>Назад</a>";
        exit;
    }elseif($Comment==' '||$Comment=='  '){
        echo "Вы не Написали Комментарий <a href='page.php?id=$message_id'>Назад</a>";
        exit;
    }

    $sql = 'INSERT INTO comment VALUES(:id,:message_id,:comment,:Name)';/*запрос на добавление нового комментария*/
    $query = $pdo->prepare($sql);//Создание подготовленного запроса
    $query->execute(['id'=> NULL,'message_id'=>$message_id,'comment'=>$Comment,'Name'=>$Name]);
    $countMessage = $pdo->query("SELECT COUNT(*) as count FROM message")->fetchColumn();
        
    return header("Location: page.php?id=$message_id");//редиректим на сообщение где мы оставили комментарий
}
?>