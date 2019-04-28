<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Band;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all()->load('band');
        $bands = Band::all();

        return view('album/index')->withAlbums($albums)->withBands($bands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands = Band::all();

        return view('album/create')->withBands($bands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'album.name' => 'required'
        ]);

        Album::create($request->input('album'));

        $albums = Album::all()->load('band');
        $bands = Band::all();

        return redirect(route('album.index'))->withAlbums($albums)->withBands($bands);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('album/show')->withAlbum($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $bands = Band::all();

        return view('album/edit')->withAlbum($album)->withBands($bands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'album.name' => 'required'
        ]);

        tap($request->input('album'), function ($newAlbum) use ($album) {
            $album->fill($newAlbum);
            $album->save();
        });

        $albums = Album::all()->load('band');
        $bands = Band::all();

        return redirect(route('album.index'))->withAlbums($albums)->withBands($bands);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        $albums = Album::all()->load('band');
        $bands = Band::all();

        return redirect(route('album.index'))->withAlbums($albums)->withBands($bands);
    }
}
