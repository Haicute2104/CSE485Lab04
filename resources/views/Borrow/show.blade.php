@extends('layouts.app')
{{ dd($borrow) }}
@section('content')
    @foreach ($borrow as $item)
        <p>{{ $item->id }}</p>
    @endforeach
@endsection