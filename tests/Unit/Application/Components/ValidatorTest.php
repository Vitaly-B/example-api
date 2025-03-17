<?php

declare(strict_types=1);

namespace Unit\Application\Components;

use app\src\Application\Components\Validator;
use app\src\Shared\Domain\Exceptions\ValidationException;
use app\src\Shared\Domain\Interfaces\Validation\ConstraintsInterface;
use app\src\Shared\Domain\Interfaces\Validation\ValidatorInterface;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testObjectCreation(): Validator
    {
        $validator = new Validator();

        $this->assertInstanceOf(ValidatorInterface::class, $validator);
        $this->assertInstanceOf(Validator::class, $validator);

        return $validator;
    }

    #[Depends('testObjectCreation')]
    public function testInvalid(ValidatorInterface $validator): void
    {
        $this->expectException(ValidationException::class);

        $validator->validate([],
            new class() implements ConstraintsInterface {
                public function getErrors(array $data): ?array
                {
                    return [
                        "property" => ["error1", "error2"],
                    ];
                }
            });
    }

    #[Depends('testObjectCreation')]
    public function testValid(ValidatorInterface $validator): void
    {
        $validator->validate([],
            new class() implements ConstraintsInterface {
                public function getErrors(array $data): ?array
                {
                    return null;
                }
            });

        $this->assertTrue(true);
    }
}
