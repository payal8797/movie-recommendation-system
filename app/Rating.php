<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Rating extends Model
{
    public function movie(){
        return $this->belongsTo(Movie::class, 'movieid', 'movieid');
    }
}
