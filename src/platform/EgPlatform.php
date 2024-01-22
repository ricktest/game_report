<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class EgPlatform implements PlatformInterface
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
        return "sum(bet)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return 'sum(netWin)';
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return 'action!="cancelBet"';
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'modifyDate';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'timestamp';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'mainTxID';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'subTxID';
    }
}
