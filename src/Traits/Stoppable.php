<?php declare(strict_types=1);


namespace AlecRabbit\Traits;

trait Stoppable
{
    /** @var bool */
    protected $stopped = false;

    /**
     * @return bool
     */
    public function isStopped(): bool
    {
        return $this->stopped;
    }

    /**
     * @return bool
     */
    public function isNotStopped(): bool
    {
        return !$this->stopped;
    }

    public function stop(): void
    {
        $this->stopped = true;
    }
}
