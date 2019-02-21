<?php declare(strict_types=1);


namespace AlecRabbit\Tests\Traits;

class HasTraitDoesProcessException
{
    use DoesProcessExceptionForTests;

    /** @var string */
    public $output = '';
    public $exceptionClass = \Exception::class;
    public $exceptionMessage = 'Simulated';

    /**
     * @throws \Throwable
     */
    public function process(): void
    {
        try {
            throw new \Exception($this->exceptionMessage);
        } catch (\Throwable $e) {
            $this->processException($e);
        }
    }

    protected function dump(...$that): void
    {
        foreach ($that as $var) {
            if (\is_string($var)) {
                $this->output .= var_export($var, true);
            }
        }
    }
}
