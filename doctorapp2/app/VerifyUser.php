<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    /**
     * Relation for User Model
     */
    protected $gurarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
