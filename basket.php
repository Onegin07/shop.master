<?php
/*
1. Вывести блок с корзиной - в шапке сайта - done
2. Сделать таблицу в базе данных для хранения заказов - done
3. Добавление товара в корзину - done
    3.1 Сделать клик по кнопке добавить в корзину - done
    3.2 Добавить товар в куки корзины - done
    3.3 Отобразить, что товар добавился на корзине - done
4. Сделать страницу корзины
5. Сделать оформление заказа   
*/
  ?>

  <?php
    include 'configs/db.php';
    include 'parts/header.php';
?>


<div class="row" id ="products">

	 <table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Count</th>
        <th scope="col">Costs</th>
        <th scope="col">Options</th>
	    </tr>
	  </thead>
	  <tbody>
         <?php
             if(isset($_COOKIE['basket'])){

             	$basket = json_decode($_COOKIE['basket'], true);

             	for($i = 0; $i < count($basket['basket']); $i++) {
             		$sql = "SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
             		$result = $conn->query($sql);
             		$product = mysqli_fetch_assoc($result);
          ?>
		        <tr>
			      <th scope="row"><?php echo $product['id'] ?></th>
			      <td><?php echo $product['title'] ?></td>
                 <td> <input onchange="quantityChange(this, <?php echo "CostOfProduct".$product['id']; ?>)" type="text" name="<?php echo $basket["basket"][$i]["cost"].":".$product['id']; ?>"  value="<?php echo $basket["basket"][$i]["count"]; ?>" > </td>	
                 <td id="CostOfProduct<?php echo $product['id']; ?>" ><?php if( $basket["basket"][$i]["count"] == 1 ) {echo $basket["basket"][$i]["cost"];} else {echo $basket["basket"][$i]["cost"];}?></td>
                  <td><button onclick="deleteProductBasket(this, <?php echo $product['id'] ?>)"class="btn btn-danger">Delete</button></td>
			    </tr>
            <?php
             	}
             } 
         ?>
	  	
	  </tbody>
	</table>
</div>

<div class="row" id ="orders">

           <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Оформить заказ</h4>
                   </div>
                     <div class="card-body">
                      <form method="POST" action="/modules/basket/order.php">
                       <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Ваше имя</label>
                           <input type="text" name="username" class="form-control" placeholder="Enter Your Name">
                            </div>
                             </div>
                              </div> 
                               <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                  <label>Ваш адрес</label>
                                   <textarea type="text" name="adress" class="form-control" placeholder="Enter Your Adress"></textarea>
                                    </div>
                                     </div>
                                      </div>
                                       <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                          <label>Ваш телефон</label>
                                           <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                                            </div>
                                             </div>
                                              </div>
                                           <button type="submit" name="add_info" class="btn btn-success btn-fill pull-right">Оформить заказ</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
   include 'parts/footer.php';
?>