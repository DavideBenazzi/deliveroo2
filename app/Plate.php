<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function order() {
        return $this->hasMany('App\Order');
    }
    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'allergenic',
        'photo',
        'price',
        'visibility',
        'user_id'
    ];
}
