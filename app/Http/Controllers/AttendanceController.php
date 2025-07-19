<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Inertia\Inertia;
use App\Models\Notice;
use App\Notifications\TelegramNotif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    //
    use Notifiable;
    // public function index() {
    //     return Inertia::render('Scanned');
    // }
    public function detect() {
        if (!Auth::check()) {
            return redirect()->route("login");
        }
        
        $user = Auth::user();
        $batas = Carbon::createFromTimeString('08:00:00');
        $tepat = '';
        $status = ['On-Time', 'Late'];
        $late = 0;

        if (Carbon::now()->gt($batas)) {
            $tepat = '(Late)';
            $late = 1;

        } else {
            $tepat = '(On-Time)';
            $late = 0;
        }
        
        
        
        $attendance = Attendance::create([
            'name' => $user->name,
            "waktu_scan" => Carbon::now(),
            "status" => $status[$late],
        ]);
        
        if (Carbon::now()->diffInMinutes($batas) < -30) {
            $notice = new Notice([
                'id' => Uuid::uuid4()->toString(),
                'notice' => $user->name . " " . $tepat,
                'noticedes' => Carbon::now(),
                'noticelink' => 'https://youtube.com',
                'telegramid' => Config::get('services.telegram_id'),
            ]);
            $notice->save();
            $notice->notify(new TelegramNotif());
        }

        return Inertia::render('Scanned');   
    }
}
