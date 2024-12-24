{{-- {{ dd($books) }} --}}
@php
    $STT = 1;
@endphp
@extends('layout.App')

@section('content')
{{-- <a href="{{ route('book.create') }}" class = "btn btn-primary">ADD</a> --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ADD
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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

            
        </div>
      </div>
    </div>
  </div>
<table class="table">
<thead>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Name</th>
    <th scope="col">Author</th>
    <th scope="col">Category</th>
    <th scope="col">Year</th>
    <th scope="col">Quantity</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    @foreach ($books as $item)
    <tr>
        <td>{{ $STT }}</td>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['author'] }}</td>
        <td>{{ $item['category'] }}</td>
        <td>{{ $item['year'] }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td><a href="{{ route('book.edit', ['book'=> $item->id]) }}" class="btn btn-warning">Edit</a>
            {{-- <a href="{{ route('book.destroy', ['book' => $item->id]) }}" class=" btn btn-danger">Delete</a> --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel-{{ $item->id }}">
                Delete
            </button>
        
            <div class="modal fade" id="deleteModel-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModelLabel">Bạn có muốn xóa bản tin này</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p style="color: red;">Khi bạn xóa bản ghi này sẽ không thể khôi phục</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <form action="{{ route('book.destroy', ['book' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
  
 
        </td>
    </tr>
    @php
        $STT++;
    @endphp
    @endforeach
  
  
</tbody>
</table>
{{ $books->links() }}
@endsection



@if(session('message'))
<div class="toast align-items-center show" id="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
    <div class="d-flex">
        <div class="toast-body">
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif
<script>
    // Hiển thị toast nếu có
    window.onload = function() {
        var toast = document.getElementById('toast');
        if (toast) {
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000); // 3 giây để ẩn toast
        }
    }
</script>
