<?php

// задаем переменные
$servername = "localhost";
$username = "cilyhtjk_bd";
$password = "Evgen1987";
$dbname = "cilyhtjk_bd";
// прописываем параметры для соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);
// если соединение не корректно, прерываем подключение к базе данных
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// Задаем необходимый набор символов для конкретного распознования формата текста
$conn->set_charset("utf8");

?>


