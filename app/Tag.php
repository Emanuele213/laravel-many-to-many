<?php

namespace App;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Slugger;

    public function posts() {
        return $this->belongsToMany('App\Post'); //metere il nome del model al singolare
    }

    public $timestamps = false;
}
