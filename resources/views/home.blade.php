@extends('layouts.app')

@section('content')
<section class="container d-flex justify-content-center mt-5">
    <a href="{{ route('comics.index') }}" class="btn btn-primary">Vai alla lista dei fumetti</a>
</section>
@endsection
