<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
//echo $_COOKIE["qposorder"];
$order->write("delivery", "");//запись варианта доставки по умолчанию
//$orderswitcher->read("nameswitcher");
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
	<h1>Ваш заказ</h1>
<center><table border="0" width = "auto" cellpadding="4" cellspacing="10" >
	<tr>
	
		<th colspan = '2'>Наименование товара</th><th>Количество</th><th>Просмотреть</th><th>Редактировать</th><th>Удалить</th></tr>
<?php
	if($order->read("sent") == 1) echo("<p style = 'text-align:center;'>Вы свой заказ уже отправили </p>");
	else {
	

$AllSwitchers = array();// массив всех заказанных переключателей из текущего заказа
$AllSwitchers = $orderswitcher->readAll();

for($nposorder=0; $nposorder < count($AllSwitchers); $nposorder++){

$nameswitcher = $AllSwitchers[$nposorder]["nameswitcher"];			
$quantity = $AllSwitchers[$nposorder]["quantity"];			
$idorderswitch = $AllSwitchers[$nposorder]["id"];			
 echo("<tr><td>");			
 echo("Переключатель</td><td style = 'text-align: left;'>".$nameswitcher."</td><td>".$quantity."</td>");
 echo("<td><a href='javascript:clicked(\"view\",".$idorderswitch.")' style = 'color: green;'>Просмотреть</a></td>");
 if($AllSwitchers[$nposorder]["constructor"] == 1)
	echo("<td><a href='javascript:clicked(\"edit\",".$idorderswitch.")' style = 'color: blue;'>Редактировать</a></td>");
 else
	echo("<td></td>");
 echo("<td><a href='del_pos_order.php?idorderswitch=".$idorderswitch."' style = 'color: red;'>Удалить</a><td></tr>"); 
 }
echo("</table>");
if(count($AllSwitchers) == 0 )//если  количество заказанных переключателей = 0 
	 echo("<p style = 'text-align:center;'>Вы еще ничего не заказали</p>");
else 	{
	echo("<form name = 'send_order' action = 'input_customer.php'  method = 'get'>");
	echo("<input type = 'submit'   value = 'Отправить заказ'/>");
	echo("</form>");
		}
	}
?> 
</center>
  
 </div>
 </div>
 <div class="clear"></div>
<script type='text/javascript'>
function clicked(mode,idorderswitch) {
  setCookie("construct_mode", mode); // Устанавливаем  в cookie режим конструктора
  setCookie("id_order_switcher", idorderswitch); // Устанавливаем  в cookie id строки для просмотра или редактирования
 //alert(document.cookie);
document.location = "constr_switcher12.php?idorderswitch="+idorderswitch;//на страницу просмотра переключателя  
}
 function setCookie(name, value) {
    document.cookie = name + "=" + value;
  }
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return "";
  }

</script>	 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>