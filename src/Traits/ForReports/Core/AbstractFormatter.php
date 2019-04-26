<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Contracts;

use AlecRabbit\Traits\ForReports\Core\Formattable;

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
     */
    protected function assertData(Formattable $data, string $class): void
    {
        if (!$data instanceof $class) {
            throw new \InvalidArgumentException($class . ' expected, ' . get_class($data) . ' given');
        }
    }
}
