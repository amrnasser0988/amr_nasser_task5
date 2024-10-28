<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
          // التحقق من صحة البيانات المدخلة
          $request->validate([
            'product_id' => 'required|exists:products,id', // يجب أن يكون المنتج موجودًا في جدول المنتجات
        ]);

        // جلب معرف المستخدم الحالي
        $userId = Auth::id();

        // التحقق من وجود المنتج المطلوب
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        // إنشاء الطلب
        $order = new Order();
        $order->user_id = $userId;
        $order->product_id = $request->product_id;
        $order->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Order placed successfully',
            'order' => $order
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
