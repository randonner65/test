<?php

function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$scheme = new Schemas();//создание объекта класса Schemas
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
//$orderswitcher->init();//Добавление новой записи в таблицу заказанных переключателей

$Ps = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$PS = $Ps->getPropSwitch($_GET["nameswitcher"]);//получить свойства переключателя
//print_r ($PS);

$nscheme = $PS["number"];
$orderswitcher->write("nameswitcher", $_GET["nameswitcher"]);//запись имени схемы
$orderswitcher->write("quantity", $_GET["q"]);//запись количества заказываемых переключателей
$orderswitcher->write("current", $PS["current"]);//запись тока переключателея
$orderswitcher->write("handle", $PS["handle"]);//запись ручки переключателея
$orderswitcher->write("board", $PS["board"]);//запись ручки переключателея
$orderswitcher->write("ip54", $PS["ip54"]);//запись ручки переключателея
$orderswitcher->write("fix", $PS["fix"]);//запись ручки переключателея
$orderswitcher->write("box", $PS["box"]);//запись ручки переключателея
$orderswitcher->write("boxdirect", $PS["boxdirect"]);//запись ручки переключателея
$orderswitcher->write("pg", $PS["pg"]);//запись ручки переключателея

$orderswitcher->write("qpos", $scheme->read($nscheme, "qP"));//запись ручки переключателея
$orderswitcher->write("qcont", $scheme->read($nscheme, "qC"));//запись ручки переключателея
$orderswitcher->write("closdiag", $scheme->read($nscheme, "closDiag"));//запись ручки переключателея
$orderswitcher->write("qjump", $scheme->read($nscheme, "qJ"));//запись ручки переключателея
$orderswitcher->write("jump", $scheme->read($nscheme, "jump"));//запись ручки переключателея
$mark = $scheme->read($nscheme, "mark");
$mark = str_replace(" ", "$", $mark);
$orderswitcher->write("mark", $mark);//запись ручки переключателея
$orderswitcher->write("nscheme", $PS["number"]);//запись ручки переключателея
$orderswitcher->write("moment", $PS["moment"]);//запись ручки переключателея
$orderswitcher->write("angle", $PS["angle"]);//запись ручки переключателея
$orderswitcher->write("initpos", $PS["initpos"]);//запись ручки переключателея

 
 $orderswitcher->write("idorder", $_COOKIE [idorder]);//запись номера заказа
 $orderswitcher->write("constructor", 0);//сброс флага конструктора
	
header( 'Location: your_order.php', true, 303 );	

//header( 'Location: panel_users.php?message=', true, 303 );//на панель пользователей

 ?>