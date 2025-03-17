<?php

declare(strict_types=1);

namespace app\src\Example\Application\DTO\Numbers;

final readonly class SumEvenDTO
{
    public function __construct(public int $sumEven)
    {
    }
}
