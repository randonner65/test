<?php
require_once "pages/static_pages/class_static_pages.php";//подключение класса Статические страницы
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
$staticpage->namepage = "main";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $staticpage->read("title");?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="<?php echo $staticpage->read("keywords");?>" />
<meta name="Description" content="<?php echo $staticpage->read("description");?>" />
<meta name="Author" content="Дмитрий Коржов" />
<meta http-equiv="Reply-to" content="korzhov65@male.ru" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<meta name="google-site-verification" content="vOwng_y-A-4rgJz-2oOGR_cpffewqwx2LJg18lM1ARA" />
<script type="text/javascript" src="/js/jquery-1.2.6.js"></script>
	<script type="text/javascript" src="/js/startstop-slider.js"></script>
</head>
  
<body>
<!-- Start SiteHeart code -->
<div style="position:absolute;left:-10000px;">
<img src="//top-fwz1.mail.ru/counter?id=2377009;js=na" style="border:0;" height="1" width="1" alt="@Mail.ru" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->

  <?php require_once "blocks/header.html";?>
 <div id = "content" >
  <?php require_once "blocks/left_panel.html";?>
   <div id = "main_content">
<h1>Мы занимаемся проектированием и монтажом электрооборудования любой сложности. Производим поворотные кулачковые переключатели галетного типа</h1>

<div id="slider">

			<div id="mover">
				<div id="slide-1" class="slide">
					<h2>Переключатели</h2>
					<p>Ряд кулачковых переключателей серии S10, 16, 25, 32, 63, 100, 160J – новое поколение переключателей в электрическом ряду от 10 до 160А.</p>
					<a href="http://khrl.com.ua/pages/order_switcher/order_switcher.php"><img src="/images/pereklyuchateli-slide.gif" alt="learn more" /></a>
				</div>
				<div class="slide">
					<h2>Шкафы каркасные</h2>
					<p>Металлоконструкции каркасные напольного исполнения серии МК</p>
					<a href="http://khrl.com.ua/pages/order_mc/order_mc.php"><img src="/images/shkafi-karkasnie-slide.gif" alt="learn more" /></a>
				</div>
				<div class="slide">
					<h2>Пульты</h2>
					<p>Пульты управления с наклонной консолью, прямой и без консоли, могут комплектоваться цоколем </p>
					<a href="http://khrl.com.ua/pages/order_mc/order_mc.php"><img src="/images/pulti-slide.gif" alt="learn more" /></a>
				</div>
			</div>
		</div>   
   
	<?php 	echo $staticpage->read("text");?>
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "blocks/footer.html";?>

</body>
</html>