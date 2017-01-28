<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: /switcher/passport.php");
 //print_r ($_GET);

function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$errors = new Errors();//создание объекта класса Errors
$synterr = $errors->read('syntax');
$logicerr = $errors->read('logic');
//print_r ($synterr);
//print_r ($logicerr);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - паспорт переключателя</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<h1>Паспорт переключателя</h1>
<center><p>Для просмотра паспорта введите наименование переключателя, например, S25JD9557C8 </p></center><br/><br/> 

<center><div>
			<form name = "passport_switcher" action = "passport1.php"  method = "get">
			   <input type = "text" name = "name_switcher" size="16" value = "<?php echo $_GET['name'];?>"/>
			   <input type = "submit" value = "Просмотр" />
			</form>
		</div>	
  <center/>
 <br/><br/> 
 <?php if ($synterr != '') echo 'В наименовании переключателя '.$synterr;
		if ($logicerr != '') print_r ("Переключатель ".$_GET['namestyle']." ".$logicerr);?>
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>