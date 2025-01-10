@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Edytuj Autora</h1>
    <form action="{{ route('autor.update', $autor->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('autor.partials.form')
    
    <a href="{{ route('autor.index') }}" class="btn btn-secondary">Anuluj</a>
</form>

</div>
@endsection
