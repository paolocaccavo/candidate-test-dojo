<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    // ***** Alternativa ad aggiungere una foreign_key del cliente nel contratto: *****
    // public function contracts()
    // {
    //     return $this->hasManyThrough(Contract::class, Order::class);
    // }
}
