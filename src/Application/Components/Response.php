<?php

declare(strict_types=1);

namespace app\src\Application\Components;

use app\src\Shared\Domain\Exceptions\ValidationException;
use yii\web\Response as BaseResponse;

final class Response extends BaseResponse
{
    public function setStatusCodeByException($e): Response
    {
        if ($e instanceof ValidationException) {
            return $this->setStatusCode($e->getCode());
        } else {
            return parent::setStatusCodeByException($e);
        }
    }
}
