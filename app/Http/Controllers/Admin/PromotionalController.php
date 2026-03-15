<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Promotion::findOrFail($id);
        return view('admin.promotional.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'heading_top' => 'required',
            'heading_bottom' => 'required',
            'animated_text' => 'required',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $data = Promotion::findOrFail($id);
        $data->heading_top = $request->heading_top;
        $data->heading_bottom = $request->heading_bottom;
        $data->animated_text = $request->animated_text;

        if ($request->hasFile('banner')) {

            $arr = explode('.', $data->banner);
            $oldImage = end($arr);

            if ($oldImage != 'default-promotional.jpg') {
                if (file_exists(public_path($data->banner))) {
                    unlink(public_path($data->banner));
                }
            }

            $file = $request->file('banner');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/promotional'), $filename);
            $data->banner = 'uploads/promotional/' . $filename;
        }

        $data->save();
        return redirect()->back()->with('success', 'Promotional updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
