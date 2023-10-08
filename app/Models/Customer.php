<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model implements HasMedia
{
    use HasFactory, HasRoles,InteractsWithMedia;
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'address',
        'governorate_id',
        'city_id',
        'status',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
