<?php

declare(strict_types=1);

namespace app\src\Shared\Lib\Assertion;

use app\src\Shared\Domain\Exceptions\InvalidArgumentException;

final class Assert extends \Webmozart\Assert\Assert
{
    /**
     * @param string $message
     */
    protected static function reportInvalidArgument($message): void
    {
        throw new InvalidArgumentException($message);
    }
}
