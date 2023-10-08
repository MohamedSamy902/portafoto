<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['product_id', 'standard_size_id', 'status', 'price', 'discount', 'type'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function standardSize()
    {
        return $this->belongsTo(StandardSize::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
