@extends('layouts.bootstrap')
@section('content')
<div>
    <p> Supplies name - {{ $supplies->name }} </p> 
    <p> Supplies type - {{ $supplies->type }} </p>
    <p> Supplies brand - {{ $supplies->brand }} </p>
    <p> Supplies price - {{ $supplies->price }} </p>
    <p> Supplies quantity - {{ $supplies->quantity }} </p>
</div>
<div>
    <form action="/supplies/{{ $supplies->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete product</button>
    </form>
    <a href="/supplies/{{ $supplies->id }}/edit">update</a>
</div>
@endsection