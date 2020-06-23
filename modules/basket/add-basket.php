<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
       /*
       1. Получить товар по которому кликнул пользователь - done
       2. Добавить в массив товаров - done
       3. Добавить массив в куки - done
       4. Перебрать прошлый массив - done
          4.1 Преобразовать JSON с куки в массив
          4.2 Добавить новый элемент в массив
          4.3 Преобразовать массив в правильный JSON
          4.4 Добавить в куки
       */
       // Проверяем был ли отправлен POST запрос
       if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST"){
      // Получаем все поля с продуктов где id товара ровняется $_POST['id']
	    $sql = "SELECT * FROM products WHERE id=" . $_POST['id'];
	    $result = $conn->query($sql);
	    $product = mysqli_fetch_assoc($result);
     
         // Если существует переменная $_COOKIE['basket'] то идет добавление в корзину
         if(isset($_COOKIE['basket'])) { // если в корзине уже, что то есть
          // Преобразовываем в JSON с куки в массив
         	$basket = json_decode($_COOKIE['basket'], true);

           /*
            1. Пройтись по всему массиву корзины - done
            2. Проверить если совпадения по id
            3. Если совпадения есть: увеличить колличество товара
          */
          $issetProduct = 0;
          for($i = 0; $i < count($basket["basket"]); $i++) { 
               if( $basket["basket"][$i]["product_id"] == $product['id'] ) {
                   $basket["basket"][$i]['count']++;
                   $issetProduct = 1;    
               } 
          }

          if($issetProduct != 1) {
              $basket["basket"][] = [
                "product_id" => $product['id'],
                "count" => 1,
                "cost" => $product['costs']
              ];
          }
          
           /*
               product_id: 1,
               count: 3
          */

          } else { // если корзина пустая
              $basket = [ "basket" => [ 
                ["product_id" => $product['id'],
                "count" => 1,
                "cost" => $product['costs']] 
              ] ];
          }

        // Задаем переменную $jsonProduct (преобразование массива в JSON формат)
	      $jsonProduct = json_encode($basket);
         //Очищаем куки
         setcookie("basket", "", 0, "/");

	      //Добавляем куки на час
	      setcookie("basket", $jsonProduct, time() + 60*60, "/");
         // Выводим JSON формат
       
         //echo $jsonProduct;
        echo json_encode([
            "count" => count($basket['basket'])
        ]);

   }

?>