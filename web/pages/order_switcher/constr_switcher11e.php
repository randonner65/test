<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
//$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса ClassOrderSwitchers

foreach($_GET as $var=>$var_value)
$orderswitcher->write($var, $var_value);//запись в БД свойств переключателя, введенных на предыдущей странице
 header( 'Location: constr_switcher12.php', true, 303 );//на  просмотр характеристик переключателя
?>