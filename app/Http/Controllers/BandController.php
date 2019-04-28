<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();

        return view('band/index')->withBands($bands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('band/create');
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
            'band.name' => 'required'
        ]);

        $band = tap($request->input('band'), function ($band) {
            $band['still_active'] = isset($band['still_active']) ? true : false;
        });

        Band::create($band);

        return redirect(route('band.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        return view('band/edit')->withBand($band->load('albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        $request->validate([
            'band.name' => 'required'
        ]);

        $newBand = tap(
            $request->input('band'),
            function ($band) {
                $band['still_active'] = isset($band['still_active']) ? true : false;
            }
        );

        $band->fill($newBand);

        $band->save();

        return redirect(route('band.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Band  $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Band $band)
    {
        $band->albums->each(function ($album) {
            $album->delete();
        });

        $band->delete();

        return redirect(route('band.index'));
    }
}
