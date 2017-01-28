<?php
require_once "class_users.php";//подключение класса Users
require_once "../static_pages/class_static_pages.php";//подключение класса Статические страницы
$user = new  ClassUsers();//создание объекта класса ClassUsers
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
if(isset($_GET["namepage"]))
 $staticpage->namepage = $_GET["namepage"];
else $staticpage->namepage = $_COOKIE["name_static_page"];
setcookie("name_static_page", $staticpage->namepage);//имя редактируемой страницы
//setcookie("mode_editor_static_page", "word");//имя редактируемой страницы
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - Редактирование  страницы <?php echo $staticpage->read("title");?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<!-- Подключение редактора TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

if(getCookie("mode_editor_static_page") == "word")
tinyMCE.init({
// General options
mode : "textareas",
theme : "advanced",
document_base_url : "<?php echo URL;?>",
//language : "ru",
inline_styles: true,
convert_urls : false,
relative_urls : false,
remove_script_host : false,
//valid_elements : "*[*]", 
cleanup: true,
extended_valid_elements:"noindex, strong/b, em/i, sup, sub, ul, ol, li, div[class | id | style | name | title | align | width | height], span[class | id | style | name | title], hr[class | id | style | name | title | align | width | height], img[class | id | style | name | title | src | align | alt | hspace | vspace | width | height | border=0], a[class | id | style | name | title | src | href | rel | target | ], iframe[class | id | style | name | title | src | align | width | height | marginwidth | marginheight | scrolling | frameborder | border | bordercolor], embed[class | id | style | name | title | align | width | height | hspace | vspace | type | pluginspage | src], object[class | id | style | name | title | align | width | height | hspace | vspace | type | classid | code | codebase | codetype | data]",
plugins : "pagebreak, style, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template, wordcount, advlist, autosave",
// Theme options
theme_advanced_buttons1 : "undo, redo, |, bold, italic, underline, strikethrough, |, justifyleft, justifycenter, justifyright, justifyfull, styleselect, formatselect, fontselect, fontsizeselect, sub, sup, |, forecolor, backcolor",
theme_advanced_buttons2 : "cut, copy, paste, pastetext, pasteword, removeformat, cleanup, |, search, replace, |, bullist, numlist, |, outdent, indent, blockquote, |, link, unlink, image, |, insertdate, inserttime, hr, |, charmap, emotions, iespell",
theme_advanced_buttons3 : "tablecontrols, |, visualaid, |, styleprops, |, cite, abbr, acronym, del, ins, |, visualchars, nonbreaking, |, print, preview, |, fullscreen",
//theme_advanced_buttons4 : 
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
});
else

function setCookie(name, value) {
    document.cookie = name + "=" + value;
  }
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return "";
  }
</script>
<!-- /TinyMCE -->


</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
   	<p style = 'text-align: center; '>Вы вошли в закрытый раздел сайта как 
	<b style = 'color:red;'><?php echo $user->read("status");?></b>
	<b style = 'font-size: 130%;'><?php echo $user->read("login");?></b>
	<form name = 'mode_editor' action = '#'  onClick = 'change_mode();'  method = 'get'>
<input type = 'button'   value = 'html / word'/></form>
	</p>
	
	<form name = 'form_admin_panel1' action = 'edit_static_pages.php'  method = 'get'>
<center><input type = 'submit'   value = 'Веруться к списку страниц для редактирования'/></center></form>
	
	<h2>Редактирование  страницы </h2><h1><span style = 'color: blue; font-size: 90%;'><?php echo $staticpage->read("title");?><span></h1>
	

	
			<form name = 'edit_content_page' action='update_static_page.php?namepage=<?php echo $staticpage->namepage;?>' method="post" enctype="application/x-www-form-urlencoded">
	Заголовок:<br />
<input type='text' name='title' size='85' value='<?php echo $staticpage->read("title");?>'><br /><br />
	Ключевые слова:<br />
<input type='text' name='keywords' size='85' value='<?php echo $staticpage->read("keywords");?>'><br /><br />
	Описание:<br />
<input type='text' name='description' size='85' value='<?php echo $staticpage->read("description");?>'>
<br /><br />
	
<center><input type='submit' name='button' value='Сохранить изменения'></center>
	Контент:<br />
<textarea name='text' cols="70" rows="40" id="edit_text"><?php	echo $staticpage->read("text");?></textarea><br />
<br />	
</form>
			<form name 'save_picture' enctype='multipart/form-data' action='save_picture.php?namepage=<?php echo $staticpage->namepage ?>' method='POST'>
  Для размещения на редактируемой странице картинки выберите файл изображения: <input name='userfile' type='file'  size=10/><br /><br />
    <input type='submit' value='Загрузить изображение на сервер' />
</form><br /><br />	
<script type="text/javascript">
function change_mode(){
if(getCookie("mode_editor_static_page") == "word") setCookie("mode_editor_static_page", "html");
else setCookie("mode_editor_static_page", "word");
document.location = "edit_static_page.php";
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
<?php  ?>	
</body>
</html>