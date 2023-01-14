<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data = Movie::with('GetAverageRatings')    
                       ->paginate(60);

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
    public function similarUsers()
    {
        $data = Movie::similarUsers()->limit(10)->get();
        #dd($data->toArray());
        return view('similarUsers', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovieRecommendation  $movieRecommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieRecommendation $movieRecommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovieRecommendation  $movieRecommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieRecommendation $movieRecommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovieRecommendation  $movieRecommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieRecommendation $movieRecommendation)
    {
        //
    }
}
