<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\ForReports\Core\AbstractFormatter;
use AlecRabbit\Traits\ForReports\Core\Formattable;

class ExtendsAbstractFormatter extends AbstractFormatter
{
    public const EXPECTED_CLASS_STUB = 'ExpectedClassStub';

    public function format(Formattable $data): string
    {
        return $this->errorMessage($data, self::EXPECTED_CLASS_STUB);
    }
}
