<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "paid_amount",
        "discount_amount",
        "total_amount"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookingProducts()
    {
        return $this->hasMany(BookingProduct::class);
    }

    public function createBookingProduct($product)
    {
        $this->bookingProducts()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'discount' => $product->discount
        ]);
    }
}
