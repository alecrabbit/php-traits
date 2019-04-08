<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use PHPUnit\Framework\TestCase;

class DoesProcessExceptionTest extends TestCase
{
    /** @test */
    public function processDoesNotThrow(): void
    {
        $o = new HasTraitDoesProcessException();
        $o
            ->doNotThrowOnError()
            ->setDumpTrace(true);
        $this->assertFalse($o->doesThrowsOnError());
        $this->assertTrue($o->doesDumpTrace());
        $o->process();
        $this->assertStringContainsString($o->exceptionMessage, $o->output);
        $this->assertStringContainsString($o->exceptionClass, $o->output);
        $this->assertStringContainsString(
            str_replace('\\', '\\\\', HasTraitDoesProcessException::class),
            $o->output
        );
    }

    /** @test */
    public function processThrows(): void
    {
        $o = new HasTraitDoesProcessException();
        $o->throwOnError();
        $o->setDumpTrace(false);
        $this->assertFalse($o->doesDumpTrace());
        $this->assertTrue($o->doesThrowsOnError());
        $this->expectException($o->exceptionClass);
        $o->process();
    }
}
