<?php

declare(strict_types=1);

namespace app\src\Example\Domain\Queries\Numbers;

use app\src\Shared\Lib\Assertion\Assert;

final readonly class SumEvenQuery
{
    public const string NUMBERS = 'numbers';

    /**
     * @param int[] $numbers
     */
    public function __construct(public array $numbers)
    {
        Assert::allInteger($this->numbers);
    }

    public static function fromArray(array $data): self
    {
        Assert::keyExists($data, self::NUMBERS);

        return new self(numbers: $data[self::NUMBERS]);
    }
}
