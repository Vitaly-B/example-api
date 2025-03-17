<?php

declare(strict_types=1);

namespace app\src\Example\Domain\Interfaces;

use app\src\Example\Domain\ValueObjects\Numbers\Numbers;

interface SumEvenServiceInterface
{
    public function __invoke(Numbers $numbers): int;
}
