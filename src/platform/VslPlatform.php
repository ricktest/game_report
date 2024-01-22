<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class VslPlatform implements PlatformInterface
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
        return "sum(case when transType = '500' then amt when transType = '502' then -amt ELSE 0 END)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "sum(case when transType IN (510,501,502,503) then amt ELSE -amt END)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "WLstatus != 'Cancel Bet'";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'datetime';
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
        return 'cwTransId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'requestId';
    }
}
