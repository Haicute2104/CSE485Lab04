<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Borrow Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Create Borrow Record</h1>
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reader_id" class="form-label">Reader</label>
            <select name="reader_id" id="reader_id" class="form-select" required>
                @foreach($readers as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="borrow_date" class="form-label">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
</body>
</html>