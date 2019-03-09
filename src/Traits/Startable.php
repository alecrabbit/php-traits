<?php declare(strict_types=1);


namespace AlecRabbit\Traits;

trait Startable
{
    /** @var bool */
    protected $started = false;

    /**
     * @return bool
     */
    public function isStarted(): bool
    {
        return $this->started;
    }

    /**
     * @return bool
     */
    public function isNotStarted(): bool
    {
        return !$this->started;
    }

    public function start(): void
    {
        $this->started = true;
    }
}
