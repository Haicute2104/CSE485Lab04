{{-- {{ dd($borrows) }} --}}
@extends('layouts.app')
@php
    $STT=1;
@endphp
@section('content')
    <h1>Borrows Managerment page</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Book</th>
            <th scope="col">Borrow date</th>
            <th scope="col">Return date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $item)
                <tr>
                    <td>{{ $STT }}</td>
                    <td>
                        <a 
                            href="{{ route('borrow.show', ['borrow' => $item->reader->id]) }}" 
                            style="text-decoration: none; color: #212529;">
                                {{ $item->reader->name }}
                        </a>
                    </td>
                    <td>{{ $item->book->name }}</td>
                    <td>{{ $item->borrow_date }}</td>
                    <td>{{ $item->return_date }}</td>
                    @if ($item->status == 0)
                        <td> 
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changeModel-{{ $item->id }}">
                                Not Paid
                            </button>
                            
                            <div class="modal fade" id="changeModel-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeModelLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="changeModelLabel">Notification!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: red;">Confirm return of books</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('borrow.update', ['borrow' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @else
                        <td> <div class="btn btn-success">Paid</div></td>
                    @endif
                </tr>
                
                @php
                    $STT++
                @endphp
            @endforeach
        </tbody>
      </table>
    {{ $borrows->links() }}
@endsection

@if(session('success'))
<div class="toast align-items-center show" id="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
    <div class="d-flex">
        <div class="toast-body">
            {{ session('success') }}
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
