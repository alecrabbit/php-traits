<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports;

use AlecRabbit\Traits\ForReports\Contracts\ReportInterface;

trait Reportable
{
    /** @var ReportInterface */
    protected $report;

    /**
     * @param bool $rebuild Rebuild report object
     * @return ReportInterface
     */
    public function report(bool $rebuild = true): ReportInterface
    {
        if (true === $rebuild) {
            $this->meetConditions();
            $this->beforeReport();
            /** @noinspection PhpParamsInspection */
            $this->report->buildOn($this);
        }
        return
            $this->report;
    }

    /**
     * Checks if all conditions needed for report are met
     */
    protected function meetConditions(): void
    {
    }

    /**
     * Makes all necessary actions before report
     */
    protected function beforeReport(): void
    {
    }
}
