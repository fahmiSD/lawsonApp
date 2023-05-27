<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterStatus;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $master = MasterStatus::orderBy('created_at', 'DESC')->get();
        return view('master.index', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MasterStatus::create($request->all());

        return redirect()->route('master.index')->with('success', 'Data Master Status ' . $request->name . ' Sukses Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $master = MasterStatus::findOrFail($id);

        return view('master.show', compact('master'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $master = MasterStatus::findOrFail($id);

        return view('master.edit', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $master = MasterStatus::findOrFail($id);

        $master->update($request->all());

        return redirect()->route('master.index')->with('info', 'Data Master Status ' . $request->name . ' Telah Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $master = MasterStatus::findOrFail($id);
        $master->delete();
        return redirect()->route('master.index')->with('warning', 'Data Master Status ' . $master->name . ' Telah Berhasil Dihapus!');
    }
}
