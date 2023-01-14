<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use App\Rating;

class Movie extends Model
{
    public function rating(){
        return $this->hasMany(Rating::class, 'movieid', 'movieid');
    }

    public function scopeGetAverageRatings(){
        return $this->rating()->selectRaw('movieid, ROUND(Cast(AVG(rating) as NUMERIC), 2) as average')
                    ->groupBy( 'movieid');
    }

    public function scopeTopRated( Builder $query){
        return $query->selectRaw('movies.title, movies.genres, SUM(ratings.rating) * COUNT(ratings.userid) as ranking')
                    ->from('movies')
                    ->leftJoin('ratings', 'ratings.movieid', '=', 'movies.movieid')
                    ->groupBy(['movies.title', 'movies.genres'])
                    ->whereNotNull('ratings.rating')
                    ->orderBy('ranking', 'desc');
    }

    // public function scopeSimilarUsers( Builder $query){
    //     return $query->selectRaw('r1.userid, 
    //                             COUNT(*) as similar_taste_count')
    //                 ->from('ratings as r1')
    //                 ->join('ratings as r2', function($join) {
    //                     $join->on('r1.movieid', '=', 'r2.movieid')
    //                         ->where('r1.userid', '!=', 'r2.userid')
    //                         ->where('r1.rating', '=', 'r2.rating');
    //                 })
    //                 ->groupBy('r1.userid');
    // }

    public function scopeSimilarUsers( Builder $query){
        return $query->selectRaw("r1.userid as user1,r2.userid as user2 ,
                                    COUNT(*) as similar_taste_count ,
                                    STRING_AGG(m.title, ',') as movieList") 
                    ->from('ratings as r1')
                    ->join('movies as m', 'r1.movieid', '=', 'm.movieid')
                    ->join('ratings as r2', function($join) {
                        $join->on('r1.movieid', '=', 'r2.movieid')
                            ->on('r1.userid', '!=', 'r2.userid')
                            ->on('r1.rating', '=', 'r2.rating');
                    }) 
                    ->havingRaw('COUNT(*) > 50')
                    ->groupBy('r1.userid','r2.userid');
    }
}