<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
//print_r ($_GET);
$idorderswitch= $_GET["idorderswitch"];	
$orderswitcher->delete($idorderswitch);
header( 'Location: your_order.php', true, 303 );//на вывод результата конструктора
?>