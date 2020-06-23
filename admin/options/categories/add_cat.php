<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "add_cat";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
// Делаем проверку при добавлении категорий, что бы все пункты были заполнены (не было пустот)
if(isset($_POST["add_cat"]) && isset($_POST["title"]) && $_POST["title"] != "") {
  // делаем запрос на добавление категорий
  $sql = "INSERT INTO categories (title) VALUES ('" . $_POST["title"] . "')";
  // если соединение по добавлению категорий произошло
  if($conn->query($sql)) {
    // выводим сообщение "Add a new category"
    echo "<h4>Add a new category</h4>";
    // то после добавления возвращаемся к странице категорий (админки)
    header("Location: /admin/categories.php");
  }
}
// Отображаем таблицу добавления категорий (админки) с кнопкой добавления новой категории и хлебными крошками
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item">
      <a href="http://shop.master.local/admin/categories.php">Categories
        </a>
      </li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>
</nav>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Add Category</h4>
                   </div>
                     <div class="card-body">
                      <form action="add_cat.php" method="POST">
                       <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Category Title">
                            </div>
                             </div>
                              </div> 
                                  <button type="submit" name="add_cat" class="btn btn-info btn-fill pull-right">Add New Category</button>
                                    <div class="clearfix"></div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
// Подключаем соединение с футером (окончание страницы)
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>     
   
