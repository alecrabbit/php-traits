<?php declare(strict_types=1);

namespace AlecRabbit\Tests\Traits;

use AlecRabbit\Traits\ForReports\Contracts\ReportableInterface;
use AlecRabbit\Traits\ForReports\Contracts\ReportInterface;

class ExtendsReportableReport implements ReportInterface
{
    public const REPORT_HAS_BEEN_BUILT = 'Report has been built';

    /** @var string */
    protected $data;

    public function __toString(): string
    {
        return $this->data;
    }

    public function buildOn(ReportableInterface $reportable): ReportInterface
    {
        $this->data = self::REPORT_HAS_BEEN_BUILT;
        return $this;
    }
}
