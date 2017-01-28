<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
$orderswitcher->init();//Добавление новой записи в таблицу заказанных переключателей
if(!isset($_COOKIE["idorder"]) || $_COOKIE["idorder"] == -1){//если заказ не существует открыть новый заказ
		$order->addNewOrder();//создание нового заказа
		setcookie("idorder", $order->maxid());//запись в cookie номера текущего заказа
	}
//print_r($_GET);
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
	<p>Если Вам известно наименование переключателя, введите его (заполните поля формы) и нажмите кнопку "Добавить в заказ".</p><br/>
	
    <form name = 'form_order_switcher' action="#" method="get">
 Переключатель S
 <select name="current">
	<option value="10">10</option>
	<option value="16">16</option>
	<option value="25">25</option>
	<option value="32">32</option>
	<option value="63">63</option>
	<option value="100">100</option>
	<option value="160">160</option>
 </select>	
  J
 <select name="constr">
	<option value="D">D</option>
	<option value=" "> </option>
	<option value="VD">VD</option>
	<option value="DG">DG</option>
	<option value="G">G</option>
	<option value="V">V</option>
	<option value="VG">VG</option>
	<option value="VDG">VDG</option>
	<option value="K">K</option>
	<option value="B">B</option>
	<option value="BD">BD</option>
	<option value="BU">BU</option>
	<option value="LD">LD</option>
	<option value="OD">OD</option>
	<option value="VLD">VLD</option>
	<option value="VOD">VOD</option>
	<option value="U">U</option>
	<option value="P">P</option>
	<option value="PU">PU</option>
	<option value="PD">PD</option>
 </select>
 <input type = "text" name = "number_scheme" value = "" size="5">
  <select name="init_pos">
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
	<option value="D">D</option>
	<option value="V">V</option>
	<option value="M">M</option>
 </select>
 <select name="angle">
	<option value="4">4</option>
	<option value="6">6</option>
	<option value="8">8</option>
	<option value="1">1</option>
 </select>
 <select name="color">
	<option value=""> </option>
	<option value="R">R</option>
	<option value="B">B</option>
	<option value="T">T</option>
 </select>&nbsp;&nbsp;&nbsp;&nbsp;
  Количество
 <input type = "text" name = "quantity" value = "1" size="5">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type = "button" onClick = 'clicked()' name = "start" value = "Добавить в заказ">
</form>
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
var current = document.form_order_switcher.current.value;//запись тока
var constr = document.form_order_switcher.constr.value;//запись конструтивного исполения
var number_scheme = document.form_order_switcher.number_scheme.value;//запись номера схемы
var init_pos = document.form_order_switcher.init_pos.value;//запись началного положения
var angle = document.form_order_switcher.angle.value;//запись угла поворота
var color = document.form_order_switcher.color.value;//запись цвета ручки

//Запись имени преключателя
var switcher_name = "S" + current + "J" + constr + number_scheme + init_pos + angle + color;

//Запись ручки управления
	if(constr.indexOf("K") != -1) var handle = "key";
	else if(constr.indexOf("U") != -1 && color.indexOf("B") == -1) var handle = "ur";
	else if(constr.indexOf("U") != -1 && color.indexOf("B") != -1) var handle = "ub";
	else if(color.indexOf("T") != -1) var handle = "t";
	else if(color.indexOf("R") != -1) var handle = "red";
	else  var handle = "black";
	
//Запись наличия лицевой панели
	if(constr.indexOf("D") != -1) var inf_board = "yes";
	else var inf_board = "no";
//Запись наличия уплотнения по оси
	if(constr.indexOf("G") != -1) var ip54 = "yes";
	else var ip54 = "no";
//Запись способа крепления

	if(constr.indexOf("O") != -1) var fix = "O";
	else if(constr.indexOf("L") != -1) var fix = "L";
	else if(constr.indexOf("P") != -1) var fix = "P";
	else if(constr.indexOf("B") != -1) var fix = "B";
	else  var fix = "";
//Запись самовозврата
	if(constr.indexOf("V") != -1)  momentary = "yes";
	else  momentary = "no";


if(getCookie("quantity_pos_order") == "") setCookie("quantity_pos_order", 0);//количество позиций в заказе
var q = document.form_order_switcher.quantity.value;
if (!(q/q)) {
alert ("Введите целое число");
document.location = "order_switcher.php";
 }
if (q <= 0) {
alert ("Введите положительное число");
document.location ="order_switcher.php";
 }
 url = "order_switcher2.php?";
url += "current="+current;
url += "&constr="+constr;
url += "&number_scheme="+number_scheme;
url += "&init_pos="+init_pos;
url += "&angle="+angle;
url += "&color="+color;
url += "&q="+q;
document.location = url;
 /*
//Преобразование свойств переключателя в строку
strPropSwit = "available&";//доступность
strPropSwit += switcher_name+"&"+q+"&";//наименование и количество
strPropSwit += current+"&";
strPropSwit += handle+"&";
strPropSwit += inf_board+"&";
strPropSwit += ip54+"&";
strPropSwit += fix+"&";
strPropSwit += ""+"&";//длина оси "В"


$.get(
  "/pages/order_switcher/get_req_search_number_scheme.php",
  {
    name: number_scheme
  
  },
  onAjaxSuccess
);
*/
}

function onAjaxSuccess(propSwit){
// Здесь мы получаем данные, отправленные сервером 
  //alert(propSwit);
	if(propSwit == "#&&&&&"){
		document.all.item("error").innerHTML = "Номер схемы "+number_scheme+" не существует";
document.all.item("error1").innerHTML = "Для определения номера схемы воспользуйтесь <a href = '../search_scheme/search_scheme.php'>Поиском схемы</a>";
}
else{
strPropSwit += propSwit+"&";
strPropSwit += number_scheme+"&";
strPropSwit += momentary+"&";
strPropSwit += "&";
strPropSwit += angle+"&";
strPropSwit += init_pos+"&";
//alert(strPropSwit);
if(url == "your_order.php"){
var nPO = getCookie("quantity_pos_order");//количество позиций в заказе
nPO++;
setCookie("quantity_pos_order", nPO);//инкремент количества позиций в заказе
setCookie("switcher"+nPO, strPropSwit);//запись строки свойств переключателя в Cookie
}
//alert(document.cookie);

document.location = url;//на страницу заказа

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