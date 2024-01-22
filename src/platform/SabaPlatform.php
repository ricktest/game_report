<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class SabaPlatform implements PlatformInterface
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
        return "SUM(CASE  WHEN action = 'ConfirmBet' OR action = 'ConfirmBetParlay' THEN COALESCE(actualAmount, 0) ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN action IN ('settle', 'resettle', 'unsettle') THEN COALESCE(creditAmount - debitAmount, 0) WHEN action IN ('ConfirmBet', 'ConfirmBetParlay') THEN COALESCE(-actualAmount, 0) ELSE 0 END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return 'winlostDate IS not NULL';
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
        return 'winlostDateTs';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'txId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'licenseeTxId';
    }
}
