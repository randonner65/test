<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$orderswitcher = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher

$name_switcher = $_GET['name_switcher'];
$propswitch = $orderswitcher->getPropSwitch($name_switcher);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - паспорт переключателя <?php echo $_GET['name_switcher']?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="Харьковреле, заказать блок управления двигателем, купить блок управления двигателем, продажа блоков управления двигателем" />
<meta name="Description" content="Харьковреле, заказать блок управления двигателем, купить блок управления двигателем, продажа блоков управления двигателем" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<h1>Ошибка <?php echo $_GET['err']?></h1>

  
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>