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
	<h1>Заказать переключатель</h1>
	<p>Для того чтобы купить переключатель сделайте заказ на этом сайте или позвоните по телефону (057) 759 18 54.</p>
	<p>Если Вам известно наименование переключателя, введите его и нажмите кнопку "Добавить в заказ".</p><br/>
	
    <form  name = 'form_order_switcher' action="" method="get">
 Переключатель 
<input type = "text" name = "nameswitcher" value = "<?=$_SESSION["nameswitcher"]?>" size="25">&nbsp;&nbsp;&nbsp;&nbsp;
  Количество
 <input type = "text" name = "quantity" value = "1" size="5">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type = "submit" onClick = 'clicked()' name = "start" value = "Добавить в заказ">
</form>
<?php if ($PS['syntaxerror'] != '') print_r ( "</br><p style = 'color:red;'>В наименовании переключателя ".$PS['syntaxerror']."</p>");
		if ($PS['logicerror'] != '') print_r ("</br><p style = 'color:red;'> Переключатель ".$PS['nameswitchstyle']." ".$PS['logicerror']."</p>");
		if ($PS['warning'] != '') print_r ("</br><p style = 'color:red;'> Переключатель ".$PS['nameswitchstyle']." ".$PS['warning']."</p>");
		?>
 <center>
 <br/><p>Если наименование переключателя Вам не известно, Вы можете узнать наименование переключателя с помощью конструктора. Для этого нажмите кнопку "Конструктор переключателя".</p>
<br/><p id = "error" style = 'color:red; font-size:150%; text-align:center;'></p>
<p id = "error1" style = 'color:red; font-size:150%; text-align:center; '><?php echo $_GET["message"];?></p>
 <div id = 'constr_switcher' style = 'height: "40px"'>
<a  href = "constr_switcher1.php" title = "Конструктор переключателя">Конструктор переключателя</a>
  </div>
   </center><br/><br/>
   <p>Цену на переключатель можно узнать, позвонив по телефону (057) 759 18 54.</p>
   <p>Доставка осуществляется по всей Украине.</p>
   
<script type='text/javascript'>
function clicked() {
//alert("jhjhjh");
 // setCookie("switcher_current", "ytyt"); // Устанавливаем cookie
  //alert(getCookie("switcher_current")); // Выводим cookie
//document.location = "constr_switcher2.php";
nameswitcher = document.form_order_switcher.nameswitcher.value;

if(getCookie("quantity_pos_order") == "") setCookie("quantity_pos_order", 0);//количество позиций в заказе
var q = document.form_order_switcher.quantity.value;
if (Math.round(q) - q != 0 && Math.round(q) - q != 1) {
alert ("Введите целое число");
document.location = "#";
	}
 else 
if (q <= 0) {
alert ("Введите положительное число");
document.location ="#";
	}
 else{
 url = "order_switcher2.php?";
url += "&nameswitcher="+nameswitcher;
url += "&q="+q;
document.location = url;
	}
}

 function setCookie(name, value) {
    document.cookie = name + "=" + value;
  }
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
	//alert r[2];
    if (r) return r[2];
    else return "";
  }

</script>

 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>