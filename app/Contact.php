<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'city',
    //     'country',
    //     'job_title'       
    // ];
    
    protected $guarded=[];
    public function Tasks()
    {
        return $this->hasMany('App\Tasks');
    }
}