<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
         'client_id', 'user_id', 'paid_at', 'due_at', 'value'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
