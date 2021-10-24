<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company'];

    protected static function boot()
    {
        parent::boot();

        // Soft delete degli ordini del cliente
        static::deleting(function($customer) {
            foreach($customer->orders as $order) {
                $order->delete();
            }
        });

        // Ripristino degli ordini del cliente
        static::restored(function($customer) {
            foreach($customer->orders()->onlyTrashed()->get() as $order) {
                $order->restore();
            }
        });
    }

    // ***** Accessor per il nome e cognome *****
    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
