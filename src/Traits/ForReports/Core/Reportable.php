<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Core;

use AlecRabbit\Traits\ForReports\Contracts\ReportableInterface;
use AlecRabbit\Traits\ForReports\Contracts\ReportInterface;

abstract class Reportable implements ReportableInterface
{
    /** @var ReportInterface */
    protected $report;

    /**
     * @param bool $rebuild Rebuild report object
     * @return ReportInterface
     */
    public function report(bool $rebuild = true): ReportInterface
    {
        $rebuild = $this->checkReport() || $rebuild;
        if (true === $rebuild) {
            $this->checkConditions();
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
    protected function checkConditions(): void
    {
    }

    /**
     * Makes all necessary actions before report
     */
    protected function beforeReport(): void
    {
    }

    abstract protected function createEmptyReport(): ReportInterface;

    /**
     * @return bool
     */
    protected function checkReport(): bool
    {
        if (null === $this->report) {
            $this->report = $this->createEmptyReport();
            return true;
        }
        return false;
    }
}
