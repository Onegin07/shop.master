<?php
    // Подключаем соединение с базой данных
    include 'configs/db.php';
    // Подключаем соединение с шапкой страницы
    include 'parts/header.php';

// Запрос на вывод продуктов где id=" . $_GET['id']
$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
// Запрос на вывод категорий с category_id для хлебных крошек
$categoryResult = $conn->query( 'SELECT * FROM categories WHERE id=' . $row['category_id'] );
$category = mysqli_fetch_assoc( $categoryResult );

?>

<?php
// Отображение хлебных крошек когда мы заходим в продукты
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item">
      <a href="cat.php?id=<?php echo $category['id']; ?>">
        <?php echo $category['title']; ?> 
        </a>
      </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
  </ol>
</nav>

<?php
// Отображение продуктов и кнопки в корзину
?>

<div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
               <h5 class="card-title">
                <?php echo $row['title'] ?>
               </h5>
               <p class="card-text"><?php echo $row['description'] ?></p>
               <p class="card-text"><?php echo $row['content'] ?></p>
               <a href="#" class="btn btn-primary">В корзину</a>
              </div>
             </div>
          </div>
        </div>              
 </div> 

<?php
   // Подключаем соединение с шапкой страницы
   include 'parts/footer.php';
?>