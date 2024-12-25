<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Borrow Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Edit Borrow Record</h1>
    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Other fields for Reader, Book, Borrow Date, Return Date -->

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Borrowed</option>
                <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Returned</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>