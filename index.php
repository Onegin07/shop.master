<?php
    // Подключаем соединение с базой данных
    include 'configs/db.php';
    // Подключаем соединение с шапкой страницы
    include 'parts/header.php';
?>

<div class="row" id ="products">
  <?php
  if (isset($_GET['page'])) {
    // то получить его и присвоить значение переменной
    $page  = $_GET['page'];
  } else {
    // иначе переменной page присвоить значение 1
    $page = 1;
  }

  $kol = 6;  //количество записей для вывода
  $art = ($page * $kol) - $kol;
  // Определяем все количество записей в таблице
  $total = mysqli_num_rows( mysqli_query( $conn, "SELECT * FROM products" ) );
  // Количество страниц для пагинации
  $str_pag = ceil($total / $kol);
  
 
      // Запрос на вывод в цикле карточек с продуктами в колличестве 6 штук
      $sql = "SELECT * FROM products LIMIT $art, $kol";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) {
            // Подключаем соединение с карточками продуктов
            include 'parts/product_card.php';
      }
  ?>
</div>

<!-- Отображаем кнопку "показать еще" -->
<div class="row">
  <div class="col-4 offset-4">
       <input type="hidden" value="1" id="current-page">
       <button class="btn btn-primary btn-lg" id="show-more">Показать еще</button>
  </div>
</div>

<!-- Отображаем пагинацию -->
<nav aria-label="Page navigation example">
  <ul class="pagination offset-6 fixed-bottom" >
<?php
  for ($i = 1; $i <= $str_pag; $i++){
    ?>
      <?php
      echo "<a href=http://shop.master.local/?page=" . $i . "> " . $i . " </a>";
         }
      ?>
  </ul>
</nav>

<?php
   // Подключаем соединение с футером (окончание страницы)
   include 'parts/footer.php';
?>