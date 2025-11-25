<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'discount',
        'total_amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function booted()
    {
        static::creating(function ($order) {
            $product = Product::find($order->product_id);
            if ($product) {
                $product->stock_quantity -= $order->quantity;
                $product->save();
            }
        });

        static::updating(function ($order) {
            $originalOrder = self::find($order->id);
            if ($originalOrder) {
                $quantityDifference = $order->quantity - $originalOrder->quantity;
                $product = Product::find($order->product_id);
                if ($product) {
                    $product->stock_quantity -= $quantityDifference;
                    $product->save();
                }
            }
        });

        static::deleting(function ($order) {
            $product = Product::find($order->product_id);
            if ($product) {
                $product->stock_quantity += $order->quantity;
                $product->save();
            }
        });
    }
}
