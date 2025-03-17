<?php

declare(strict_types=1);

namespace Unit\Example\Application\QueryHandlers\Numbers;

use app\src\Example\Application\DTO\Numbers\SumEvenDTO;
use app\src\Example\Application\QueryHandlers\Numbers\SumEvenQueryHandler;
use app\src\Example\Domain\Interfaces\SumEvenServiceInterface;
use app\src\Example\Domain\Queries\Numbers\SumEvenQuery;
use app\src\Example\Domain\ValueObjects\Numbers\Numbers;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class SumEvenQueryHandlerTest extends TestCase
{
    #[DataProvider('dataProvider')]
    public function testHandle(array $numbers, int $sum): void
    {
        $handler = $this->createHandler();

        $resultSum = ($handler)(query: SumEvenQuery::fromArray([SumEvenQuery::NUMBERS => $numbers]));

        $this->assertInstanceOf(SumEvenDTO::class, $resultSum);
        $this->assertEquals($sum, $resultSum->sum);
    }

    public static function dataProvider(): \Generator
    {
        yield "Without numbers" => [
            "numbers" => [],
            "sum" => 0
        ];
        yield "With 1, 3, 5, 7" => [
            "numbers" => [1, 3, 5, 7],
            "sum" => 0
        ];
        yield "With 1, 2, 3" => [
            "numbers" => [1, 2, 3,],
            "sum" => 2
        ];
        yield "With 1, 2, 3, 4, 5" => [
            "numbers" => [1, 2, 3, 4, 5],
            "sum" => 6
        ];
        yield "With 2, 2" => [
            "numbers" => [2, 2],
            "sum" => 4
        ];
    }

    public function createHandler(): SumEvenQueryHandler
    {
        $handler = new SumEvenQueryHandler(
            service: $this->serviceMock(),
        );

        $this->assertInstanceOf(SumEvenQueryHandler::class, $handler);

        return $handler;
    }

    /**
     * @throws Exception
     */
    private function serviceMock(): SumEvenServiceInterface&MockObject
    {
        $serviceMock = $this->createMock(SumEvenServiceInterface::class);

        $serviceMock->method('__invoke')->willReturnCallback(
            fn(Numbers $numbers): int => array_sum(array_filter($numbers->numbers, fn($number) => $number % 2 === 0))
        );

        return $serviceMock;
    }
}
