<?php

/*
1. Сделать изменение количество товаров
2. Пройтись по всему массиву товаров
3. Что бы стоимость пересчитывалась в зависимости от количества товаров

*/
 // Отображаем таблицу корзины с выбраными товарами, отображаем таблицу заказа с кнопкой добавления нового заказа
 if(isset( $_POST['num']) and isset($_COOKIE['basket'])) {
      $text = $_POST['num'];
      $NumArray = explode(":", $text);
      $basket = json_decode( $_COOKIE['basket'], true );
          for( $i=0; $i < count($basket["basket"]); $i++ ) {
        if( $basket["basket"][$i]['product_id'] == $myNumArray[1] ) {           
          $basket["basket"][$i]['count'] = $myNumArray[2];
          $basket["basket"][$i]["costs"] = $myNumArray[0]*$myNumArray[2];
        }
      }
          $jsonProduct = json_encode( $basket );
          setcookie("basket", "", 0, "/" );               
    // Создаем cokie для товара
    setcookie("basket", $jsonProduct, time() + 60*60, "/" ); 
    }

?>








