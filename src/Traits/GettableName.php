<?php
/**
 * User: alec
 * Date: 30.11.18
 * Time: 18:06
 */

namespace AlecRabbit\Traits;

trait GettableName
{
    use DefaultableName;

    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
