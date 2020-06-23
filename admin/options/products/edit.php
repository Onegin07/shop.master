<?php
// Подключаем соединение с базой данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "edit";
// Подключаем соединение с шапкой страницы
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
// делаем проверку если существуют все необходимые поля для редактирования
if(isset($_GET["id"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["category_id"]) && isset($_POST["content"]) && isset($_POST["comments"])) {
  // запускаем запрос по редактированию товара 
  $sql = "UPDATE products SET title = '" . $_POST['title'] . "', description = '" . $_POST['description'] . "', content = '" . $_POST['content'] . "', category_id = '" . $_POST['category_id'] . "', comments = '" . $_POST['comments'] . "' WHERE products.id =" . $_GET['id'];
  // если соединение по редактированию продукта произошло
  if($conn->query($sql)) {
    // то после редактирования возвращаемся к странице продуктов (админки)
    header("Location: /admin/products.php");
  }
  }
// делаем запрос вывод всех продуктов если id=" . $_GET['id'] в том числе для хлебных крошек
$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
$product = mysqli_fetch_assoc( $conn->query($sql) );
// Отображаем таблицу редактирования продуктов (админки) с кнопкой редактирования товара и хлебными крошками
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
    <li class="breadcrumb-item">
      <a href="http://shop.master.local/admin/products.php">Products
        </a>
      </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $product['title']; ?></li>
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
                          <label>Product ID</label>
                           <input type="text" name='id' class="form-control" disabled="" value="<?php echo $product['id']; ?>">
                            </div>
                             </div>
                              </div> 
                       <div class="row">
                        <div class="col-md-12 px-1">
                         <div class="form-group">
                          <label>Title</label>
                           <input type="text" name="title" class="form-control" placeholder="Enter Product Name" value="<?php echo $product['title']; ?>">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12 px-1">
                                 <div class="form-group">
                                  <label>Description</label>
                                   <input type="text" name="description" class="form-control" placeholder="Enter Product Description" value="<?php echo $product['description']; ?>">
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-3 px-1">
                                         <div class="form-group">
                                          <label>Category</label>
                                           <input type="text" name="category_id" class="form-control" placeholder="Enter Category" value="<?php echo $product['category_id']; ?>">
                                            </div>
                                             </div>
                                              </div>
                                               <div class="row">
                                                <div class="col-md-12 px-1">
                                                 <div class="form-group">
                                                  <label>Content</label>
                                                   <input type="text" name="content" class="form-control" placeholder="Enter Product Content" value="<?php echo $product['content']; ?>">
                                                    </div>
                                                    </div>
                                                     </div>
                                                      <div class="row">
                                                       <div class="col-md-12 px-1">
                                                       <div class="form-group">
                                                        <label>Comments</label>
                                                         <textarea rows="4" cols="80" name="comments" class="form-control" placeholder="Comments" value="<?php echo $product['comments']; ?>"></textarea>
                                                         </div>
                                                          </div>
                                                          </div>
                                            <button type="submit" name='edit_product' class="btn btn-info btn-fill pull-right">Edit Product</button>
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