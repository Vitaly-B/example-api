<?php

declare(strict_types=1);

namespace app\src\Shared\Domain\Interfaces\Validation;

use app\src\Shared\Domain\Exceptions\ValidationException;

interface ValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data, ConstraintsInterface $constraints): void;
}
