<?php
// Навигация с проверками переменной page, что соотвествует необходимому пункту
?>
<ul class="nav">
     <li class="nav-item <?php if($page == "home"){ echo 'active'; } ?>">
     <a class="nav-link" href="/admin">
     <i class="nc-icon nc-chart-pie-35"></i>
     <p>Home</p>
     </a>
     </li>
     <li class="nav-item <?php if($page == "users"){ echo 'active'; } ?>">
     <a class="nav-link" href="#">
     <i class="nc-icon nc-circle-09"></i>
     <p>Users</p>
     </a>
     </li>
     <li class="nav-item <?php if($page == "products"){ echo 'active'; } ?>">
     <a class="nav-link" href="/admin/products.php">
     <i class="nc-icon nc-app"></i>
     <p>Products</p>
     </a>
     </li>
     <li class="nav-item <?php if($page == "categories"){ echo 'active'; } ?>">
     <a class="nav-link" href="/admin/categories.php">
     <i class="nc-icon nc-bullet-list-67"></i>
     <p>Categories</p>
     </a>
     </li>
     <li class="nav-item <?php if($page == "orders"){ echo 'active'; } ?>">
     <a class="nav-link" href="/admin/orders.php">
     <i class="nc-icon nc-single-copy-04"></i>
     <p>Orders</p>
     </a>
     </li>
     <li class="nav-item">
     <a class="nav-link" href="#">
     <i class="nc-icon nc-key-25"></i>
     <p>Log out</p>
     </a>
     </li>
</ul>