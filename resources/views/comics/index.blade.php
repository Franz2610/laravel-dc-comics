@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center">
        <a href="{{ route('comics.create') }}" class="btn btn-primary mb-5 align-self-start">Aggiungi un nuovo
            fumetto</a>
        <div class="row d-flex ">

            @foreach ($comics as $comic)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex card-img">
                    <img class="w-50" src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">
                    <h2>
                        <a href="{{ route('comics.show', $comic['id']) }}">{{ $comic['title'] }}</a>
                    </h2>
                </div>
                <div class="d-grid gap-2 d-md-block d-flex w-25">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning mx-auto content">Modifica il
                        fumetto</a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete-button">Elimina il
                            fumetto</button>
                    </form>
                </div>
            @endforeach

    </div>
@endsection
