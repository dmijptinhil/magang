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

    //relationship with disposisi
    public function disposisi(){
    	return $this->hasOne('App\Disposisi', 'inletter_id');
    }
    //relationship with user
     public function user(){
    	return $this->belongsTo('App/User');
    }
}
