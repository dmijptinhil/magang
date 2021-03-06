<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outletter extends Model
{
     //Table Name
    protected $table = 'outletters';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    //relation with user one to many
    public function getAsal()
    {
        return $this->belongsTo('App\User', 'asal');
    }
}
