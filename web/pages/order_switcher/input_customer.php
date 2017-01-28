<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
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
	<h1>Отправка заказа</h1>
<center>
<h4>Заказчик:</h4>
<form name = 'form_sent_order' action = 'input_customer2.php'  method = 'get'>
<table border="0" width = "auto" cellpadding="4" cellspacing="10" style = 'text-align: right;' >
	<tr>
		<td>Наименование организации:</td>
		<td><input type = "text" name = "nameorg" value = "<?php echo $order->read("nameorg");?>"></td>
		<td style = 'color: red; text-align: left'><?php echo $order->read("errnameorg");?></td>
	</tr>
	<tr>
		<td>Телефон / факс:</td>
		<td><input type = "text" name = "phone" onkeyup="phone(this);" onkeypress="phone(this);" onpaste="phone(this);" value = "<?php echo $order->read("phone");?>"></td>
		<td style = 'color: red; text-align: left'><?php echo $order->read("errphone");?></td>
<script type='text/javascript'>		
function phone(element){
//alert(this);
while(element.value.match(/[^0-9_() +-]/)){
element.value = element.value.replace(/[^0-9_() +-]/, '');
	}
return true;
}		
</script>		
	</tr>
	<tr>
		<td>Электронная почта:</td>
		<td><input type = "text" name = "email" value = "<?php echo $order->read("email");?>"></td>
		<td style = 'color: red; text-align: left'><?php echo $order->read("erremail");?></td>
	</tr>
	<tr>
		<td>Контактное лицо:</td>
		<td><input type = "text" name = "contname" value = "<?php echo $order->read("contname");?>"></td>
		<td style = 'color: red; text-align: left'><?php echo $order->read("errcontname");?></td>
	</tr>
	<tr>
		<td>Способ доставки:</td>
		<td><select name = "delivery">
  <option selected value="<?php echo $order->read("delivery");?>"><?php echo $order->read("delivery");?></option>	
  <option value = "Самовывоз из Харькова">Самовывоз из Харькова</option>
  <option value = "Новая почта">Новая почта</option>
  <option value = "Ночной экспресс">Ночной экспресс</option>
 
</select>
		</td>
		<td style = 'color: red; text-align: left'><?php echo $order->read("errdelivery");?></td>
	</tr>
	<tr>
		<td colspan = '2'>Дополнительная информация:</td>
	</tr>
	<tr>
		<td colspan = '3'><textarea name = "addfield" id = 'text' rows = "4" cols = "65" ><?php echo $order->read("addfield");?></textarea></td>
	</tr>
	<tr>
		<td><input type = 'submit'  value = 'Отправить заказ'/></td>
	</tr>
</table>
</form>
<script type='text/javascript'>
/*function input(){
var url = "save_file_clos_diag.php";//на страницу записи в файл картинки ДЗ
var name_org = document.form_sent_order.name_organization.value;
	if(name_org == ""){
		alert("Вы не ввели наименование организации");
		url = "send_order.php";//на перезагрузку текущей страницы		
}
else	if(document.form_sent_order.tel.value == "" && document.form_sent_order.email.value == ""){
		alert("Вы не ввели ни номер телефона ни адрес электронной почты\nВведите хотя бы что-нибуть одно");
		url = "send_order.php";//на перезагрузку текущей страницы
}
else	if(document.form_sent_order.email.value != "" && !checkEmail()){
		alert("Вы ввели неправильный адрес электронной почты");
		url = "send_order.php";//на перезагрузку текущей страницы
}		
else	if(document.form_sent_order.contact_name.value == ""){
		alert("Вы не ввели контактное лицо");
		url = "send_order.php";//на перезагрузку текущей страницы
}
	for(var i = 0; i < name_org.length; i++)
name_org = name_org.replace('"', ' ');//замена " на пробел в имени организации
		
setCookie("name_organization", name_org); //запись в  cookie наименование организации заказчика
setCookie("tel", document.form_sent_order.tel.value); // запись в  cookie наименование телефона заказчика
setCookie("email", document.form_sent_order.email.value); // запись в  cookie email заказчика
setCookie("contact_name", document.form_sent_order.contact_name.value); // запись в  cookie контактного лица  заказчика

var message = document.form_sent_order.message.value;
message1 = message.replace(/[\r\n]/g, '</br> ');//замена \n на </br>
setCookie("message", message1); // запись в cookie текста доп. поля
//alert(getCookie("message"));
document.location = url;
}
//Проверка правильности ввода email
function checkEmail(){
var email = document.form_sent_order.email.value;
	if(email.indexOf("@") > 0 && email.indexOf("@") < email.length - 1) return true;
	return false;
}

function setCookie(name, value) {
    document.cookie = name + "=" + value;
}
  
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return "";
}
  
 function deleteCookie(name) {
    var date = new Date(); // Берём текущую дату
    date.setTime(date.getTime() - 1); // Возвращаемся в "прошлое"
    document.cookie = name += "=; expires=" + date.toGMTString();
}*/	
</script>	

</center>   
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>