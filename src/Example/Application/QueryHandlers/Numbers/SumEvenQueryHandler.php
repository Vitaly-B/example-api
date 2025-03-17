<?php

declare(strict_types=1);

namespace app\src\Example\Application\QueryHandlers\Numbers;

use app\src\Example\Application\DTO\Numbers\SumEvenDTO;
use app\src\Example\Domain\Interfaces\SumEvenServiceInterface;
use app\src\Example\Domain\Queries\Numbers\SumEvenQuery;
use app\src\Example\Domain\ValueObjects\Numbers\Numbers;

final readonly class SumEvenQueryHandler
{
    public function __construct(private SumEvenServiceInterface $service)
    {
    }

    public function __invoke(SumEvenQuery $query): SumEvenDTO
    {
        return new SumEvenDTO(($this->service)(numbers: new Numbers(...$query->numbers)));
    }
}
