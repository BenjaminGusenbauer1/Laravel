<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable =['streetname', 'streetnumber', 'zip', 'city', 'country'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
