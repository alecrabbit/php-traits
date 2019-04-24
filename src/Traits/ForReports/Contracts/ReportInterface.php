<?php declare(strict_types=1);

namespace AlecRabbit\Traits\ForReports\Contracts;

interface ReportInterface
{
    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @param ReportableInterface $reportable
     * @return ReportInterface
     */
    public function buildOn(ReportableInterface $reportable): ReportInterface;
}
