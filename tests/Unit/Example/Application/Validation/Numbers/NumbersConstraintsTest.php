<?php

declare(strict_types=1);

namespace Unit\Example\Application\Validation\Numbers;

use app\src\Example\Application\Validation\Numbers\NumbersConstraints;
use app\src\Shared\Domain\Interfaces\Validation\ConstraintsInterface;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;
use yii\base\InvalidConfigException;

final class NumbersConstraintsTest extends TestCase
{
    private const array VALID_DATA = [
        "numbers" => [1,2,3,],
    ];

    private const array INVALID_DATA = [
        "numbers" => [1.1,"a2",0.3,],
    ];

    public function testObjectCreation(): NumbersConstraints
    {
        $constraints = new NumbersConstraints();

        $this->assertInstanceOf(ConstraintsInterface::class, $constraints);
        $this->assertInstanceOf(NumbersConstraints::class, $constraints);

        return $constraints;
    }

    /**
     * @throws InvalidConfigException
     */
    #[Depends('testObjectCreation')]
    public function testValidData(NumbersConstraints $constraints): void
    {
        $errors = $constraints->getErrors(self::VALID_DATA);

        $this->assertNull($errors);
    }

    /**
     * @throws InvalidConfigException
     */
    #[Depends('testObjectCreation')]
    public function testInvalidData(NumbersConstraints $constraints): void
    {
        $errors = $constraints->getErrors(self::INVALID_DATA);

        $this->assertIsArray($errors);
        $this->assertSame(["numbers" => ["Numbers must be an integer."]], $errors);
    }
}