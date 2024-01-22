<?php

namespace game\report;

interface PlatformInterface
{
    public function getUseBuffer(): int;
    public function getUidName(): string;
    public function getPrimaryKey(): string;
    public function getBetLogName($currency, $platform): string;
    public function getReportName($currency, $platform): string;
    public function getSumBetOrder(): string;
    public function getSumWinOrder(): string;
    public function getExcludingCanceled(): string;
    public function getDatetimeName(): string;
    public function getDatetimeTimezone(): string;
    public function getUnixtimeName(): string;
    public function getRoundName(): string;
    public function getOrderName(): string;
}
