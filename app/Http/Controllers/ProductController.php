<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Merchant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::join('merchants', 'merchants.id', '=', 'products.merchant_id')
            ->orderBy('products.created_at', 'DESC')
            ->select('products.*', 'merchants.merchant_name as merchant')
            ->get();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchant = Merchant::orderBy('merchant_name', 'ASC')->get();

        return view('product.create', compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $price = str_replace(',', '', $request->input('price'));
        Product::create(
            [
                'price' => $price,
                'name' => $request->name,
                'merchant_id' => $request->merchant_id
            ]
        );

        return redirect()->route('product.index')->with('success', 'Data Product ' . $request->name . ' Sukses Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $merchant = Merchant::orderBy('merchant_name', 'ASC')->get();

        return view('product.show', compact('product', 'merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product_id)
    {
        $product = Product::findOrFail($product_id);
        $merchant = Merchant::orderBy('merchant_name', 'ASC')->get();

        return view('product.edit', compact('product', 'merchant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product_id)
    {
        $product = Product::findOrFail($product_id);
        $price = str_replace(',', '', $request->input('price'));
        $product->update([
            'price' => $price,
            'name' => $request->name,
            'merchant_id' => $request->merchant_id
        ]);

        return redirect()->route('product.index')->with('info', 'Data Product ' . $request->name . ' Telah Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('warning', 'Data Product ' . $product->name . ' Telah Berhasil Dihapus!');
    }
}
