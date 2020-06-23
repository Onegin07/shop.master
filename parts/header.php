<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<title>Shop</title>
</head>
<body>

<?php
// Отображаем шапку страницы с кнопками "Home", "About","Contacts"
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Shop-master</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Log_in</a>
      </li>
    </ul>

<?php
// Отображаем картинку корзины с кнопкой "корзина" колличеством товаров в ней
?>
    <form class="form-inline my-2 my-lg-0 text-center">
    <div class="cart-item">
      <img src="korzina.svg" width="35" alt="">
       <a class="btn btn-primary" href="/basket.php" id="go-basket">
     Корзина <span> 0</span>
    </a>
    </div>
    </form>
  </div>
</nav>	
<div class="container">

<?php
// Подключаем навигацию
?>

    <div class="row m-2">
  <div class="col-3">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php'; ?>
  </div>
  <div class="col-9">
    <div class="container">
