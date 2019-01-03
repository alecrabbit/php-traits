<?php
/**
 * User: alec
 * Date: 04.12.18
 * Time: 0:02
 */

namespace AlecRabbit\Tests\Unit;


use const AlecRabbit\Constants\Traits\DEFAULT_NAME;
use AlecRabbit\Traits\Nameable;
use PHPUnit\Framework\TestCase;

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

class NameableTest extends TestCase
{
    /** @var HasTraitNameable */
    private $obj;

    protected function setUp()
    {
        $this->obj = new HasTraitNameable();
    }

    /** @test */
    public function check(): void
    {
        $this->assertEquals(DEFAULT_NAME, $this->obj->getName());
        $this->assertInstanceOf(HasTraitNameable::class, $this->obj->setName('new'));
        $this->assertEquals('new', $this->obj->getName());
    }

}