<?php

declare(strict_types=1);

namespace Unit\Example\Application\Domain\Services\Numbers;

use app\src\Example\Domain\Interfaces\SumEvenServiceInterface;
use app\src\Example\Domain\Services\Numbers\SumEvenService;
use app\src\Example\Domain\ValueObjects\Numbers\Numbers;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

final class SumEvenServiceTest extends TestCase
{
    public function testObjectCreation(): SumEvenService
    {
        $service = new SumEvenService();

        $this->assertInstanceOf(SumEvenServiceInterface::class, $service);
        $this->assertInstanceOf(SumEvenService::class, $service);

        return $service;
    }

    #[Depends('testObjectCreation')]
    public function testSumEvenNumbers(SumEvenService $service): void
    {
        $numbers = new Numbers(...[2, 4, 6, 8]);

        $this->assertEquals(20, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testOnlyOddNumbers(SumEvenService $service): void
    {
        $numbers = new Numbers(...[1, 3, 5, 7]);

        $this->assertSame(0, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testEmptyArray(SumEvenService $service): void
    {
        $numbers = new Numbers(...[]);

        $this->assertSame(0, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testNegativeEvenNumbers(SumEvenService $service): void
    {
        $numbers = new Numbers(...[-2, -4, -6]);

        $this->assertSame(-12, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testMixedNumbers(SumEvenService $service): void
    {
        $numbers = new Numbers(...[1, 2, 3, 4, 5, 6]);

        $this->assertSame(12, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testZeroInArray(SumEvenService $service): void
    {
        $numbers = new Numbers(...[0, 1, 2]);

        $this->assertSame(2, ($service)($numbers));
    }

    #[Depends('testObjectCreation')]
    public function testDuplicateEvenNumbers(SumEvenService $service): void
    {
        $numbers = new Numbers(...[2, 2, 4, 4]);

        $this->assertSame(12, ($service)($numbers));
    }
}
