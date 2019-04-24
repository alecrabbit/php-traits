<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Core;

use AlecRabbit\Traits\ForReports\Contracts\ReportableInterface;
use AlecRabbit\Traits\ForReports\HasReport;

abstract class Reportable implements ReportableInterface
{
    use HasReport;
}
