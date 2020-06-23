<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// Задаем переменную page
$page = $_GET['page'];
// Задаем переменную offset 
$offset = $page * 6;
// Запрос на вывод в цикле продуктов с лимитов в 6 штук и отступом
$sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
	// Подключаем соединение с карточками продуктов
    include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
}

?>