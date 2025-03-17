<?php

declare(strict_types=1);

namespace app\src\Shared\Domain\Interfaces\Validation;

interface ConstraintsInterface
{
    public function getErrors(array $data): ?array;
}
