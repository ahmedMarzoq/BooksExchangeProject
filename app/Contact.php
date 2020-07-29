<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $table = 'contact_info';
    protected $fillable = ['user_id', 'phone_number', 'facebook_url'];

    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }


}
