<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\ForReports\Contracts\ReportInterface;
use AlecRabbit\Traits\ForReports\Core\Reportable;

class ExtendsReportable extends Reportable
{
    protected function createEmptyReport(): ReportInterface
    {
        return new ExtendsReportableReport();
    }
}
