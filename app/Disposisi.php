<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
     //Table Name
    protected $table = 'disposisis';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    //relationship with inletter
    public function inletters(){
    	return $this->belongsTo('App\Inletter', 'inletter_id');
    }
    //relationship with user
    public function user(){
    	return $this->belongsTo('App/User');
    }
}
