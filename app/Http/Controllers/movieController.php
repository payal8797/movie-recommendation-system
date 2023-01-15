<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $header='List of all movies!!!';
        $data = Movie::with('GetAverageRatings')->paginate(60);
        return view('index', compact('data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $title = $request->get('title','');
        $header='Search results of movies with: '.$title;
        $data = Movie::where('title','ilike','%'.$title.'%')
                        ->with('GetAverageRatings')->paginate(50);
        return view('index', compact('data', 'header'))->withQuery($request->get('title',''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function topRatedMovies(Request $request)
    {
        $genre = $request->get('genre','');
        $header='Top 10 movies with genre: '.$genre;
        $data = Movie::where('genres', 'ilike','%'.$genre.'%')->topRated()->limit(10)->get(); 
        return view('index', compact('data', 'header'))->withQuery($request->get('genre',''));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovieRecommendation  $movieRecommendation
     * @return \Illuminate\Http\Response
     */
    public function goToSimilarUsers()
    {
        return view('goToSimilarUsers');
    }

    public function fetchSimilarUsers(Request $request)
    {
        $user = $request->get('userid','');
        $data = Movie::where('r1.userid', '=', $user)->fetchSimilarUsers()->limit(10)->get();
        #dd($data->toArray());
        $recomData = Movie::recommendMovies($user)->limit(10)->get();
        return view('fetchSimilarUsers', compact('data', 'user'))->withQuery($request->get('user',''));
    }


}
