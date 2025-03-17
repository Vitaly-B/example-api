<?php

declare(strict_types=1);

namespace app\src\Example\Domain\Services\Numbers;

use app\src\Example\Domain\Interfaces\SumEvenServiceInterface;
use app\src\Example\Domain\ValueObjects\Numbers\Numbers;
final readonly class SumEvenService implements SumEvenServiceInterface
{
    public function __invoke(Numbers $numbers): int
    {
        return array_sum(array_filter($numbers->numbers, fn($number) => $number % 2 === 0));
    }
}