<?php
namespace backend\controllers;

use dsj\adminuser\models\Adminuser;
use dsj\adminuser\models\AdminuserAjaxLoginForm;
use dsj\adminuser\models\AdminuserLoginForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index'],
                'rules' => [
                    [
                        'actions' => ['login', 'error','captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'common\components\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'width' => 80,
                'height' => 34,
                'padding' => 0,
                'minLength' => 4,
                'maxLength' => 4,
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
        $this->layout = 'main-iframe';

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionTest()
    {
        $this->layout = 'main-iframe';

        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new AdminuserLoginForm(['scenario' => 'login']);

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $model = Adminuser::findOne(['id' => Yii::$app->user->id]);
        $model->last_login_time = date('Y-m-d H:i:s');
        $model->save();
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogin()
    {
        $this->layout = 'main';

        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new AdminuserAjaxLoginForm();

        return $this->render('login',['model' => $model,'tocken' => $model->generateTocken()]);
    }

    public function actionCheck(){
        Yii::$app->response->format = 'json';
        $code = 200;
        $msg = '登录成功';
        $model = new AdminuserAjaxLoginForm();
        if ($model->load(Yii::$app->request->post()) ){
            if (!$model->login()){
                $tocken = $model->generateTocken();
                foreach ($model->errors as $error){
                    return ['code' => 201,"msg"=>$error[0],'tocken' => $tocken];
                }
            }
        }

        $model->deleteTocken();
        return ['code' => $code,"msg" => $msg];
    }
}
