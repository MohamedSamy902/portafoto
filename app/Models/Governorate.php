<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Governorate extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'status', 'price'];

    public $translatable = ['name'];

    public function city()
    {
        return $this->hasMany(City::class, 'governorate_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'governorate_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
