<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
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
