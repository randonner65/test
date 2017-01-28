<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
{
    return $this->render('index');
}


    public function actionServices()
{
    return $this->render('services');
}

    public function actionPayment()
    {
        return $this->render('payment');
        
    }
    public function actionProducts()
{
    return $this->render('products');

}

    public function actionReg_doc()
    {
        return $this->render('reg_doc');

    }

    public function actionOrder()
    {
        return $this->render('order');

    }

    public function actionDescription_switchers()
{
    return $this->render('description_switchers');
}

    public function actionSwitchers()
    {
        return $this->render('switchers');
    }
    public function actionFaqs()
    {
        return $this->render('faqs');
    }
    public function actionCertificates()
    {
        return $this->render('certificates');
    }
    public function actionMetal_constr()
    {
        return $this->render('metal_constr');
    }
    public function actionCabinets_frame()
    {
        return $this->render('cabinets_frame');
    }

    public function actionCabinets_allwelded()
    {
        return $this->render('cabinets_allwelded');
    }

    public function actionBoxes()
    {
        return $this->render('boxes');
    }

    public function actionRemotes()
    {
        return $this->render('remotes');
    }

    public function actionBcm()
    {
        return $this->render('bcm');
    }
    public function actionContacts()
    {
        return $this->render('contacts');
    }
    public function actionOrder_mc()
    {
        return $this->render('order_mc');
    }
    public function actionOrder_bcm()
    {
        return $this->render('order_bcm');
    }
    public function actionOrder_switcher()
    {
        return $this->render('order_switcher');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
