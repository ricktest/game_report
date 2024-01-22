<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class Cq9Platform implements PlatformInterface
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
        return "CASE 
        WHEN gamecode NOT IN ('AT01','AT05') THEN
            SUM(
                 CASE
                 WHEN `iaction` in ('bet','Rollout','takeall') THEN amount 
                 ELSE 0 
                 END
                )
            -SUM(
                 CASE
                 WHEN `iaction` = 'refund' THEN amount
                 ELSE 0
                 END
                 )
        ELSE SUM(bet)-SUM(win)
        END";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(CASE WHEN `iaction` in ('endround','rollin') THEN amount ELSE 0 END)- SUM(CASE WHEN `iaction` in ('bet','Rollout','takeall') THEN amount ELSE 0 END)- SUM(CASE WHEN `iaction` = 'refund' THEN amount ELSE 0 END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "";
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
        return 'iat';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'roundid';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'mtcode';
    }
}
