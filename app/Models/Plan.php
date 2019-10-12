<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
