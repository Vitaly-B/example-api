<?php

use app\src\Application\Components\ErrorHandler;
use app\src\Application\Components\Response;
use app\src\Application\Components\Validator;
use app\src\Example\Domain\Interfaces\SumEvenServiceInterface;
use app\src\Example\Domain\Services\Numbers\SumEvenService;
use app\src\Example\Ports\Http\Controllers\Numbers\NumbersController;
use app\src\Application\Components\Request;
use app\src\Shared\Domain\Interfaces\Validation\ValidatorInterface;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'api-v1' => NumbersController::class,
    ],
    'container' => [
        'definitions' => [
            SumEvenServiceInterface::class => SumEvenService::class,
            ValidatorInterface::class => Validator::class
        ],
    ],
    'components' => [
        'response' => [
            'class' => Response::class,
            'format' => yii\web\Response::FORMAT_JSON,
        ],
        'request' => [
            'class' => Request::class,
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'j_oz9KIsotFPJ88yVl1umqb1MIOWcpez',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'class' => ErrorHandler::class,
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'POST api/sum-even' => 'api-v1/sum-even',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
