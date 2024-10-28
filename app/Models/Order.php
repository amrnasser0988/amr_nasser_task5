<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'status','quantity'
    ];

    // العلاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المنتج
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
