<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use PHPUnit\Framework\TestCase;

class StaticOnlyTest extends TestCase
{
    /** @test */
    public function check(): void
    {
        $this->expectException(\Error::class);
        new HasTraitStaticOnly();
    }
}
