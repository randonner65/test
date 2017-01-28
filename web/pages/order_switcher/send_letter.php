<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers

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
	<h1>Ваш заказ отправлен</h1>
<center><h3>На указанный Вами телефон/факс будет выставлен счет для оплаты заказа.</h3>

<?php

$customer = "<h3>Заказ переключателей с сайта ХАРЬКОВРЕЛЕ</h3><br/>";
$customer .= "Заказчик: <b>".$order->read("nameorg")."</b><br/>";
$customer .= "Телефон/факс: <b>".$order->read("phone")."</b><br/>";
$customer .= "Email: <b>".$order->read("email")."</b><br/>";
$customer .= "Контактное лицо: <b>".$order->read("contname")."</b><br/>";
$customer .= "Дополнительные требования: <b>".$order->read("addfield")."</b><br/><br/>";
$AllSwitchers = array();// массив всех заказанных переключателей из текущего заказа
$AllSwitchers = $orderswitcher->readAll();
$message = "";
for($i=0; $i < count($AllSwitchers); $i++){
$message .= "<p><b>Переключатель  ".$AllSwitchers[$i]["nameswitcher"]." ".$AllSwitchers[$i]["quantity"]."шт.</b></p>";
$get = "qpos=".$AllSwitchers[$i]['qpos'];
$get .= "&qcont=".$AllSwitchers[$i]['qcont'];
$get .= "&closdiag=".$AllSwitchers[$i]['closdiag'];
$get .= "&qjump=".$AllSwitchers[$i]['qjump'];
$get .= "&jump=".$AllSwitchers[$i]['jump'];
$get .= "&mark=".$AllSwitchers[$i]['mark'];
$get .= "&board=".$AllSwitchers[$i]['board'];
$message .="<p> ".URL."pages/blocks/outscheme.php?".$get."</p>";
$message .="<p> ".$AllSwitchers[$i]['addfield']."</p></br></br>";
$body = $customer.$message;
	}
$subj = "Заказ переключателей";
$headers = "From: rele_switch@mail.ru \r\nContent-type: text/html; charset=UTF-8 \r\n";
mail("xarkovrele@gmail.com", $subj, $body, $headers);
mail("korzhov65@mail.ru", $subj, $body, $headers);
mail("iskanderkul@yandex.ru", $subj, $body, $headers);
mail("valeriy@rele.kharkov.com", $subj, $body, $headers);
?>




<script type='text/javascript'>
setCookie("idorder", -1);//запись в cookie номера текущего заказа
setCookie("nposorder", -1);//запись в cookie номера текущей позиции заказа
 //document.location = "send_letter1.php";//на страницу отправки письма 
function setCookie(name, value) {
    document.cookie = name + "=" + value;
  }
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return "";
  }
	
</script>	

</center>   
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>