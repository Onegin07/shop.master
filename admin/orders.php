<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "orders";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

// Отображаем таблицу заказов (админки) с кнопкой добавления товара и хлебными крошками
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
  </ol>
</nav>
<div class="container-fluid">
 
                <?php 
                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="row">
                    <div class="col-12 text-center"> 
                    <hr>
                    <h3>USER: <?php echo $row['user_id']; ?></h3>
                         <?php
                           $sql2 = "SELECT * FROM users WHERE id=" . $row['user_id'];
                           $result2 = $conn->query($sql2);
                           $user = mysqli_fetch_assoc($result2);
                         ?>
                         <p><?php echo $user['login']; ?></p>
                         <p>ТЕЛЕФОН: <?php echo $user['phone']; ?></p>
                       </div>
                     </div>
                       <div class="row">
                        <div class="col-12 text-center ">
                        <h4>ЗАКАЗ</h4>
                        <p>№: <?php echo $row['id']; ?></p>
                        <p>ВРЕМЯ: <?php echo $row['created_at']; ?></p>
                        <p>АДРЕС: <?php echo $row['adress']; ?></p>
                        <p>СТАТУС: <a href="edit_stat.php?id=<?php echo $row['id'] ?>"><?php echo $row['status']; ?></a></p>
                        </div>
                        <div class="col-12">
                        <?php
                         $prod = json_decode($row['products'], true);
                          for($i = 0; $i < count($prod['basket']); $i++) {
                          $sql1 = "SELECT * FROM products WHERE id=" . $prod['basket'][$i]['product_id'];
                          $result1 = $conn->query($sql1);
                          $product = mysqli_fetch_assoc($result1);
                        ?>
                         <h5>ID ТОВАРА:<?php echo $prod['basket'][$i]['product_id']; ?></h5>
                         <p>НАИМЕНОВАНИЕ: <?php echo $product['title']; ?></p>
                         <p>#: <?php echo $prod['basket'][$i]['count']; ?></p>
                         <p>$: <?php echo $prod['basket'][$i]['cost']; ?></p>
                         <hr>
                     <?php
                   }
                    ?>
                  </div>
                </div>
                <?php
                 }
                 ?>   
        
   </div><!-- container-fluid-->
 
<?php
// Подключаем соединение с футером(окончание страницы)
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>       

