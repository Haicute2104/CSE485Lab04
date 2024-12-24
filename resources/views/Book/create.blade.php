@extends('layout.app')
@section('content')
<h1>Create</h1>

<form action="{{ route('book.store') }}" method = 'post'>
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name = 'name' class="form-control">

    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Author</label>
        <input type="text" name = 'author' class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Category</label>
        <input type="text" name = 'category' class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Year</label>
        <input type="text" name = 'year' class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class = 'form-label'>Quantity</label>
        <input type="text" name = 'quantity' class="form-control">
    </div>
    <button type="submit"class ='btn btn-success'>ADD</button>
</form>
@endsection
