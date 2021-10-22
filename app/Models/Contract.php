<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // ***** Facoltativo se si decide di utilizzare la HasManyThrough in App\Models\Contract *****
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
