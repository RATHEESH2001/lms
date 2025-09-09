@extends('app')

@section('title', 'Books')

@section('content')
@include('layouts.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
  .book-card {
    transition: all .2s ease-in-out;
    border-radius: .75rem;
  }
  .book-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,.08);
  }
  .book-cover {
    aspect-ratio: 3/4;
    object-fit: cover;
    border-top-left-radius: .75rem;
    border-top-right-radius: .75rem;
  }
  .book-title {
    font-weight: 600;
    font-size: .95rem;
  }
  .book-author {
    font-size: .85rem;
    color: #6c757d;
  }
</style>

{{-- @if(isset($error))
    <p>{{ $error }}</p>
@else
    <h2>Books in {{ $category }}</h2>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>
@endif --}}
<div class="container py-4">
  <!-- Header -->
  {{-- <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Books</h1>
    <a href="#" class="btn btn-primary">
      <i class="bi bi-plus-lg me-1"></i> Add Book
    </a>
  </div> --}}

  <!-- Grid of Books -->
  <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
    @foreach($books as $book)
    <div class="col">
      <a href="{{ route('book_detail', $book->id) }}" class="text-decoration-none">
        <div class="card book-card h-100 border-0 shadow-sm">
          <img src="{{ asset($book->image) }}"
               class="book-cover w-100" alt="{{ $book->title }}">
          <div class="card-body p-2">
            <div class="book-title text-truncate">{{ $book->title }}</div>
            <div class="book-author text-truncate">{{ $book->author }}</div>
            <div class="d-flex justify-content-between align-items-center mt-2">
              <span class="badge">
               available
              </span>
              <i class="bi bi-star-fill text-warning small"></i>
              <span class="small">rating</span>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>

@include('layouts.footer')
@endsection
