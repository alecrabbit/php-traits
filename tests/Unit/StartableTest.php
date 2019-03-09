<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use PHPUnit\Framework\TestCase;

class StartableTest extends TestCase
{
    /** @var HasTraitNameable */
    private $obj;

    /** @test */
    public function check(): void
    {
        $this->assertFalse($this->obj->isStarted());
        $this->assertTrue($this->obj->isNotStarted());
        $this->obj->start();
        $this->assertTrue($this->obj->isStarted());
        $this->assertFalse($this->obj->isNotStarted());
    }

    protected function setUp()
    {
        $this->obj = new HasTraitStartable();
    }
}
