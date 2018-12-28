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

    /**
     * @param \Throwable $e
     * @throws \Throwable
     */
    protected function processException(\Throwable $e): void
    {
        if ($this->throwOnError) {
            throw $e;
        }
        $hasDumpFunction = \function_exists('dump');
        if (\defined('APP_DEBUG') && APP_DEBUG) {
            if (\defined('DEBUG_DUMP_EXCEPTION') && DEBUG_DUMP_EXCEPTION) {
                $exceptionMessage = '[' . \get_class($e) . '] ' . $e->getMessage();
                if ($hasDumpFunction) {
                    dump($exceptionMessage, $e->getTraceAsString());
                } else {
                    // @codeCoverageIgnoreStart
                    var_dump($exceptionMessage, $e->getTraceAsString());
                    // @codeCoverageIgnoreEnd
                }
            }
            if (\defined('DEBUG_DUMP_EXCEPTION_CLASS') && DEBUG_DUMP_EXCEPTION_CLASS) {
                if ($hasDumpFunction) {
                    dump($e);
                } else {
                    // @codeCoverageIgnoreStart
                    var_dump($e);
                    // @codeCoverageIgnoreEnd
                }
            }
        }
    }

    public function doesThrowsOnError(): bool
    {
        return $this->throwOnError;
    }
}
