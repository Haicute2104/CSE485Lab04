<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Record Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Borrow Record Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reader: {{ $borrow->reader->name }}</h5>
            <p class="card-text"><strong>Book:</strong> {{ $borrow->book->name }}</p>
            <p class="card-text"><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
            <p class="card-text"><strong>Return Date:</strong> {{ $borrow->return_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $borrow->status }}</p>
            <a href="{{ route('borrows.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>