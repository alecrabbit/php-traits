<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use PHPUnit\Framework\TestCase;

class StartableAndStoppableTest extends TestCase
{
    /** @var HasTraitStartableAndStoppable */
    private $obj;

    /** @test */
    public function check(): void
    {
        $this->assertFalse($this->obj->isStarted());
        $this->assertTrue($this->obj->isNotStarted());
        $this->obj->start();
        $this->assertTrue($this->obj->isStarted());
        $this->assertFalse($this->obj->isNotStarted());


        $this->assertFalse($this->obj->isStopped());
        $this->assertTrue($this->obj->isNotStopped());
        $this->obj->stop();
        $this->assertTrue($this->obj->isStopped());
        $this->assertFalse($this->obj->isNotStopped());
    }

    protected function setUp(): void
    {
        $this->obj = new HasTraitStartableAndStoppable();
    }
}
