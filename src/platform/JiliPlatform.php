<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class JiliPlatform implements PlatformInterface
{
    public function getUseBuffer(): int
    {
        // 實現返回整數的邏輯
        return 0;
    }

    public function getUidName(): string
    {
        // 實現返回字串的邏輯
        return 'memId';
    }

    public function getPrimaryKey(): string
    {
        // 實現返回整數的邏輯
        return 'uid';
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
        return "SUM(betAmount)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return 'SUM(netWin)';
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return '`transaction_status` != "cancel"';
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'endTime';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'endTime_Unixt';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'sessionId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'round';
    }
}
