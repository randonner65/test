<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//��������������� ������� ������
$order = new  Orders();//�������� ������� ������ Orders
$orderswitcher = new  OrderSwitchers();//�������� ������� ������ OrderSwitchers
//print_r ($_GET);
foreach($_GET as $var=>$var_value)
$orderswitcher->write($var, $var_value);//������ � �� ������� �������������, ��������� �� ���������� ��������	
$orderswitcher->write("idorder", $_COOKIE [idorder]);//������ ������ ������

header( 'Location: your_order.php', true, 303 );
?>