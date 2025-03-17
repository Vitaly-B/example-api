<?php

declare(strict_types=1);

namespace app\src\Example\Domain\ValueObjects\Numbers;

use app\src\Shared\Lib\Assertion\Assert;

final readonly class Numbers
{
    /**
     * @var int[]
     */
    public array $numbers;

    public function __construct(int ...$numbers)
    {
        Assert::allInteger($numbers);

        $this->numbers = $numbers;
    }
}
