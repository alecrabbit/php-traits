<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Contracts;

use AlecRabbit\Traits\ForReports\Core\Formattable;

interface FormatterInterface
{
    /**
     * @param int|null $options
     */
    public function __construct(?int $options = null);

    public function process(Formattable $data): string;
}
