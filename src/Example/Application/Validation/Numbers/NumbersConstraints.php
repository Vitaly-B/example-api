<?php

declare(strict_types=1);

namespace app\src\Example\Application\Validation\Numbers;

use app\src\Shared\Domain\Interfaces\Validation\ConstraintsInterface;
use yii\base\DynamicModel;
use yii\base\InvalidConfigException;

final readonly class NumbersConstraints implements ConstraintsInterface
{
    /**
     * @throws InvalidConfigException
     */
    public function getErrors(array $data): ?array
    {
        $model = DynamicModel::validateData($data, [
            [['numbers'], 'each', 'rule' => ['integer']],
        ]);

        if ($model->hasErrors()) {
            return $model->errors;
        }

        return null;
    }
}
