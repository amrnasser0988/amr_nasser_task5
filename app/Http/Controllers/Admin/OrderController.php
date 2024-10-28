<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
        $orders = Order::with('product', 'user')->get();
        return view('admin.orders.index', compact('orders'));
    }
}