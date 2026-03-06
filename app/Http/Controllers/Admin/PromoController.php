<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoRequest;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Promo::latest()->paginate(20);
        return view('admin.promos.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromoRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');

            // unique name generate
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // folder: public/uploads/promo
            $file->move(public_path('uploads/promo'), $fileName);

            // DB তে path save
            $data['icon'] = 'uploads/promo/' . $fileName;
        }

        if ($request->hasFile('banner_image')) {
            $file2 = $request->file('banner_image');
            $fileName2 = time() . '_' . Str::random(10) . '.' . $file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/promo/banner/'), $fileName2);
            $data['banner_image'] = 'uploads/promo/banner/' . $fileName2;
        }

        Promo::create($data);

        return redirect()->route('admin.promos.index')
            ->with('success', 'Promo created successfully.');
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
        $promo = Promo::findOrFail($id);
        return view('admin.promos.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(PromoRequest $request, Promo $promo)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {

            // পুরানো image delete
            if ($promo->icon && file_exists(public_path($promo->icon))) {
                unlink(public_path($promo->icon));
            }

            $file = $request->file('icon');

            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/promo'), $fileName);

            $data['icon'] = 'uploads/promo/' . $fileName;
        }

        if ($request->hasFile('banner_image')) {
            if ($promo->banner_image && file_exists(public_path($promo->banner_image))) {
                unlink(public_path($promo->banner_image));
            }

            $file2 = $request->file('banner_image');
            $fileName2 = time() . '_' . Str::random(10) . '.' . $file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/promo/banner/'), $fileName2);
            $data['banner_image'] = 'uploads/promo/banner/' . $fileName2;
        }

        $promo->update($data);

        return redirect()->route('admin.promos.index')
            ->with('success', 'Promo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promo = Promo::findOrFail($id);
        // পুরানো image delete
        if ($promo->icon && file_exists(public_path($promo->icon))) {
            unlink(public_path($promo->icon));
        }
        if ($promo->banner_image && file_exists(public_path($promo->banner_image))) {
            unlink(public_path($promo->banner_image));
        }
        $promo->delete();
        return redirect()->route('admin.promos.index')->with('success', 'Promo deleted successfully.');
    }
}
