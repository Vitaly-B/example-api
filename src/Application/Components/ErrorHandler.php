<?php

declare(strict_types=1);

namespace app\src\Application\Components;

use app\src\Shared\Domain\Exceptions\ValidationException;
use yii\web\BadRequestHttpException;
use yii\web\ErrorHandler as WebErrorHandler;
use app\src\Shared\Domain\Exceptions\InvalidArgumentException;

final class ErrorHandler extends WebErrorHandler
{
    public function handleException($exception): void
    {
        if ($exception instanceof ValidationException) {
            parent::handleException(
                $exception
            );
        } elseif ($exception instanceof InvalidArgumentException) {
            parent::handleException(
                new BadRequestHttpException($exception->getMessage(), $exception->getCode(), $exception)
            );
        } else {
            parent::handleException($exception);
        }
    }

    protected function renderException($exception): void
    {
        $response = \Yii::$app->response;

        parent::renderException($exception);

        if ($exception instanceof ValidationException) {
            $response->data["errors"] = $exception->errors;
        }
    }

    protected function convertExceptionToArray($exception): array
    {
        $array = parent::convertExceptionToArray($exception);

        if ($exception instanceof ValidationException) {
            $array["errors"] = $exception->errors;
        }

        return $array;
    }
}
