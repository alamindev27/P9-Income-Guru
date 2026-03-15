<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proof;
use Illuminate\Http\Request;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Proof::latest()->paginate(20);
        return view('admin.proof.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proof.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required | string | max:255',
            'status' => 'required|in:WIN,LOSS,DRAW',
        ]);
        Proof::create([
            'time' => $request->time,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.proof.index')->with('success', 'Proof created successfully');
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
        $data = Proof::findOrFail($id);
        return view('admin.proof.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Proof::findOrFail($id);
        $request->validate([
            'time' => 'required | string | max:255',
            'status' => 'required|in:WIN,LOSS,DRAW',
        ]);
        $data->update([
            'time' => $request->time,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.proof.index')->with('success', 'Proof updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Proof::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.proof.index')->with('success', 'Proof deleted successfully');
    }
}
