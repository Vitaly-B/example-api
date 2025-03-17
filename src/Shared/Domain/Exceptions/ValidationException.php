<?php

declare(strict_types=1);

namespace app\src\Shared\Domain\Exceptions;

use Throwable;

final class ValidationException extends InvalidArgumentException
{
    public function __construct(
        public readonly array $errors,
        string $message = "An validation error occurred.",
        int $code = 422,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
