<?php
session_start();
  $_SESSION["nameswitcher"] = $_GET["nameswitcher"];
 
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
$orderswitcher->init();//Добавление новой записи в таблицу заказанных переключателей
if(!isset($_COOKIE["idorder"]) || $_COOKIE["idorder"] == -1){//если заказ не существует открыть новый заказ
		$order->addNewOrder();//создание нового заказа
		setcookie("idorder", $order->maxid());//запись в cookie номера текущего заказа
	}
//print_r($_GET);
$Ps = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$name_switcher = str_replace("%20", "", mb_strtoupper($_GET["nameswitcher"], "UTF-8"));//перевод в верхний регистр, замена пробелов на +
if($name_switcher != "")
$PS = $Ps->getPropSwitch($name_switcher);
//print_r($PS);
//print_r($propswitch); exit();
$scheme = new  Schemas($propswitch["number"]);//создание объекта класса Schemas
if($PS['syntaxerror'] == "" && $PS['logicerror'] == "" && $PS['warning'] == "" && $name_switcher != ""){
 header( 'Location: order_switcher2.php?nameswitcher='.$name_switcher.'&q='.$_GET['quantity'], true, 303 );
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Заказать переключатель</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="Заказать переключатель, купить переключатель" />
<meta name="Description" content="On-line заказ переключателя, купить переключатель, цена переключателя, доставка по Украине" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<script type="text/javascript" src="../../lib/jquery-1.5.1.js"></script>
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
    <div id = "main_content">
	<h2>Заказать переключатель <?= $_GET["name_switcher"]?></h2>
 <center>	
	<p style="text-align:center;">Введите количество переключателей.</p><br/>
	
    <form  name = 'form_order_switcher' action="order_switcher2.php?" method="get">
 
  Количество
 <input type = "text" name = "q" value = "1" size="5">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type = "hidden" name = "nameswitcher" value = "<?= $_GET["name_switcher"]?>" />
 <input type = "submit"  name = "start" value = "Добавить в заказ">
</form>
 </center>



 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>