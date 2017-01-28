<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new  Orders();//создание объекта класса Orders
$orderswitcher = new  OrderSwitchers();//создание объекта класса OrderSwitchers
//print_r ($_GET);
foreach($_GET as $var=>$var_value)
$orderswitcher->write($var, $var_value);//запись в БД свойств переключателя, введенных на предыдущей странице	
$orderswitcher->write("idorder", $_COOKIE [idorder]);//запись номера заказа

header( 'Location: your_order.php', true, 303 );
?>