<?php declare(strict_types=1);

namespace AlecRabbit\Traits;

use const \AlecRabbit\Traits\Constants\DEFAULT_NAME;

trait DefaultableName
{
    /**
     * @param string|null $name
     * @return string
     */
    public function defaultName(?string $name = null): string
    {
        return $name ?? DEFAULT_NAME;
    }
}
