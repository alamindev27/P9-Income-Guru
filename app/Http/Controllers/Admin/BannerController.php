<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::first();
        return view('admin.banner.index', compact('data'));
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
        $data = Banner::find($id);
        return view('admin.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'heading_1' => 'required|string|max:255',
            'heading_2' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {

            $currentImage = $banner->image;

            // default image hole delete korbe na
            if ($currentImage !== '/default/hero-bg.jpg' && file_exists(public_path($currentImage))) {
                unlink(public_path($currentImage));
            }

            // new image name
            $imageName = time() . '.' . $request->image->extension();

            // move to public/uploads/hero
            $request->image->move(public_path('uploads/hero'), $imageName);

            // save path in db
            $banner->image = '/uploads/hero/' . $imageName;
        }

        $banner->heading_1 = $request->heading_1;
        $banner->heading_2 = $request->heading_2;
        $banner->short_description = $request->short_description;

        $banner->save();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
