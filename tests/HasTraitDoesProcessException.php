<?php declare(strict_types=1);


namespace AlecRabbit\Tests\Traits;

class HasTraitDoesProcessException
{
    use DoesProcessExceptionForTests;

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

