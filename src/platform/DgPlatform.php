<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class DgPlatform implements PlatformInterface
{
    public function getUseBuffer(): int
    {
        // 實現返回整數的邏輯
        return 0;
    }

    public function getUidName(): string
    {
        // 實現返回字串的邏輯
        return 'uid';
    }

    public function getPrimaryKey(): string
    {
        // 實現返回整數的邏輯
        return 'id';
    }

    public function getBetLogName($currency, $platform): string
    {
        // 實現返回字串的邏輯
        return $currency . '_' . $platform . '_bet_log';
    }

    public function getReportName($currency, $platform): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getSumBetOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(case when iaction = 1 then -amount when iaction = 3 then amount ELSE 0 END )";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(case when iaction = 1 then amount when iaction IN (2, 3) then amount ELSE 0 END )";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "iaction != '3'";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'createDate';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'ticketId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'data';
    }
}
