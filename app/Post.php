<?php

namespace App;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Slugger;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag'); //metere il nome del model al singolare
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
