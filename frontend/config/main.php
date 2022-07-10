<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'rules' => array(
        //     'site/' => '/index', //для главной страницы
        //     'site/captcha' => 'site/captcha', //для капчи ничего не меняем
        //     //эти страницы будут открываться при указании только одного действия
        //     '<action:search|login|logout|signup|request-password-reset>' => 'site/<action>',
        //     //остальные правила в своем классе SefRule
        //     ['class' => 'common\components\SefRule', 
        //     'connectionID' => 'db',
        //     ],                
        // ), 

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                '/useragent' => 'site/useragent',
                '/urlwork' => 'site/urlwork',
                '/urlworkjson' => 'site/urlworkjson',
                '/<id:>' => 'site/index',
                
                
                //для главной страницы
        //     'site/captcha' => 'site/captcha', //для капчи ничего не меняем
        //     //эти страницы будут открываться при указании только одного действия
        //     '<action:search|login|logout|signup|request-password-reset>' => 'site/<action>',
        //     //остальные правила в своем классе SefRule
        //     ['class' => 'common\components\SefRule', 
        //     'connectionID' => 'db',
        //     ],
            ],
        ],
        
    ],
    'params' => $params,
];
