<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Inertia\Inertia;
use App\Models\Notice;
use App\Notifications\TelegramNotif;
use Illuminate\Support\Facades\Config;
use Ramsey\Uuid\Uuid;

class AttendanceController extends Controller
{
    //
    use Notifiable;
    // public function index() {
    //     return Inertia::render('Scanned');
    // }
    public function detect() {
        $notice = new Notice([
            'id' => Uuid::uuid4()->toString(),
            'notice' => 'Absen',
            'noticedes' => 'Hello',
            'noticelink' => 'https://youtube.com',
            'telegramid' => Config::get('services.telegram_id'),
        ]);

        $notice->save();
        $notice->notify(new TelegramNotif());

        return Inertia::render('Scanned');   
    }
}
