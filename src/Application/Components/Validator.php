<?php

declare(strict_types=1);

namespace app\src\Application\Components;

use app\src\Shared\Domain\Exceptions\ValidationException;
use app\src\Shared\Domain\Interfaces\Validation\ConstraintsInterface;
use app\src\Shared\Domain\Interfaces\Validation\ValidatorInterface;

final class Validator implements ValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate(array $data, ConstraintsInterface $constraints): void
    {
        $errors = $constraints->getErrors($data);
        if (isset($errors)) {
            throw new ValidationException($errors);
        }
    }
}
