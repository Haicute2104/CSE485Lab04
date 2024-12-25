@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Borrow Management</h1>
    <!--hiển thị thông báo-->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('borrows.index') }}" class="btn btn-secondary btn-sm mb-4">
        <i class="bi bi-arrow-left"></i> Back to Book Management
    </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Reader</th>
            <th class="text-center">Book</th>
            <th class="text-center">Borrow Date</th>
            <th class="text-center">Return Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($borrows as $borrow)
            <tr>
                <td>{{ $borrow->id }}</td>
                <td>{{ $borrow->reader->name }}</td>
                <td>{{ $borrow->book ->name}}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date }}</td>
                <td>{{ $borrow->status }}</td>
                <td>
                    @if($borrow->status !== 'returned')
                        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="returned">
                            <button type="submit" class="btn btn-success btn-sm">Mark as Returned</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
@endsection