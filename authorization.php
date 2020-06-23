<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';


if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){

    $password = md5($_POST['pass']);

    if(isset($_POST["username"]) && isset($password) && $_POST["username"] != "" && $password != "") {
        // формируем запрос поиска в БД по имейлу и паролю
        $sql = "SELECT * FROM users WHERE login LIKE '" . $_POST["username"] . "' AND password LIKE '$password' AND `verified` LIKE '1'";
        // выполняем запрос
        $result = $conn->query($sql);
        // получаем количество совпадений по юзерам в БД
        $users_number = mysqli_num_rows($result);
        // если количество найденных юзеров равно 1, то авторизуем
        if($users_number == 1) {
            echo "авторизирован";
            header("Location: /");
        } else {
           header("Location: /error_let.php");

        }
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Authorization</title>
</head>
<body>

<form method="POST">
    <p>АВТОРИЗАЦИЯ<br/>
    <p>Username<br/>
       <input type="text" name="username">
    </p>
    <p>Password<br/>   
    <input type="password" name="pass">
    </p>
    <button type="submit">Log_in</button>
    
</form> 

</body>
</html>