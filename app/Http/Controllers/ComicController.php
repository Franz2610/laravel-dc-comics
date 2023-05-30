<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data =
        [
            'headerLinks' => config('db.headerLinks'),
            'dcComics' => config('db.dcComics'),
            'shop' => config('db.shop'),
            'dc' => config('db.dc'),
            'sites' => config('db.sites'),
            'comics' => config('db.comics')
        ];
        $comics = Comic::all();
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $data =
        [
            'headerLinks' => config('db.headerLinks'),
            'dcComics' => config('db.dcComics'),
            'shop' => config('db.shop'),
            'dc' => config('db.dc'),
            'sites' => config('db.sites'),
            'comics' => config('db.comics')
        ];
        return view('comics.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newComic = new Comic();
        $newComic->fill($form_data);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function show(Comic $comic)
    {
        $data =
        [
            'headerLinks' => config('db.headerLinks'),
            'dcComics' => config('db.dcComics'),
            'shop' => config('db.shop'),
            'dc' => config('db.dc'),
            'sites' => config('db.sites'),
            'comics' => config('db.comics')
        ];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
