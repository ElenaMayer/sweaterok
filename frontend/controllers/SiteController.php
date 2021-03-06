<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use frontend\models\ContactForm;
use common\models\Category;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    public function actionIndex()
    {
        $categories = Category::find()->where(['is_active' => 1])->indexBy('id')->orderBy('id')->all();
        $novelty = Product::find()->where(['is_active' => 1, 'is_in_stock' => 1, 'is_novelty' => 1])->orderBy('id DESC')->limit(Yii::$app->params['indexPageNoveltyCount'])->all();
        return $this->render('index', [
            'categories' => $categories,
            'novelty' => $novelty,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Спасибо, что написали нам. Мы ответим Вам как можно скорее.');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка при отправлении письма.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionShipping()
    {
        return $this->render('shipping');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRefund()
    {
        return $this->render('refund');
    }

    public function actionOffer()
    {
        return $this->render('offer');
    }

    public function actionSizes()
    {
        return $this->render('sizes');
    }

    public function actionOrder()
    {
        return $this->render('order');
    }
}
