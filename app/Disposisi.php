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

    //relation with inletter many to many
    public function inletters(){
    	return $this->belongsTo('App\Inletter', 'inletter_id');
    }
    
    //relation with user many to many
     public function getTujuan()
    {
        return $this->belongsTo('App\User', 'tujuan');
    }
     public function getNomor()
    {
        return $this->belongsTo('App\Inletter', 'no_surat');
    }
}
