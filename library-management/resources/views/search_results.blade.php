@extends('app')

@section('content')
@include('layouts.header')

<div class="container py-5">
    <h2>Search results for: <strong>{{ $query }}</strong></h2>

    @if($books->isEmpty())
        <p>No results found. Try a different search term.</p>
    @else
        <div class="row g-4">
            @foreach($books as $book)
                <div class="col-md-3">
                    <div class="card book-card">
                        <img src="{{ asset($book->image ?? 'images/default-book.jpg') }}"
                             class="card-img-top"
                             alt="{{ $book->title }}"
                             onerror="this.onerror=null;this.src='{{ asset('images/default-book.jpg') }}'">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->author }}</p>
                            <a href="{{ route('book_detail', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('layouts.footer')
@endsection
