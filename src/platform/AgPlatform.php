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
        return "SUM(CASE WHEN Type = 'Bet' THEN Amount ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN Type = 'Settle' THEN Amount ELSE 0 END)-SUM(CASE WHEN Type = 'Bet' THEN Amount ELSE 0 END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "TransactionType IS NULL";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'TimeStamp';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'TimeStamp_Unix';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'RoundId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'TransactionId';
    }
}
