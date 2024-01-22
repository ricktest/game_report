<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class ImesportPlatform implements PlatformInterface
{
    public function getUseBuffer(): int
    {
        // 實現返回整數的邏輯
        return 1;
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
        return "SUM(CASE WHEN ActionId = '1003' THEN Amount when ActionId = '1005' THEN -Amount ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return 'SUM(CASE WHEN ActionId IN ("4002","4004","1005") THEN Amount WHEN ActionId in ("1003") THEN -Amount ELSE 0 END)';
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return 'TransactionType IS null';
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
        return 'BetId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'OperatorTransactionId';
    }
}
