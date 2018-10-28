<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TujuanDisposisi extends Model
{
    protected $table = 'tujuan_disposisi';
    public $timestamps = false;

    public function getUser() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
