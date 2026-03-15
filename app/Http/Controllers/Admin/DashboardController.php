<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use App\Models\Setting;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPromos = Promo::count();
        $totalVideos = Video::count();

        return view('admin.dashboard', compact('totalPromos', 'totalVideos'));
    }

    public function editVoice()
    {
        return view('admin.setting.edit-voice');
    }



    public function updateVoice(Request $request)
    {
        $request->validate([
            'voice' => 'required|file|mimes:mp3,wav,ogg,aac,m4a,flac,wma', // 20MB max
        ], [
            'voice.mimes' => 'Only audio files are allowed (mp3, wav, ogg, aac, m4a, flac, wma).',
            'voice.required' => 'Please upload a voice file.',
        ]);

        if ($request->hasFile('voice')) {
            $arr = explode('/', setting()->voice);
            $oldImg = end($arr);
            if ($oldImg != 'default-voice.mp3') {
                if (file_exists(setting()->voice)) {
                    unlink(public_path(setting()->voice));
                }
            }
            $file = $request->file('voice');
            $fileName = time() . rand(00000, 99999) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/voice/';
            $request->voice->move($path, $fileName);

            Setting::find(1)->update([
                'voice' => $path . $fileName
            ]);
        }

        return redirect()->route('admin.voice.edit')->with('success', 'Voice updated successfully.');
    }

    public function editMemberAndWinning()
    {
        return view('admin.setting.edit-member-winning');
    }

    public function updateMemberAndWinning(Request $request)
    {
        $request->validate([
            'total_members' => 'required|integer|min:0',
            'winning_amount' => 'required|numeric|min:0',
        ]);

        Setting::find(1)->update([
            'total_members' => $request->total_members,
            'total_won' => $request->winning_amount,
        ]);

        return redirect()->route('admin.member.Winning.edit')->with('success', 'Member and winning amount updated successfully.');
    }

    public function editTimer()
    {
        return view('admin.setting.edit-timer');
    }

    public function updateTimer(Request $request)
    {
        $request->validate([
            'hours' => 'required|integer|min:0',
            'minutes' => 'required|integer|min:0',
            'seconds' => 'required|integer|min:0',
        ]);

        Setting::find(1)->update([
            'timer' => [
                'hours' => $request->hours,
                'minutes' => $request->minutes,
                'seconds' => $request->seconds,
            ],
        ]);

        return redirect()->route('admin.timer.edit')->with('success', 'Timer updated successfully.');
    }
}
