<?php declare(strict_types=1);


namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\DoesProcessException;

trait DoesProcessExceptionForTests
{
    use DoesProcessException;

    /**
     * @param mixed ...$that
     */
    protected function dump(...$that): void
    {
        // Intentionally left blank
    }
}
