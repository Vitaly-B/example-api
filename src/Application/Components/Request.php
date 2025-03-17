<?php

declare(strict_types=1);

namespace app\src\Application\Components;

final class Request extends \yii\web\Request
{
    public function getBodyParams(): array
    {
        return (array)json_decode($this->getRawBody(), true);
    }
}
