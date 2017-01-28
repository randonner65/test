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
<center><h3>На указанный Вами телефон/факс будет вытавлен счет для оплаты заказа.</h3>

<?php
	if(!@is_dir($_SERVER["REMOTE_ADDR"]))
  mkdir($_SERVER["REMOTE_ADDR"], 0777);//создание каталога с именем IP посетителя сайта 

	for($nposorder = 1; $nposorder < $_COOKIE["qposorder"]; $nposorder++){
	
//echo("<img  style = 'display: none; ' src = 'outInputSchemeLetter.php?nposorder=".$nposorder."' alt = 'схема переключателя' />");
echo("<img   src = 'outInputSchemeLetter.php?nposorder=".$nposorder."' alt = 'схема переключателя' /></br>");
}
?>
<script type='text/javascript'>
	function func() { 
	  document.location = "send_letter.php";//на страницу отправки письма
	}
	setTimeout(func, 200);//задержка перехода на следующюю страницу 200 мс


</script>	

</center>   
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>