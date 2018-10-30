<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inletter extends Model
{
    //Table Name
    protected $table = 'inletters';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    //relation with disposisi one to one
    public function disposisi(){
    	return $this->hasOne('App\Disposisi', 'inletter_id');
    }

    //relation with user one to many
    public function getTujuan()
    {
        return $this->belongsTo('App\User', 'tujuan');
    }
}
