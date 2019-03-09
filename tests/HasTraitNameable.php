<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\Nameable;

class HasTraitNameable
{
    use Nameable;

    /**
     * TraitsTesting constructor.
     * @param null $name
     */
    public function __construct($name = null)
    {
        $this->name = $this->defaultName($name);
    }
}
