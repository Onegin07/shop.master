<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "add";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
// Делаем проверку при добавлении товара, что бы все пункты были заполнены (не было пустот)
if(isset($_POST["add_product"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["category_id"]) && isset($_POST["content"]) && isset($_POST["comments"]) && $_POST["title"] != "" && $_POST["description"] != "" && $_POST["category_id"] != "" && $_POST["content"] != "" && $_POST["comments"] != "") {
  // делаем запрос на добавление товара 
  $sql = "INSERT INTO products (title, description, content, category_id, comments) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "', '" . $_POST["comments"] . "')";
  // если соединение по добавлению продукта произошло
  if($conn->query($sql)) {
    // то после добавления товара возвращаемся к странице продуктов (админки)
    header("Location: /admin/products.php");
  }

}
// Отображаем таблицу добавления продуктов (админки) с кнопкой добавления нового товара и хлебными крошками
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
     <li class="breadcrumb-item">
      <a href="http://shop.master.local/admin/products.php">Products
        </a>
      </li>
       <li class="breadcrumb-item active" aria-current="page">Add Product</li>
  </ol>
</nav>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Add Product</h4>
                   </div>
                     <div class="card-body">
                      <form method="POST">
                       <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Product Name">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                  <label>Description</label>
                                   <textarea type="text" name="description" class="form-control" placeholder="Enter Product Description"></textarea>
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                          <label>Content</label>
                                           <textarea type="text" name="content" class="form-control" placeholder="Enter Product Content"></textarea>
                                            </div>
                                             </div>
                                              </div>
                                               <div class="row">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                  <label>Category</label>
                                                   <select name="category_id" class="form-control">
                                                   <option value="0">Не выбрано</option>
                                                      <?php
                                                         // делаем запрос на вывод категорий для опций прокрутки
                                                         $sql = "SELECT * FROM categories";
                                                         $result = $conn->query($sql);
                                                         while ($row = mysqli_fetch_assoc($result)) {
                                                             echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                                         }
                                                      ?>
                                                   </select>
                                                    </div>
                                                    </div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-md-12">
                                                       <div class="form-group">
                                                        <label>Comments</label>
                                                         <textarea name="comments" class="form-control" placeholder="Comments"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                            <button type="submit" name="add_product" value ="1" class="btn btn-success btn-fill pull-right">Add New Product</button>
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
   
