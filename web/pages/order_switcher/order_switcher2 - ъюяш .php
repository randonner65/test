<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$scheme = new Schemas();//создание объекта класса Schemas
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
//$orderswitcher->init();//Добавление новой записи в таблицу заказанных переключателей
//print_r ($_GET);
/*
	if(!isset($_COOKIE["idorder"]) || $_COOKIE["idorder"] == -1){//если заказ не существует открыть новый заказ
		$order->addNewOrder();//создание нового заказа
		setcookie("idorder", $order->maxid());//запись в cookie номера текущего заказа
	}*/

$current = $_GET[current];
$constr = $_GET[constr];
$nscheme = $_GET[number_scheme];
$initpos = $_GET[init_pos];
$angle = $_GET[angle];
$color = $_GET[color];
$quantity = $_GET[q];
//print_r ($scheme->checkExistScheme($nscheme));

if(!$scheme->checkExistScheme($nscheme)){
$get = "?message=Номер схемы ".$nscheme." не существует.";
header( 'Location: order_switcher.php'.$get, true, 303 );//на страницу заказа переключателей
echo " ";
}
else
//Запись ручки управления
	if(substr_count($constr,"K") != 0) $handle = "key";
	else if(substr_count($constr,"U") != 0 && substr_count($color,"B") == 0) {$handle = "ur"; $board = 2;}
	else if(substr_count($constr,"U") != 0 && substr_count($color,"B") != 0) {$handle = "ub"; $board = 2;}
	else if(substr_count($color,"T") != 0) $handle = "t";
	else if(substr_count($color,"R") != 0) $handle = "red";
	else  $handle = "black";

//Запись наличия лицевой панели
	if(substr_count($constr, "D") != 0) $board = 1;
	else $board = 0;
//Запись наличия уплотнения по оси	
	if(substr_count($constr, "G") != 0) $ip54 = 1;
	else $ip54 = 0;
//Запись способа крепления
	if(substr_count($constr, "O") != 0) $fix = "O";
	else if(substr_count($constr, "L") != 0) $fix = "L";
	else if(substr_count($constr, "P") != 0) $fix = "P";
	else if(substr_count($constr, "B") != 0) $fix = "B";
	else  $fix = "_";	
//Запись самовозврата
	if(substr_count($constr, "V") != 0)  $moment = 1;
	else  $moment = 0;
//Имя переключателя	
$name = "S". $current."J".$constr.$nscheme.$initpos.$angle.$color;
//------------------------------------------------------------------------------------------
//Проверка правильности ввода наименования переключателя

if($handle == "key" && $current > 25){
	$get = "?message=Наименование переключателя ".$name." введено неверно.</br>";
	//$get += "?message=Наименование переключателя ".$name." введено неверно.</br>";
//echo $get;
	//header( "Location: order_switcher.php", true, 303 );//на страницу заказа переключателей
	header( "Location: order_switcher.php".$get, true, 303 );//на страницу заказа переключателей
echo " ";	
}
else


$orderswitcher->write("nameswitcher", $name);//запись имени схемы
$orderswitcher->write("quantity", $quantity);//запись количества заказываемых переключателей
$orderswitcher->write("current", $current);//запись тока переключателея
$orderswitcher->write("handle", $handle);//запись ручки переключателея
$orderswitcher->write("board", $board);//запись ручки переключателея
$orderswitcher->write("ip54", $ip54);//запись ручки переключателея
$orderswitcher->write("fix", $fix);//запись ручки переключателея
$orderswitcher->write("qpos", $scheme->read($nscheme, "qP"));//запись ручки переключателея
$orderswitcher->write("qcont", $scheme->read($nscheme, "qC"));//запись ручки переключателея
$orderswitcher->write("closdiag", $scheme->read($nscheme, "closDiag"));//запись ручки переключателея
$orderswitcher->write("qjump", $scheme->read($nscheme, "qJ"));//запись ручки переключателея
$orderswitcher->write("jump", $scheme->read($nscheme, "jump"));//запись ручки переключателея
$mark = $scheme->read($nscheme, "mark");
$mark = str_replace(" ", "$", $mark);
$orderswitcher->write("mark", $mark);//запись ручки переключателея
$orderswitcher->write("nscheme", $nscheme);//запись ручки переключателея
$orderswitcher->write("moment", $moment);//запись ручки переключателея
$orderswitcher->write("angle", $angle);//запись ручки переключателея
$orderswitcher->write("initpos", $initpos);//запись ручки переключателея

 
 $orderswitcher->write("idorder", $_COOKIE [idorder]);//запись номера заказа
 $orderswitcher->write("constructor", 0);//сброс флага конструктора
	
header( 'Location: your_order.php', true, 303 );	

//header( 'Location: panel_users.php?message=', true, 303 );//на панель пользователей

 ?>