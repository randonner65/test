<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SchemeController extends Controller
{
    public function actionIndex()
    {
        if(isset($_GET['number'] ))
            return $this->render('outpagescheme',['get' => $_GET['number']]);
           // return $this->render('scheme1',['get' => $_GET['number']]);
        else
        return $this->render('index',[]);


    }

    /*public function actionScheme1()
    {
        $get = $_GET['n'];
        return $this->render('scheme1',['get' => $get]);



    }*/
}