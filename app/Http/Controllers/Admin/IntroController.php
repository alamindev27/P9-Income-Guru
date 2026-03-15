<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Intro::first();
        return view('admin.intro.index', compact('data'));
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
        $data = Intro::find($id);
        return view('admin.intro.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'animated_text' => 'required|string|max:255',
            'heading_1' => 'required|string|max:255',
            'heading_2' => 'required|string|max:255',
            'winning_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $intro = Intro::findOrFail($id);

        if ($request->hasFile('image')) {

            $currentImage = $intro->image;

            // default image hole delete korbe na
            if ($currentImage !== '/default/hero-bg.jpg' && file_exists(public_path($currentImage))) {
                unlink(public_path($currentImage));
            }

            // new image name
            $imageName = time() . '.' . $request->image->extension();

            // move to public/uploads/hero
            $request->image->move(public_path('uploads/hero'), $imageName);

            // save path in db
            $intro->image = '/uploads/hero/' . $imageName;
        }

        $intro->heading_1 = $request->heading_1;
        $intro->heading_2 = $request->heading_2;
        $intro->animated_text = $request->animated_text;
        $intro->winning_link = $request->winning_link;

        $intro->save();

        return redirect()->route('admin.intro.index')
            ->with('success', 'Intro updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
