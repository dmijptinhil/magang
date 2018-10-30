<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TujuanDisposisi extends Model
{
	//tabel tujuan disposisi
    protected $table = 'tujuan_disposisi';
    //timestamps
    public $timestamps = false;

    //relation with user
    public function getUser() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
