<?php

/*
1. Добавить кнопку удаления товара
2. Пройтись по всему массиву товаров
3. Проверить id товара и удалить товар
*/


// Проверяем был ли отправлен POST запрос
if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset( $_COOKIE['basket'] )) {
        $basket = json_decode($_COOKIE['basket'], true);

        for($i = 0; $i < count($basket['basket']); $i++) {
        	if($basket['basket'][$i]['product_id'] == $_POST['id']) {
        		unset($basket['basket'][$i]);
        		sort($basket['basket']);
        	}
        }

        // Задаем переменную $jsonProduct (преобразование массива в JSON формат)
	    $jsonProduct = json_encode($basket);
        //Очищаем куки
        setcookie("basket", "", 0, "/");

	    //Добавляем куки на час
	    setcookie("basket", $jsonProduct, time() + 60*60, "/");

	    echo $jsonProduct;

     }
       
}

?>