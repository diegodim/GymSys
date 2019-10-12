<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
class Client extends Model
{
    use Eloquence;
    protected $fillable = [
        'id', 'biometric_hash', 'plan_id'
    ];
    public function person()
    {
        return $this->hasOne(Person::class, 'id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class)->latest('due_at');
    }
}
