<?php
/**
 * User: alec
 * Date: 28.12.18
 * Time: 15:39
 */
declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\DoesProcessException;
use PHPUnit\Framework\TestCase;

class HasTraitDoesProcessException
{
    use DoesProcessException;

    /**
     * @throws \Throwable
     */
    public function process(): void
    {
        try {
            throw new \Exception('Simulated');
        } catch (\Throwable $e) {
            $this->processException($e);
        }
    }
}

class DoesProcessExceptionTest extends TestCase
{
    /** @test */
    public function _processDoesNotThrow(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->doNotThrowOnError();
        $this->assertFalse($o->doesThrowsOnError());
        $o->process();
        $this->assertTrue(true);
    }

    /** @test */
    public function _processThrows(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->throwOnError();
        $this->assertTrue($o->doesThrowsOnError());
        $this->expectException(\Exception::class);
        $o->process();
    }

}