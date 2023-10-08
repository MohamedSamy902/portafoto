<?php

namespace App\Models;

use App\Models\Governorate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'governorate_id', 'status', 'slug'];
    public $translatable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
