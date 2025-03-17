<?php

declare(strict_types=1);

namespace app\src\Example\Domain\ValueObjects\Numbers;

final readonly class Numbers
{
    /**
     * @var int[]
     */
    public array $numbers;

    public function __construct(int ...$numbers)
    {
        $this->numbers = $numbers;
    }
}
