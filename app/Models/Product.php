<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price','quantity'
    ];

    // العلاقة مع الفئات
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // العلاقة مع الطلبات
    public function orders()
    {
        return $this->hasMany(Order::class);

}


}
