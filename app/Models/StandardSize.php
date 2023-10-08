<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StandardSize extends Model
{
    use HasFactory, HasRoles, HasTranslations;
    protected $fillable = ['name', 'status'];
    public $translatable = ['name'];

    public function size()
    {
        return $this->hasMany(Size::class);
    }
}
