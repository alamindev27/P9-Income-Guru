<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $data = $request->validated();

        // Video Upload
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = Str::random(20) . '.' . $videoFile->getClientOriginalExtension();

            $videoFile->move('uploads/videos', $videoName,);

            $data['video'] = 'uploads/videos/' . $videoName;
        }

        // Thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            $thumbFile = $request->file('thumbnail');
            $thumbName = Str::random(20) . '.' . $thumbFile->getClientOriginalExtension();

            $thumbFile->move('uploads/thumbnails', $thumbName,);

            $data['thumbnail'] = 'uploads/thumbnails/' . $thumbName;
        }

        $data['slug'] = Str::slug($data['title']);

        Video::create($data);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video created successfully.');
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
        $data = Video::findOrFail($id);
        return view('admin.videos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, string $id)
    {
        $data = Video::findOrFail($id);
        $validatedData = $request->validated();

        // Video Upload
        if ($request->hasFile('video')) {
            if (file_exists(public_path($data->video)) && $data->video) {
                unlink(public_path($data->video));
            }

            $videoFile = $request->file('video');
            $videoName = Str::random(20) . '.' . $videoFile->getClientOriginalExtension();

            $videoFile->move('uploads/videos', $videoName,);

            $validatedData['video'] = 'uploads/videos/' . $videoName;
        }

        // Thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            if (file_exists(public_path($data->thumbnail)) && $data->thumbnail) {
                unlink(public_path($data->thumbnail));
            }

            $thumbFile = $request->file('thumbnail');
            $thumbName = Str::random(20) . '.' . $thumbFile->getClientOriginalExtension();

            $thumbFile->move('uploads/thumbnails', $thumbName,);

            $validatedData['thumbnail'] = 'uploads/thumbnails/' . $thumbName;
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        $data->update($validatedData);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Video::findOrFail($id);


        if (file_exists(public_path($data->video)) && $data->video) {
            unlink(public_path($data->video));
        }

        if (file_exists(public_path($data->thumbnail)) && $data->thumbnail) {
            unlink(public_path($data->thumbnail));
        }

        $data->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
    }
}
