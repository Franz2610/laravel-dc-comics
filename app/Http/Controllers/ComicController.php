<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
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
            'sites' => config('db.sites')
        ];
        $comics = Comic::all();
        return view('comics.index', $data, compact('comics'));
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
        $form_data = $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'thumb' => ['required'],
            'price' => ['required', 'min:0.99', 'numeric'],
            'series' => ['required', 'max:255', 'min:2'],
            'sale_date' => ['required', 'date', 'date_format:dd-mm-yyyy'],
            'description' => ['required']
        ]);
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
        ];
        return view('comics.show', $data , compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function edit( Comic $comic)

    {
        $data =
        [
            'headerLinks' => config('db.headerLinks'),
            'dcComics' => config('db.dcComics'),
            'shop' => config('db.shop'),
            'dc' => config('db.dc'),
            'sites' => config('db.sites'),
        ];
        return view('comics.edit', $data, compact('comic'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     */
    public function update(StoreComicRequest $request, Comic $comic)
    {
        $form_data = $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'thumb' => ['required'],
            'price' => ['required', 'min:0.99', 'numeric'],
            'series' => ['required', 'max:255', 'min:2'],
            'sale_date' => ['required', 'date', 'date_format:Y-m-d'],
            'description' => ['required']
        ]);
        $comic->update($form_data);
        return redirect()->route('comics.index', $comic->id)->with('message', " Hai modificato con successo il fumetto!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('message', "Hai eliminato con successo il fumetto: {$comic->title}");
    }
}
