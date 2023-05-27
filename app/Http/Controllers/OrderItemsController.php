<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use App\Models\OrderItems;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItems::join('products', 'products.product_id', '=', 'order_items.product_id')
            ->join('users', 'users.id', '=', 'order_items.user_id')
            ->join('order_statuses', 'order_statuses.order_id', '=', 'order_items.order_id')
            ->join('master_statuses', 'master_statuses.id', '=', 'order_statuses.status_id')
            ->orderByDesc('order_items.updated_at')
            ->select('order_items.*', 'products.name as product_name', 'users.full_name as user_name', 'master_statuses.name as status_name')
            ->get();

        return view('orderItems.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::orderBy('name', 'ASC')->get();
        $user = User::orderBy('full_name', 'ASC')->get();
        $status = MasterStatus::orderBy('name', 'ASC')->get();

        return view('orderItems.create', compact('product', 'user', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrderItems::create($request->all());

        $lastId = DB::getPdo()->lastInsertId();

        OrderStatus::create(
            [
                'order_id' => $lastId,
                'status_id' => $request->status_order,
            ]
        );

        return redirect()->route('orderItems.index')->with('success', 'Data Order Items Sukses Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $order_id)
    {
        $orderItems = OrderItems::findOrFail($order_id);
        $product = Product::orderBy('name', 'ASC')->get();
        $user = User::orderBy('full_name', 'ASC')->get();
        $orderStatus = OrderStatus::where('order_id', $order_id)->firstOrFail();
        $status = MasterStatus::orderBy('name', 'ASC')->get();

        return view('orderItems.show', compact('orderItems', 'product', 'user', 'status', 'orderStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $order_id)
    {
        $orderItems = OrderItems::findOrFail($order_id);
        $product = Product::orderBy('name', 'ASC')->get();
        $user = User::orderBy('full_name', 'ASC')->get();
        $orderStatus = OrderStatus::where('order_id', $order_id)->firstOrFail();
        $status = MasterStatus::orderBy('name', 'ASC')->get();

        return view('orderItems.edit', compact('orderItems', 'product', 'user', 'status', 'orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $order_id)
    {
        $orderItems = OrderItems::findOrFail($order_id);
        $orderItems->update($request->all());

        $orderStatus = OrderStatus::where('order_id', $order_id)->firstOrFail();
        $orderStatus->update([
            'status_id' => $request->status_order,
        ]);

        return redirect()->route('orderItems.index')->with('info', 'Data Order Items Telah Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order_id)
    {
        $orderItems = OrderItems::findOrFail($order_id);
        $orderItems->delete();

        $orderStatus = OrderStatus::findOrFail($order_id);
        $orderStatus->delete();
        return redirect()->route('orderItems.index')->with('warning', 'Data Order Items Telah Berhasil Dihapus!');
    }
}