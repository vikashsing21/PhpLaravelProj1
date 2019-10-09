<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    
    protected $guarded=[];
    public function Contact()
    {
        return $this->belongsTo('App\Contact','user_id');
    }
}
