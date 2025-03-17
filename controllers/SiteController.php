<?php

declare(strict_types=1);

namespace app\controllers;

use yii\rest\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionIndex(): Response
    {
        return $this->asJson([
            'data' => [
                'project' => 'example-api',
                'version' => '1.0.0',
            ]
        ]);
    }
}
