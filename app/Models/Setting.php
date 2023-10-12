<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, HasRoles, HasTranslations;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'keywords', 'facebook', 'instagram', 'twitter', 'messenger', 'mobile_1', 'mobile_2', 'vodafoneCash', 'instapay'];
    public $translatable = ['name', 'description', 'keywords'];

}
