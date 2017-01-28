<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Схема</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="Харьковреле, схема переключателя, поиск схемы переключателя" />
<meta name="Description" content="Харьковреле, схема переключателя, поиск схемы переключателя" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<!--[if IE ]>
		<link rel='stylesheet' href='/styles/ie.css' type='text/css' />
	<![endif]-->
</head>
  
<body>

  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
   <h1>Поиск схем кулачковых переключателей</h1>
	 <table  class="schema_title" width="70%" border="0" align="center" >
	<tr>
		<td colspan = "2">
			<h3 style = "text-align: left; margin-left: 150px;">По Вашему запросу найдена</h3>
			<h2>схема <?php echo  str_replace(" ", "+", $_GET['number0']);?></h2>
		</td>
		<td align = "right">
			<div class = "ret_list_schemes" >
			<form name = "form_serch" action = "../scheme_switch/scheme_switch.php"  method = "get">
			<input type = "submit" value = "Вернуться к списку схем" />
			</form>
			</div>
		</td>
	</tr>
	<tr>
		<td>	

	<div class = "scheme" style = "margin-top: 0px; ">
 <img  style = "margin-left: 5px; margin-top: 5px; " src = "../scheme_switch/outscheme.php?number=