<?php

namespace game\report;

use game\report\PlatformInterface;

class PgPlatform implements PlatformInterface
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
        return "SUM(bet_amount)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return 'SUM(win_amount)-SUM(bet_amount)';
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'ts_tf';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'parent_bet_id';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'bet_id';
    }
}
