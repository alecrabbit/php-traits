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
            if (\defined('DEBUG_DUMP_EXCEPTION') && DEBUG_DUMP_EXCEPTION) {
                $exceptionMessage = '[' . \get_class($e) . '] ' . $e->getMessage();
                $this->dump($exceptionMessage, $e->getTraceAsString());
            }
            if (\defined('DEBUG_DUMP_EXCEPTION_CLASS') && DEBUG_DUMP_EXCEPTION_CLASS) {
                $this->dump($e);
            }
        }
    }

    /**
     * @param mixed ...$that
     */
    protected function dump(...$that): void
    {
        if (\function_exists('dump')) {
            dump(...$that);
        } else {
            // @codeCoverageIgnoreStart
            var_dump(...$that);
            // @codeCoverageIgnoreEnd
        }
    }
}
