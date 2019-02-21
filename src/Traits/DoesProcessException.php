<?php
/**
 * User: alec
 * Date: 28.12.18
 * Time: 15:21
 */

namespace AlecRabbit\Traits;

trait DoesProcessException
{
    /** @var bool */
    protected $throwOnError = true;

    /** @var bool */
    protected $dumpTrace = true;

    /** @return self */
    public function doNotThrowOnError(): self
    {
        $this->throwOnError = false;
        return $this;
    }

    /** @return self */
    public function throwOnError(): self
    {
        $this->throwOnError = true;
        return $this;
    }

    /** @return bool */
    public function doesThrowsOnError(): bool
    {
        return $this->throwOnError;
    }

    /**
     * @param bool $dumpTrace
     * @return self
     */
    public function setDumpTrace(bool $dumpTrace): self
    {
        $this->dumpTrace = $dumpTrace;
        return $this;
    }

    /**
     * @param \Throwable $e
     * @throws \Throwable
     */
    protected function processException(\Throwable $e): void
    {
        $this->debugException($e);
        if ($this->throwOnError) {
            throw $e;
        }
    }

    /**
     * @param \Throwable $e
     */
    protected function debugException(\Throwable $e): void
    {
        if (\defined('APP_DEBUG') && APP_DEBUG) {
            $this->dumpExceptionMessage($e);
            if ($this->doesDumpTrace()) {
                $this->dumpExceptionTrace($e);
            }
            $this->dumpExceptionObject($e);
        }
    }

    /**
     * @param \Throwable $e
     */
    protected function dumpExceptionMessage(\Throwable $e): void
    {
        if (\defined('DEBUG_DUMP_EXCEPTION') && DEBUG_DUMP_EXCEPTION) {
            $this->dump('[' . \get_class($e) . '] ' . $e->getMessage());
        }
    }

    /**
     * @param mixed ...$that
     */
    protected function dump(...$that): void // @codeCoverageIgnoreStart
    {
        if (\function_exists('dump')) {
            dump(...$that);
        } else {
            var_dump(...$that);
        }
    }  // @codeCoverageIgnoreEnd


    /**
     * @return bool
     */
    public function doesDumpTrace(): bool
    {
        return $this->dumpTrace;
    }

    /**
     * @param \Throwable $e
     */
    protected function dumpExceptionTrace(\Throwable $e): void
    {
        if (\defined('DEBUG_DUMP_EXCEPTION') && DEBUG_DUMP_EXCEPTION) {
            $this->dump($e->getTraceAsString());
        }
    }

    /**
     * @param \Throwable $e
     */
    protected function dumpExceptionObject(\Throwable $e): void
    {
        if (\defined('DEBUG_DUMP_EXCEPTION_CLASS') && DEBUG_DUMP_EXCEPTION_CLASS) {
            $this->dump($e);
        }
    }
}
