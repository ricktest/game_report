<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class V8Platform implements PlatformInterface
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
        return "";
    }

    public function getSumBetOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN type = '1002' THEN amount ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN type = '1003' THEN amount ELSE 0 END) - SUM(CASE WHEN type = '1002' THEN amount ELSE 0 END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "STATUS = 0";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'create_date';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'create_unix';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'game_no';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'order_id';
    }
}
