<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class Ws168Platform implements PlatformInterface
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
        return "";
    }

    public function getSumBetOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN amount < 0 THEN -amount ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN amount >= 0 THEN amount ELSE 0 END)-SUM(CASE WHEN amount < 0 THEN -amount ELSE 0 END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "status != 'cancel'";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'settled_at';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'round_id';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'slug';
    }
}
