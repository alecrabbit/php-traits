<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Core;

use AlecRabbit\Traits\ForReports\Contracts\ReportableInterface;
use AlecRabbit\Traits\ForReports\Reportable;

abstract class CanReport implements ReportableInterface
{
    use Reportable;
}
