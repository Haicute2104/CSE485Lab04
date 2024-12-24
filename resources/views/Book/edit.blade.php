@extends('layout.app')
@section('content')
<h1>Edit</h1>

<form action="{{ route('book.update', ['book'=> $bookbyid->id]) }}" method = 'post'>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name = 'name' class="form-control" value="{{ $bookbyid->name }}">

    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Author</label>
        <input type="text" name = 'author' class="form-control" value = "{{ $bookbyid->author }}">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Category</label>
        <input type="text" name = 'category' class="form-control" value ="{{ $bookbyid->category }}">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Year</label>
        <input type="text" name = 'year' class="form-control" value = "{{ $bookbyid->year }}">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Quantity</label>
        <input type="text" name = 'quantity' class="form-control" value ="{{ $bookbyid->quantity }}">
    </div>
    <button type="submit"class ='btn btn-success'>EDIT</button>
</form>
@endsection
