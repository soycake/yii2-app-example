<?php

# Virtual Host
use \yii\web\Request;
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    
    'id' => 'app-example',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'example\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    
    'defaultRoute' => 'site',
    'layout' => 'example',
    
    /*
    'aliases' => [
        '@name1' => 'path/to/path1',
        '@name2' => 'path/to/path2',
    ],   
    */
    
    'components' => [
        
        # Virtual Host
        'request' => [
            'baseUrl' => $baseUrl // แก้ไข BaseUrl ใหม่
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ]
            ]
        ],
        
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        
        # Virtual Host
        'urlManager' => [   
            
            'showScriptName' => false,   // Disable index.php
            'enablePrettyUrl' => true,   // Disable r= routes
            'enableStrictParsing' => true,
            
            'rules' => array(

                # Basic
                '' => 'site/index',
                       
                # Other
                '<controller:\w+>' => '<controller>/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                
                # Modules
                '<module:\w+>' => '<module>/default/index',
                '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:\w+>/<controller:\w+>/<action>' => '<module>/<controller>/<action>'

            )
            
        ],
        
        # ติดตั้ง Theme 
        'view' => [
            'theme' => [
                'pathMap' => [ '@app/views' => '@app/../themes/main/views' ]
            ]
        ]
        
    ],
    
    'params' => $params
    
];