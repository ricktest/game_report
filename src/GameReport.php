<?php

namespace game\report;

use Illuminate\Support\Facades\DB;

class GameReport
{
    private $currency;
    private $platform;
    private $memberInfoIUid;
    private $memberInfoMemId;
    private $sDate;
    private $eDate;
    private $limit;
    private $page;

    public function __construct($currency, $platform, $memberInfoIUid, $memberInfoMemId, $sDate, $eDate, $limit = 20, $page = 1)
    {
        $this->currency = $currency;
        $this->platform = $platform;
        $this->memberInfoIUid = $memberInfoIUid;
        $this->memberInfoMemId = $memberInfoMemId;
        $this->sDate = $sDate;
        $this->eDate = $eDate;
        $this->limit = $limit;
        $this->page = $page;
    }

    public function getSqlField(PlatformInterface $PlatformInterface)
    {
        return (object)[
            'platform' => $this->platform,
            'use_buffer' => $PlatformInterface->getUseBuffer(),
            'uid_name' => $PlatformInterface->getUidName(),
            'primary_key' => $PlatformInterface->getPrimaryKey(),
            'bet_log_name' => $PlatformInterface->getBetLogName($this->currency, $this->platform),
            'report_name' => $PlatformInterface->getReportName($this->currency, $this->platform),
            'sum_bet_order' => $PlatformInterface->getSumBetOrder(),
            'sum_win_order' => $PlatformInterface->getSumWinOrder(),
            'excluding_canceled' => $PlatformInterface->getExcludingCanceled(),
            'Datetime_name' => $PlatformInterface->getDatetimeName(),
            'Datetime_timezone' => $PlatformInterface->getDatetimeTimezone(),
            'Unixtime_name' => $PlatformInterface->getUnixtimeName(),
            'round_name' => $PlatformInterface->getRoundName(),
            'order_name' => $PlatformInterface->getOrderName(),
        ];
    }

    public function getSinglePlatformBetLog()
    {
        $query = $this->getBetLogQueryBuilder();
        $paginator =  $query->paginate($this->limit, ['*'], 'page', $this->page);
        $gameBetList = collect($paginator)->only(['current_page', 'last_page', 'data', 'from', 'to', 'total'])
            ->toArray();
        return $gameBetList;
    }

    public function getBetLogQueryBuilder()
    {
        $platform = $this->createPlatform();
        $platformInfo = $this->getSqlField($platform);

        if ($platformInfo->report_name !== '') {
            $m = DB::table($platformInfo->bet_log_name)
                ->select(DB::raw("MAX($platformInfo->bet_log_name.$platformInfo->primary_key), '$platformInfo->platform' as platform, '$this->memberInfoMemId' as memId, $platformInfo->round_name as round_id, $platformInfo->sum_bet_order as bet, $platformInfo->sum_win_order as net_win, FROM_UNIXTIME($platformInfo->Unixtime_name) as settle_time"))
                ->join($platformInfo->report_name, $platformInfo->report_name . '.' . $platformInfo->order_name, '=', $platformInfo->bet_log_name . '.' . $platformInfo->order_name)
                ->when($platformInfo->use_buffer == 1, function ($query) {
                    return $query->where('buffer_status', 'unlock');
                })
                ->where($platformInfo->uid_name, $this->memberInfoIUid)
                ->whereBetween($platformInfo->Unixtime_name, [strtotime($this->sDate), strtotime($this->eDate)])
                ->groupBy($platformInfo->round_name)
                ->orderBy($platformInfo->primary_key, 'desc');
        } else {
            if ($platformInfo->Datetime_name === '' and $platformInfo->Unixtime_name !== '') { //時間參數沒有datetime格式，但有unixtime
                $m = DB::table($platformInfo->bet_log_name)
                    ->select(DB::raw("MAX($platformInfo->bet_log_name.$platformInfo->primary_key), '$platformInfo->platform' as platform, '$this->memberInfoMemId' as memId, $platformInfo->round_name as round_id, $platformInfo->sum_bet_order as bet, $platformInfo->sum_win_order as net_win, FROM_UNIXTIME($platformInfo->Unixtime_name) as settle_time"))
                    ->when($platformInfo->excluding_canceled, function ($query) use ($platformInfo) {
                        return $query->whereRaw($platformInfo->excluding_canceled);
                    })
                    ->when($platformInfo->use_buffer == 1, function ($query) {
                        return $query->where('buffer_status', 'unlock');
                    })
                    ->where($platformInfo->uid_name, $this->memberInfoIUid)
                    ->whereBetween($platformInfo->Unixtime_name, [strtotime($this->sDate), strtotime($this->eDate)])
                    ->groupBy($platformInfo->round_name)
                    ->orderBy($platformInfo->primary_key, 'desc');
            } elseif ($platformInfo->Datetime_name !== '') { //時間參數有datetime格式
                $m = DB::table($platformInfo->bet_log_name)
                    ->select(DB::raw("MAX($platformInfo->bet_log_name.$platformInfo->primary_key), '$platformInfo->platform' as platform, '$this->memberInfoMemId' as memId, $platformInfo->round_name as round_id, $platformInfo->sum_bet_order as bet, $platformInfo->sum_win_order as net_win, $platformInfo->Datetime_name as settle_time"))
                    ->when($platformInfo->excluding_canceled, function ($query) use ($platformInfo) {
                        return $query->whereRaw($platformInfo->excluding_canceled);
                    })
                    ->when($platformInfo->use_buffer == 1, function ($query) {
                        return $query->where('buffer_status', 'unlock');
                    })
                    ->where($platformInfo->uid_name, $this->memberInfoIUid)
                    ->whereBetween($platformInfo->Datetime_name, [$this->sDate, $this->eDate])
                    ->groupBy($platformInfo->round_name)
                    ->orderBy($platformInfo->primary_key, 'desc');
            }
        }

        return $m;
    }

    public function createPlatform()
    {
        $platformClassName = 'game\\report\\' . ucfirst(strtolower($this->platform)) . 'Platform';
        return new $platformClassName;
    }
}
