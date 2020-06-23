<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "categories";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

// Отображаем таблицу категорий (админки) с кнопкой добавления категорий и хлебными крошками
?> 
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories</li>
  </ol>
</nav>

  <div class="row">
   <div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
     <div class="card-header ">
      <h4 class="card-title">
      Category <a href="options/categories/add_cat.php" class="btn btn-primary">Add</a>
       </h4>
       </div>
        <div class="card-body table-full-width table-responsive">
         <table class="table table-hover table-striped">
           <thead>
            <th>ID</th>
            <th>Name</th>
           </thead>
            <tbody>
                <?php 
                // Запрос на вывод в цикле всех категорий (админки) и отображаем кнопки редактирования и удаления категорий
                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result))  {
                    ?>
                      <tr>
                         <td><?php echo $row['id'] ?></td>
                         <td><?php echo $row['title'] ?></td>
                         <td>
                           <div class="btn-group" role="group" aria-label="Basic example"> 
                            <a href="options/categories/edit_cat.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                            <a href="options/categories/delete_cat.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Delete</a>
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

