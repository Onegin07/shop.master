<?php
    // Подключаем соединение с базой данных
    include 'configs/db.php';
    // Подключаем соединение с шапкой страницы
    include 'parts/header.php';

    // Запрос на вывод продуктов где id=" . $_GET['id'] в том числе для хлебных крошек
    $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
    $category = mysqli_fetch_assoc( $conn->query($sql) );

?>

<?php
// Отображение хлебных крошек когда мы заходим в категории
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category['title']; ?></li>
  </ol>
</nav>

<div class="row">
  <?php
      // Запрос на вывод продуктов в цикле где category_id=" . $_GET['id'];
      $sql = "SELECT * FROM products WHERE category_id=" . $_GET['id'];
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) {
           // Подключаем соединение с карточками продуктов
           include 'parts/product_card.php';
      }
  ?>

</div>

<?php
   // Подключаем соединение с футером(окончание страницы)
   include 'parts/footer.php';
?>