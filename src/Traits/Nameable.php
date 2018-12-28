<?php
/**
 * User: alec
 * Date: 19.11.18
 * Time: 19:52
 */
declare(strict_types=1);

namespace AlecRabbit\Traits;

trait Nameable
{
    use GettableName;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
