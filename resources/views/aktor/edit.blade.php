@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Edytuj Aktora</h1>
    <form action="{{ route('aktor.update', $aktor->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('aktor.partials.form')
    
    <a href="{{ route('aktor.index') }}" class="btn btn-secondary">Anuluj</a>
</form>

</div>
@endsection
