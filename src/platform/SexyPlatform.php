<?php

namespace game\report\platform;

use game\report\PlatformInterface;

class SexyPlatform implements PlatformInterface
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
        return "sum(betAmount)";
    }

    public function getSumWinOrder(): string
    {
        // 實現返回字串的邏輯
        return "sum(winAmount-betAmount)";
    }

    public function getExcludingCanceled(): string
    {
        // 實現返回字串的邏輯
        return "updateAction in ('settle', 'resettle')";
    }

    public function getDatetimeName(): string
    {
        // 實現返回字串的邏輯
        return 'txTime';
    }

    public function getDatetimeTimezone(): string
    {
        // 實現返回字串的邏輯
        return '8';
    }

    public function getUnixtimeName(): string
    {
        // 實現返回字串的邏輯
        return 'txTimeUnix';
    }

    public function getRoundName(): string
    {
        // 實現返回字串的邏輯
        return 'roundId';
    }

    public function getOrderName(): string
    {
        // 實現返回字串的邏輯
        return 'platformTxId';
    }
}
