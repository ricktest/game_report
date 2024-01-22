<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class XgPlatform implements PlatformInterface
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
        return "SUM(-bet_amount)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(bet_amount+win_amount)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "operation_new_code =2";
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
        return 'settle_time_unix';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'bet_form_id';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'transaction_id';
    }
}
