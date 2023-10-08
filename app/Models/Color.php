<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['product_id', 'standard_color_id', 'status'];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function standardColor()
    {
        return $this->belongsToMany(StandardColor::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


}
