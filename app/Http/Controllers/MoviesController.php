<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Movie;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//title, director, duration i releaseDate su required
//duration mora biti broj između 1 i 500
//imageUrl mora biti URL
//Film sa istim title i releaseDate ne može biti dva puta dodat u bazu


//$request->validate([
//'title' => 'required|unique:posts|max:255',
//'author.name' => 'required',
//'author.description' => 'required',
//]);


//$this->validate($request, [
//'email' => 'required|email',
//]);

    public function store(Request $request)
    {

//        $this->validate($request, [
//
//            'title' => 'required|unique:movies',
//            'director' => 'required|unique:movies',
//            'duration' => 'required|min:1|max:500',
//            'releaseDate' => 'required',
//            'imgUrl' => 'url',
//        ]);


        $request->validate([
            'title' => 'required|unique:movies',
            'director' => 'required|unique:movies',
            'duration' => 'required|min:1|max:500',
            'releaseDate' => 'required',
            'imgUrl' => 'url',
]);

        $movie= new Movie();


        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');


        $movie->save();

        return $movie;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $movie = Movie::find($id);

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');


        $movie->save();

        return $movie;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);


        $movie->delete();

        return new JsonResponse(true);
    }
}
