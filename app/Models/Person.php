<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = [
        'name', 'cpf', 'id_number', 'adress', 'neighborhood', 'city',
        'state_id', 'postal', 'phone', 'activated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }
}
