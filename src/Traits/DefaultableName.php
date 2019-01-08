<?php
/**
 * User: alec
 * Date: 01.12.18
 * Time: 22:17
 */

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
