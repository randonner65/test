<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
$idorder = $_GET["idorder"];
$order->writeId($idorder,"new", "");//сброс флога "Новый"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - заказать</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="Харьковреле, sez krompachy, переключатель, заказать переключатель, купить переключатель, продажа переключателей" />
<meta name="Description" content="Харьковреле, sez krompachy, переключатель, заказать переключатель, купить переключатель, продажа переключателей" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<style>table {text-align: center;}</style>
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
<?php echo("<h2>Заказ № ".$idorder."</h2>");
	
echo("<center><table border='0' width = 'auto' cellpadding='2' cellspacing='5'>");
echo("<tr><td><p> Дата отправки заказа </p></td><td><p>".$order->readOneOrder("date", $idorder)."</b></p></td></tr>");
echo("<tr><td><p> Организация </p></td><td><p><b>".$order->readOneOrder("nameorg", $idorder)."</b></p></td></tr>");
echo("<tr><td><p> Телефон </p></td><td><p><b>".$order->readOneOrder("phone", $idorder)."</b></p></td></tr>");
echo("<tr><td><p> Электронная почта </p></td><td><p><b>".$order->readOneOrder("email", $idorder)."</b></p></td></tr>");
echo("<tr><td><p> Контактное имя </p></td><td><p><b>".$order->readOneOrder("contname", $idorder)."</b></p</td></tr>>");
echo("<tr><td><p> Способ доставки </p></td><td><p><b>".$order->readOneOrder("delivery", $idorder)."</b></p></td></tr>");
echo("<tr><td><p> Дополнительные требования </p></td><td width='400px'><p><b>".$order->readOneOrder("addfield", $idorder)."</b></p></td></tr>");
echo("</center></table></br>");
$AllSwitchers = array();
$AllSwitchers = $orderswitcher->ReadAllId($idorder);//получить все переключателя из просматриваемого заказа
for($i=0; $i < count($AllSwitchers); $i++){ 
echo("<p style='text-align:center;'>Переключатель <b>".$AllSwitchers[$i]["nameswitcher"]." ".$AllSwitchers[$i]["quantity"]." </b> шт. </p></br>");
echo("<p style='text-align:center;'>".$AllSwitchers[$i]['addfield']."</p></br>");
$get = "qpos=".$AllSwitchers[$i]['qpos'];
$get .= "&qcont=".$AllSwitchers[$i]['qcont'];
$get .= "&closdiag=".$AllSwitchers[$i]['closdiag'];
$get .= "&qjump=".$AllSwitchers[$i]['qjump'];
$get .= "&jump=".$AllSwitchers[$i]['jump'];
$get .= "&mark=".$AllSwitchers[$i]['mark'];
$get .= "&board=".$AllSwitchers[$i]['board'];
echo("<img  style = 'margin-left: 5px; margin-top: 5px; ' src = '../blocks/outscheme.php?".$get."' alt = 'схема переключателя' /></br>");
//echo("<p>".$AllSwitchers[$i]['addfield']."</p>");
echo("</br></br>");
}

?>
<form name = 'form' action='panel_orders.php' >
<input type = 'submit'   value = 'Вернуться в Панель заказов'/>


</body>
</html>