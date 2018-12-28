<?php
/**
 * User: alec
 * Date: 28.12.18
 * Time: 15:39
 */
declare(strict_types=1);

namespace Tests\Unit;

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
    public function _processThrows(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->doNotThrowOnError();
        $o->process();
        $this->assertTrue(true);
    }

    /** @test */
    public function _processNotThrows(): void
    {
        $o = new HasTraitDoesProcessException();
        $this->expectException(\Exception::class);
        $o->process();
    }

}