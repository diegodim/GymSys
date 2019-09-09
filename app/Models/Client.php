<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id', 'biometric_hash'
    ];
    public function person()
    {
        return $this->hasOne(Person::class, 'id');
    }
}
