<?php
/**
 * User: alec
 * Date: 28.12.18
 * Time: 15:39
 */
declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use PHPUnit\Framework\TestCase;

class DoesProcessExceptionTest extends TestCase
{
    /** @test */
    public function processDoesNotThrow(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->doNotThrowOnError();
        $this->assertFalse($o->doesThrowsOnError());
        $o->process();
        $this->assertTrue(true);
    }

    /** @test */
    public function processThrows(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->throwOnError();
        $this->assertTrue($o->doesThrowsOnError());
        $this->expectException(\Exception::class);
        $o->process();
    }
}
