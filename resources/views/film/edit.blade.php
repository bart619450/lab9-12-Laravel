@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Edytuj Film</h1>
    <form action="{{ route('film.update', $film->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('film.partials.form')
    
    <a href="{{ route('film.index') }}" class="btn btn-secondary">Anuluj</a>
</form>

</div>
@endsection
