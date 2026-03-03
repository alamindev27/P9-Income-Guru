<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.app-setting.index');
    }
    public function edit()
    {
        return view('admin.setting.app-setting.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'site_name'   => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg',
            'favicon'     => 'nullable|image|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $setting = Setting::firstOrCreate(['id' => 1]);
        $path = public_path('uploads/setting/');

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        foreach (['logo' => 'logo.png', 'favicon' => 'favicon.png'] as $field => $default) {

            if ($request->hasFile($field)) {

                if (
                    $setting->$field &&
                    file_exists(public_path($setting->$field)) &&
                    basename($setting->$field) !== $default
                ) {
                    unlink(public_path($setting->$field));
                }

                $file = $request->file($field);
                $fileName = time() . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $fileName);

                $setting->{$field} = 'uploads/setting/' . $fileName;
            }
        }

        $setting->site_name = $request->site_name;
        $setting->author_name = $request->author_name;
        $setting->save();

        return back()->with('success', 'Updated successfully');
    }
}
