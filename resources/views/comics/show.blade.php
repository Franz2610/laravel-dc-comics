@extends('layouts.app')

@section('content')
    <div class="container d-flex my-5 justify-content-center info">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="pe-5 text-white-50">
                    <h1>{{ $comic->title }}</h1>
                    <p>{{ $comic->description }}</p>
                    <p>Prezzo: {{ $comic->price }}</p>
                    <p>Serie: {{ $comic->series }}</p>
                    <p>Data di rilascio: {{ $comic->sale_date }}</p>
                    <p class="text-capitalize">Tipo: {{ $comic->type }}</p>
                    <a class="btn btn-primary align-self-end" href="{{ route('comics.index') }}">Torna alla lista dei
                        fumetti</a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning mx-auto content">Modifica il
                    fumetto</a>
                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger delete-button">Elimina il
                        fumetto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
