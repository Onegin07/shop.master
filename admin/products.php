<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "products";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

// Отображаем таблицу продуктов (админки) с кнопкой добавления товара и хлебными крошками
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">
      Products <a href="options/products/add.php" class="btn btn-primary">Add</a>
       </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Content</th>
            <th>Category</th>
            <th>Options</th>
           </thead>
            <tbody>
                <?php 
                // Запрос на вывод в цикле всех продуктов (админки) и отображаем кнопки редактирования и удаления товара
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['title'] ?></td>
                         <td><?php echo $row['description'] ?></td>
                         <td><?php echo $row['content'] ?></td>
                         <td><?php echo $row['category_id'] ?></td>
                         <td>
                           <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                            <a href="options/products/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Delete</a>
                          </div>
                         </td>
                        </tr>
                     <?php
                       }
                     ?>
    
             </tbody>
          </table>
         </div>
       </div>
     </div>
   </div><!-- -->
 
<?php
// Подключаем соединение с футером(окончание страницы)
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>       

