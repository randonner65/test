<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//��������������� ������� ������
//$order = new Orders();//�������� ������� ������ Orders
$orderswitcher = new OrderSwitchers();//�������� ������� ������ ClassOrderSwitchers

foreach($_GET as $var=>$var_value)
$orderswitcher->write($var, $var_value);//������ � �� ������� �������������, ��������� �� ���������� ��������
 header( 'Location: constr_switcher12.php', true, 303 );//��  �������� ������������� �������������
?>