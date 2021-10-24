<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function($order) {
            Contract::create([
                'order_id' => $order->id,
                'customer_id' => $order->customer->id,
                'title' => 'New contract for order ' . $order->id,
                'description' => $order->customer->fullname . ' completed the order' . $order->id . ' successfully',
            ]);
        });

        // Soft delete del contratto associato all'ordine, distacco dei tags
        static::deleting(function($order) {
            $order->contract->delete();
            $order->tags()->detach();
        });

        // Ripristino del contratto associato all'ordine
        static::restored(function($order) {
            $order->contract()->onlyTrashed()->restore();
        });
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
