<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class PngPlatform implements PlatformInterface
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
        return "SUM(TotalLoss)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "SUM(winOrLoss)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return " action='release' AND NumRounds!=''";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'betTime';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'betTimeUnix';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'GamesessionId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'transactionId';
    }
}
