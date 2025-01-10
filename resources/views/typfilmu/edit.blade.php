@extends('layouts.app2')

@section('content')
<div class="container">
    <h1 class="my-4">Edytuj Typ filmu</h1>
    <form action="{{ route('typfilmu.update', $typfilmu->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('typfilmu.partials.form')
    
    <a href="{{ route('typfilmu.index') }}" class="btn btn-secondary">Anuluj</a>
</form>

</div>
@endsection
