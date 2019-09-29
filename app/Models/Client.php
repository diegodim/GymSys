<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
class Client extends Model
{
    use Eloquence;
    protected $fillable = [
        'id', 'biometric_hash'
    ];
    public function person()
    {
        return $this->hasOne(Person::class, 'id');
    }

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }
}
