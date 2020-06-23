<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send-message.php';

/*
1. Проверить есть ли в базе данных пользователь с номером телефона что ввел пользователь
2. Если нет то регистрируем нового пользователя
3. Добавляем заказ в базу данных с привязкой к пользователю

*/

if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){
// выводим пользователя согласно его телефону
$sql = "SELECT * FROM users where phone LIKE '" . $_POST["phone"] . "'";
$user_id = 0;
$result = $conn->query($sql);
// если пользователь есть в базе то выводим его
if($result->num_rows > 0) {
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id'];
    // если пользователя не существует то регистрируем
} else {
	$sql = "INSERT INTO users (login, phone) VALUES ('" . $_POST['username'] . "', '" . $_POST['phone'] . "');";
	if($conn->query($sql)) {
		echo "User added!";
		$user_id = $conn->insert_id;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}	

// добавляем в таблицу заказов новую информацию
$sql = "INSERT INTO orders (user_id, products, adress) VALUES ('" . $user_id . "', '" . $_COOKIE['basket'] . "', '" . $_POST["adress"] . "');";

if($conn->query($sql)) {
	//Очищаем куки
    setcookie("basket", "", 0, "/");
    
	echo "Заказ оформлен!<br/>
	   <a href='/'>На главную</a>";

	   message_to_telegram('Новый заказ!');
} else {
	echo "error order";
}


}


?>