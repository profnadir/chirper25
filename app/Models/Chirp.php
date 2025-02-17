<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    // message, user_id

    protected $fillable = [
        'message',
        'user_id'
    ];

    // relation user

    public function user(){

        return $this->belongsTo(User::class);

    }
}


