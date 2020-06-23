<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "edit_cat";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
// делаем проверку если существуют все необходимые поля для редактирования
if(isset($_GET["id"]) && isset($_POST["title"])) {
  // запускаем запрос по редактированию категорий
  $sql = "UPDATE categories SET title = '" . $_POST['title'] . "' WHERE categories.id =" . $_GET['id'];
  // если соединение по редактированию категорий произошло
  if($conn->query($sql)) {
    // то после редактирования возвращаемся к странице категорий (админки)
    header("Location: /admin/categories.php");
  }
  }
    // делаем запрос вывод всех категорий если id=" . $_GET['id'] в том числе для хлебных крошек
    $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
    $category = mysqli_fetch_assoc( $conn->query($sql) );
// Отображаем таблицу редактирования категорий (админки) с кнопкой редактирования категорий и хлебными крошками    
?>        
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
     <li class="breadcrumb-item">
      <a href="http://shop.master.local/admin/categories.php">Categories
        </a>
      </li>
   <li class="breadcrumb-item active" aria-current="page"><?php echo $category['title']; ?> </li>
  </ol>
</nav>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Edit Product</h4>
                   </div>
                     <div class="card-body">
                      
                      <form method="POST">
                        <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>Category ID</label>
                           <input type="text" name='id' class="form-control" disabled="" value="<?php echo $category['id']; ?>">
                            </div>
                             </div>
                              </div> 
                       <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Category Name" value="<?php echo $category['title']; ?>">
                            </div>
                             </div>
                              </div> 
                                            <button type="submit" name='edit_cat' class="btn btn-info btn-fill pull-right">Edit Category</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
 <?php
 // Подключаем соединение с футером(окончание страницы)
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>     
   