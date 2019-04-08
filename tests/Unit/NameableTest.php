<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use const AlecRabbit\Traits\Constants\DEFAULT_NAME;
use PHPUnit\Framework\TestCase;

class NameableTest extends TestCase
{
    /** @var HasTraitNameable */
    private $obj;

    protected function setUp(): void
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
