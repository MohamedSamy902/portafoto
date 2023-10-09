<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasRoles, HasTranslations;



    protected $fillable = ['name', 'description', 'price', 'discount', 'slug', 'status', 'best', 'slider'];

    public $translatable = ['name', 'description'];
    public function color()
    {
        return $this->hasMany(Color::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // public function invoice()
    // {
    //     return $this->hasMany(Invoice::class);
    // }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (!$product->slug) {
                $slug = Str::slug($product->name);
                $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $product->slug = $count ? "{$slug}-{$count}" : $slug;
                $product->user_id = auth()->user()->id;
            }
        });
    }
}
