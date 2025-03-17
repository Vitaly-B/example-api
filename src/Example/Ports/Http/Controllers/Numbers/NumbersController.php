<?php

declare(strict_types=1);

namespace app\src\Example\Ports\Http\Controllers\Numbers;

use yii\rest\Controller;
use app\src\Example\Ports\Http\Controllers\Numbers\Actions\SumEvenNumbersAction;

final class NumbersController extends Controller
{
    public function actions(): array

    {
        return [
            'sum-even' => SumEvenNumbersAction::class,
        ];
    }
}
