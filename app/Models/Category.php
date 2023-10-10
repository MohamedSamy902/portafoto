<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasRoles, HasTranslations;
    protected $fillable = ['name'];

    public $translatable = ['name'];


    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
