<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Invoice extends Model
{
    use HasFactory, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'customerId', 'address_1', 'address_2', 'mobile_1', 'mobile_2', 'zip_code', 'payment', 'totalPrice', 'governorate_id', 'city_id', 'status', 'customerId'];



    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
