<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
}
