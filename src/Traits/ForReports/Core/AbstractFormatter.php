<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Core;

use AlecRabbit\Traits\ForReports\Contracts\FormatterInterface;

abstract class AbstractFormatter implements FormatterInterface
{
    /** @var int */
    protected $options = 0;

    /** {@inheritDoc} */
    public function __construct(?int $options = null)
    {
        $this->options = $options ?? 0;
    }

    abstract public function process(Formattable $data): string;

    /**
     * @param Formattable $data
     * @param string $class
     * @return \Throwable
     */
    protected function preparedException(Formattable $data, string $class): \Throwable
    {
        return
            new \InvalidArgumentException($class . ' expected, ' . get_class($data) . ' given');
    }
}
