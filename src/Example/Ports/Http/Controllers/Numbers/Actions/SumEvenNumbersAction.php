<?php

declare(strict_types=1);

namespace app\src\Example\Ports\Http\Controllers\Numbers\Actions;

use app\src\Application\Components\Request;
use app\src\Example\Application\QueryHandlers\Numbers\SumEvenQueryHandler;
use app\src\Example\Application\Validation\Numbers\NumbersConstraints;
use app\src\Example\Domain\Queries\Numbers\SumEvenQuery;
use app\src\Shared\Domain\Interfaces\Validation\ValidatorInterface;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\rest\Controller;

final class SumEvenNumbersAction extends Action
{
    public function __construct(
        string $id,
        Controller $controller,
        private readonly SumEvenQueryHandler $handler,
        private readonly ValidatorInterface $validator,
        array $config = [],
    ) {
        parent::__construct($id, $controller, $config);
    }

    /**
     * @throws InvalidConfigException
     */
    public function run(Request $request): array
    {
        $data = $request->getBodyParams();

        $this->validator->validate($data, new NumbersConstraints());

        return [
            'data' => ($this->handler)(query: SumEvenQuery::fromArray($data)),
        ];
    }
}
