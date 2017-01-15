<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Харьковреле - заказать блок управления двигателем</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf8"/>
    <meta name="Keywords" content="Харьковреле, заказать блок управления двигателем, купить блок управления двигателем, продажа блоков управления двигателем" />
    <meta name="Description" content="Харьковреле, заказать блок управления двигателем, купить блок управления двигателем, продажа блоков управления двигателем" />
    <meta name="Author" content="Дмитрий Коржов" />
    <link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<?php require_once "header.html";?>
<div id = "content" >
    <?php require_once "left_panel.html";?>
    <div id = "main_content">
        <h1>Заказать блок управления двигателем</h1>
        <center><p>Для заказа блока управления двигателем позвоните по телефону <b>(057) 759 18 54</b>.</p></br>
            <p>Форма On-line заказа блока управления двигателем находистя в разработке.</p></center>
    </div>
</div>
<div class="clear"></div>

<?php //require_once "footer.html";?>

<div id = "footer" class="clear" style='background: #eee;'>
    <p>ЧП Харьковреле &copy; 2003 - <?=date("Y");?></p>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
