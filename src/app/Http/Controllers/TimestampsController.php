<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Timestamp;

class TimestampsController extends Controller
{
    //打刻画面（ホーム画面）
    //出勤打刻あるなしで判断させてみる？
    public function home()
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $user_id = Auth::user()->id;
        $confirm_date = Work::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        if (!$confirm_date) {
            $status = 0;
        } else {
            $status = Auth::user()->status;
        }
        return view('attendance', compact('status'));
    }


    //出勤時間
    public function punchIn()
    {
        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい
         * DB
         */

        $data = 'punchIn'->exists();

        $oldTimestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestampPunchIn = new Carbon($oldTimestamp->punchIn);
            $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
        }

        $newTimestampDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        // if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))) {
        //     return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        // }

        $timestamp = Timestamp::create([
            'user_id' => $user->id,
            'punchIn' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    //退勤時間
    public function punchOut()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        // if (!empty($timestamp->punchOut)) {
        //     return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        // }

        $timestamp->update([
            'punchOut' => Carbon::now()
        ]);

        // return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }

    //休憩開始
    public function breakIn()
    {
        $user = Auth::user();

        // $oldtimein = Time::where('user_id', $user->id)->latest()->first();
        // if ($oldtimein->punchIn && !$oldtimein->punchOut && !$oldtimein->breakIn) {
        //     $oldtimein->update([
        //         'breakIn' => Carbon::now(),
        //     ]);
        //     return redirect()->back();
        // }
        // return redirect()->back();
    }

    //休憩終了
    public function breakOut()
    {
        $user = Auth::user();

        // $oldtimein = Time::where('user_id', $user->id)->latest()->first();
        // if ($oldtimein->breakIn && !$oldtimein->breakOut) {
        //     $oldtimein->update([
        //         'breakOut' => Carbon::now(),
        //     ]);
        //     return redirect()->back();
        // }
        // return redirect()->back();
    }
}
