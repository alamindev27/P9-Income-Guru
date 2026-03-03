<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | email | unique:users,email,' . $user->id . ',id',
            'avatar' => 'nullable | image | mimes:jpg,png,jpeg,webp,svg'
        ]);

        if ($request->hasFile('avatar')) {
            $arr = explode('/', $user->avatar);
            $oldImg = end($arr);
            if ($oldImg != 'avatar.svg') {
                unlink(public_path($user->avatar));
            }
            $file = $request->file('avatar');
            $fileName = time().rand(00000,99999).'.'.$file->getClientOriginalExtension();
            $path = 'uploads/avatar/';
            $request->avatar->move($path, $fileName);

            $user->update([
                'avatar' => $path.$fileName
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back()->with('success', 'Updated Successfully');
    }
}
