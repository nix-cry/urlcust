<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\UrlForm;
use frontend\models\UrlJson;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
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
                'only' => ['logout', 'signup',],
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
     * {@inheritdoc}
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
     * @return mixed
     */

    private function banIp($array)
    {
        $arS = [
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '00',
        ];
        $intStr = false;
        foreach($array as $timeDiff){
            $strTime = (string)$timeDiff["diff_time"];
            if( in_array($strTime, $arS) ){
                $intStr = true; 
            }
        }
        return $intStr;
    }
    
    public function actionIndex($id)
    {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $request = Yii::$app->request;

            $params = [':url_new_name' => 'http://'.$_SERVER["HTTP_HOST"].'/'.$id];
            $post = Yii::$app->db->createCommand('SELECT * FROM addurl WHERE url_new_name=:url_new_name')
               ->bindValues($params)
               ->queryOne();
            $params = [':ip' => $_SERVER["REMOTE_ADDR"]];
            $postDiff = Yii::$app->db->createCommand('SELECT * FROM urlget WHERE ip=:ip ORDER BY ip, id DESC LIMIT 5')
               ->bindValues($params)
               ->queryAll();
            $params = [':ip' => $_SERVER["REMOTE_ADDR"]];
            $postDiffTime = Yii::$app->db->createCommand('SELECT * FROM urlget WHERE ip=:ip ORDER BY ip, id DESC LIMIT 1')
               ->bindValues($params)
               ->queryAll();
            if(empty($postDiffTime)){
                Yii::$app->db->createCommand()->insert('urlget', [
                    'date' => date("Y-m-d H:i:s"),
                    'url_name' => $post["url_name"],
                    'ip' => $_SERVER["REMOTE_ADDR"],
                    'diff_time' => date("Y-m-d H:i:s"),
                    'user_agent' => $_SERVER["HTTP_USER_AGENT"],
                ])->execute();
                header('Location: '.$post["url_name"]);
                exit();
            }else{
                $diff = strtotime(date("Y-m-d H:i:s")) - strtotime($postDiffTime[0]["date"]);
                Yii::$app->db->createCommand()->insert('urlget', [
                    'date' => date("Y-m-d H:i:s"),
                    'url_name' => $post["url_name"],
                    'ip' => $_SERVER["REMOTE_ADDR"],
                    'diff_time' => abs($diff),
                    'user_agent' => $_SERVER["HTTP_USER_AGENT"],
                ])->execute();
                if($this->banIp($postDiff)){
                    $data = ['ip'=>'Бан ip','ban' => $this->banIp($postDiff), 'text' => 'Подозрительная активность вашего ip'];
                    return $data;
                }else{
                    header('Location: '.$post["url_name"]);
                    exit();
                }
            }
    }
    /**
     * Displays Urlwork page.
     *
     * @return mixed
     */
    public function actionUseragent()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $request = Yii::$app->request;

        $params = [':user_agent' => $_GET["useragent"]];
        $post = Yii::$app->db->createCommand('SELECT * FROM urlget WHERE user_agent=:user_agent')
           ->bindValues($params)
           ->queryAll();

        return $post;
    }


    public function actionUrlwork()
    {
        $model = new UrlForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->refresh();
        }
        $params = [];
        $post = Yii::$app->db->createCommand('SELECT url_name as url, COUNT(1) as count,date as month FROM urlget GROUP BY url_name, date  
        ORDER BY `count`  DESC ')
           ->bindValues($params)
           ->queryAll();

        return $this->render('urlwork', [
            'model' => $model,
            'arrGet' => $post,
        ]);
    }


    /**
     * Displays jsonUrlwork page.
     *
     * @return mixed
     */
    public function actionUrlworkjson()
    {

        $model = new UrlForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->refresh();
        }
        $nwurl = "";
        $get = $model->nameurl; 
        $strGet = md5($model->nameurl);
        $params = [':url_name' => $get];
        $post = Yii::$app->db->createCommand('SELECT * FROM addurl WHERE url_name=:url_name')
           ->bindValues($params)
           ->queryOne();
        if($get){
            if(!$post){
                Yii::$app->db->createCommand()->insert('addurl', [
                    'url_name' => $get,
                    'url_new_name' => 'http://'.$_SERVER["HTTP_HOST"].'/'.$strGet,
                ])->execute();
                $nwurl = 'http://'.$_SERVER["HTTP_HOST"].'/'.$strGet;
            }   
        }

    

        return $this->render('urlworkjson', [
            'model' => $model,
            'newurl' => $nwurl,
        ]);


        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // $request = Yii::$app->request;
        // $get = $request->get('url'); 
        // $strGet = md5($get);
        // $params = [':url_name' => $get];
        // $post = Yii::$app->db->createCommand('SELECT * FROM addurl WHERE url_name=:url_name')
        //    ->bindValues($params)
        //    ->queryOne();
        // if($get){
        //     if(!$post){
        //         Yii::$app->db->createCommand()->insert('addurl', [
        //             'url_name' => $get,
        //             'url_new_name' => 'http://'.$_SERVER["HTTP_HOST"].'/'.$strGet,
        //         ])->execute();
        //     }   
        // }
        // $data = ['youip'=> $_SERVER['REMOTE_ADDR'], 'url'=>$get, 'urlnew' => 'http://'.$_SERVER["HTTP_HOST"].'/'.$strGet, 'post' => $post];
        // return $data;
    }



}
