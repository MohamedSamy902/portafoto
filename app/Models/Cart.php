<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'size', 'standard_color_id', 'quantity', 'customerId', 'totalPrice', 'price', 'status', 'invoice_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function standardColor()
    {
        return $this->belongsTo(StandardColor::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
