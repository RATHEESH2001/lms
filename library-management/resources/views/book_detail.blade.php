@extends('app')

@section('title', 'Book Details')

@section('content')
@include('layouts.header')

<div class="container py-5">
    <div class="row g-4">
        <!-- Book Image -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset($book->image ?? 'images/default-book.jpg') }}"
                     alt="Book Image"
                     onerror="this.onerror=null; this.src='{{ asset('images/default-book.jpg') }}';">
            </div>
        </div>

        <!-- Book Info -->
        <div class="col-md-8">
            <h2 class="fw-bold">{{ $book->title ?? 'Book Title' }}</h2>
            <p class="text-muted mb-1"><strong>Author:</strong> {{ $book->author ?? 'Author Name' }}</p>
            <p class="text-muted mb-1"><strong>Category:</strong> {{ $book->category->name ?? 'Category' }}</p>
            <p class="text-muted mb-3"><strong>ISBN:</strong> {{ $book->isbn ?? '0000000000' }}</p>
            <p class="lead mb-4">{{ $book->description ?? 'No description available.' }}</p>

            <!-- Availability -->
            <p>
                <span class="badge bg-{{ $book->available_copies > 0 ? 'success' : 'danger' }}">
                    {{ $book->available_copies > 0 ? $book->available_copies . ' copies available' : 'Not available' }}
                </span>
            </p>

            <!-- Borrow Button -->
            @if($book->available_copies > 0)
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrowModal">
                    <i class="bi bi-bookmark-plus me-1"></i> Borrow
                </button>
            @else
                <button class="btn btn-secondary" disabled>Currently Unavailable</button>
            @endif
        </div>
    </div>

    <hr class="my-5">

    <!-- Borrow History Table -->
    <div class="mt-4">
        <h4 class="fw-bold mb-3">Borrow History</h4>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Borrowed On</th>
                    <th>Returned On</th>
                    <th>Status</th>
                    <th>Borrowed By</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($borrowHistory as $borrow)
                <tr>
                    <td>{{ $borrow->borrow_date ? $borrow->borrow_date->format('d-m-Y') : '-' }}</td>
                    <td>{{ $borrow->return_date ? $borrow->return_date->format('d-m-Y') : 'Not Returned' }}</td>
                    <td>
                        <span class="badge bg-{{ $borrow->return_date ? 'success' : 'warning' }}">
                            {{ $borrow->return_date ? 'Returned' : 'Pending' }}
                        </span>
                    </td>
                    <td>{{ $borrow->user->name ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>

<!-- Borrow Modal -->
<div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowModalLabel">Borrow This Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('borrow.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="mb-3">
                        <label for="borrow_date" class="form-label">Borrow Date</label>
                        <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" name="return_date" id="return_date" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm Borrow</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
