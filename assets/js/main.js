// Обьявляем сайт URL
var siteURL = "http://shop-master.netxisp.host/";

var btnShowMore = document.querySelector("#show-more");
if(btnShowMore) {
  // Добавляем функцию клик по по кнопке "показать еще"
btnShowMore.onclick = function() {
        // Получаем id="current-page"
        var currentPageInput = document.querySelector("#current-page");
        // Создаем новый аякс обьект (запрос)
        var ajax = new XMLHttpRequest();
            // Создаем и открываем GET запрос 
            ajax.open("GET", siteURL + "modules/products/get-more.php?page=" + currentPageInput.value, false);
            // Отправляем запрос
            ajax.send();
        // создаем счетчик для id="current-page"
        currentPageInput.value = +currentPageInput.value + 1; 
        // делаем проверку на скрытие кнопки "показать еще" когда запрос аякс полностью выполнен
        if(ajax.response == "") {
            btnShowMore.style.display = "none";
        }
        // Получаем id ="products"
        var productsBlock = document.querySelector("#products");
            productsBlock.innerHTML = productsBlock.innerHTML + ajax.response; 
             
      }  
}


// Создаем функцию добавить в корзину
function addToBasket(btn) {
    
    /*
       1. Сделать аякс запрос на добавление в корзину
       2. Получить данные об успешном добавлении в корзину
       3. Обновить информацию в корзине
    */

    // Создаем новый аякс обьект (запрос)
    var ajax = new XMLHttpRequest();
        // Создаем и открываем POST запрос
        ajax.open("POST", siteURL + "/modules/basket/add-basket.php", false);
        // Параметры для отправки POST запроса
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // Отправляем запрос
        ajax.send("id=" + btn.dataset.id);

    // Создаем переменную response для преобразованного в JSON аякс запроса  
    var response = JSON.parse(ajax.response); 
    // Добавляем кнопку корзины id="go-basket" с span
    var btnGoBasket = document.querySelector("#go-basket span");
        // Увеличение колличетсва товара в span
        btnGoBasket.innerText = response.count;
}


// Удаление товара с корзины
function deleteProductBasket(obj, id) {
    var ajax = new XMLHttpRequest();
        ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send("id=" + id);

        alert("Product deleted");

    // Удалить строку с товаром
    obj.parentNode.parentNode.remove();
}

// Изменение количества товара в корзине
function quantityChange(obj, id) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", siteURL + "/modules/basket/count.php", false);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("num="+obj.name + ":" + obj.value);
    data = obj.name.split(":");
    id.innerText = data[0]*obj.value;
    }
