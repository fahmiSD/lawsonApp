<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\City;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchant = Merchant::join('cities', 'cities.id', '=', 'merchants.city_id')
            ->orderBy('merchants.created_at', 'DESC')
            ->select('merchants.*', 'cities.name as city_name')
            ->get();
        return view('merchant.index', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::orderBy('name', 'ASC')->get();

        return view('merchant.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Merchant::create($request->all());

        return redirect()->route('merchant.index')->with('success', 'Data Merchant ' . $request->merchant_name . ' Sukses Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merchant = Merchant::findOrFail($id);
        $cities = City::orderBy('name', 'ASC')->get();

        return view('merchant.show', compact('merchant', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merchant = Merchant::findOrFail($id);
        $cities = City::orderBy('name', 'ASC')->get();

        return view('merchant.edit', compact('merchant', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merchant = Merchant::findOrFail($id);

        $merchant->update($request->all());

        return redirect()->route('merchant.index')->with('info', 'Data Merchant ' . $request->merchant_name . ' Telah Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merchant = Merchant::findOrFail($id);
        $merchant->delete();
        return redirect()->route('merchant.index')->with('warning', 'Data Merchant ' . $merchant->merchant_name . ' Telah Berhasil Dihapus!');
    }
}
