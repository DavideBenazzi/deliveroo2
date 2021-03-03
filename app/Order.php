<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plate() {
        return $this->hasMany('App\Plate');
    }
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        // 'payment',
        'order',
        'quantity'
    ];
}

