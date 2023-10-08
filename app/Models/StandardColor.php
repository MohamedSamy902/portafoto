<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class StandardColor extends Model
{
    use HasFactory, HasRoles, HasTranslations;
    protected $fillable = ['name', 'status'];
    public $translatable = ['name'];

    public function color()
    {
        return $this->hasMany(Color::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
