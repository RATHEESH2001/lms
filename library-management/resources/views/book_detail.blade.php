@extends('app')

@section('title', 'Book Details')

@section('content')
@include('layouts.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
  .book-cover {
    width: 100%;
    max-width: 260px;
    aspect-ratio: 3/4;
    object-fit: cover;
    border-radius: .75rem;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
  }
  .meta-item .label { color: #6c757d; font-size: .875rem; }
  .meta-item .value { font-weight: 500; }
  .badge-availability { font-size: .8rem; }
  .rating .bi-star-fill { font-size: 1rem; }
  .sticky-side { position: sticky; top: 1rem; }
</style>

<div class="container py-4">
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Books</a></li>
      <li class="breadcrumb-item active" aria-current="page">Atomic Habits</li>
    </ol>
  </nav>

  <!-- Header -->
  <div class="d-flex flex-wrap align-items-start justify-content-between gap-2 mb-3">
    <div>
      <h1 class="h3 mb-1">{{ $book->title }}</h1>
      <div class="text-muted">
        by <a href="#" class="text-decoration-none">{{ $book->author }}</a>
      </div>
    </div>

    <div class="d-flex gap-2">
      <a href="#" class="btn btn-outline-secondary">
        <i class="bi bi-pencil me-1"></i> Edit
      </a>
      <button class="btn btn-outline-danger">
        <i class="bi bi-trash me-1"></i> Delete
      </button>
      <button class="btn btn-primary">
        <i class="bi bi-bookmark-plus me-1"></i> Issue
      </button>
    </div>
  </div>

  <!-- Top Section -->
  <div class="row g-4">
    <!-- Left -->
    <div class="col-lg-3">
      <div class="sticky-side">
        <img src="{{ asset($book->image) }}" alt="Book cover" class="book-cover mb-3">
        <div class="d-flex flex-wrap gap-2">
          <span class="badge text-bg-light">Self-help</span>
          <span class="badge text-bg-light">Productivity</span>
        </div>
      </div>
    </div>

    <!-- Right -->
    <div class="col-lg-9">
      <div class="card border-0 shadow-sm">
        <div class="card-body">

          <!-- Availability & Rating -->
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div>
              <span class="badge text-bg-success badge-availability"><i class="bi bi-check2-circle me-1"></i>Available</span>
              <span class="text-muted small">(3/10 copies)</span>
            </div>
            <div class="rating d-flex align-items-center gap-2">
              <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <span class="small text-muted">4.5 / 5</span>
              <a href="#reviews" class="small text-decoration-none">(24 reviews)</a>
            </div>
          </div>

          <!-- Meta -->
          <div class="row g-3 mb-4">
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">ISBN</div>
              <div class="value">{{ $book->isbn }}</div>
            </div>
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">Publisher</div>
              <div class="value">{{ $book->publisher }}</div>
            </div>
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">Publication Date</div>
              <div class="value">{{ $book->published_year }}</div>
            </div>
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">Language</div>
              <div class="value">{{ $book->language }}</div>
            </div>
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">Pages</div>
              <div class="value">{{ $book->pages }}</div>
            </div>
            <div class="col-md-6 col-xl-4 meta-item">
              <div class="label">Location</div>
              <div class="value">Aisle B · Shelf 3</div>
            </div>
          </div>

          <!-- Tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview" type="button">Overview</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#details" type="button">Details</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#history" type="button">Issue History</button>
            </li>
          </ul>

          <div class="tab-content pt-3">
            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview">
              <p>An easy & proven way to build good habits and break bad ones...</p>
            </div>

            <!-- Details -->
            <div class="tab-pane fade" id="details">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="small text-muted">Categories</div>
                  <div class="fw-medium">{{ $book->category }}y</div>
                </div>
                <div class="col-md-6">
                  <div class="small text-muted">Tags</div>
                  <div class="d-flex flex-wrap gap-2">
                    <span class="badge rounded-pill text-bg-secondary">habits</span>
                    <span class="badge rounded-pill text-bg-secondary">behavior</span>
                    <span class="badge rounded-pill text-bg-secondary">mindset</span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="small text-muted">Notes</div>
                  <div class="fw-normal">First copy donated by alumni, handle with care.</div>
                </div>
              </div>
            </div>

            <!-- Reviews -->
            <div class="tab-pane fade" id="reviews">
              <div class="border rounded p-3 mb-3">
                <div class="d-flex justify-content-between">
                  <div class="fw-semibold">John Doe</div>
                  <div class="small text-muted">2 days ago</div>
                </div>
                <div class="mb-1">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </div>
                <div>Great book, very practical tips!</div>
              </div>
              <div class="text-center text-muted py-4">
                <i class="bi bi-chat-square-text fs-3 d-block mb-2"></i>
                No more reviews yet.
              </div>
            </div>

            <!-- Issue History -->
            <div class="tab-pane fade" id="history">
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>Member</th>
                      <th>Issued On</th>
                      <th>Due Date</th>
                      <th>Returned On</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="fw-medium">Alice Johnson</td>
                      <td>01 Aug 2025</td>
                      <td>15 Aug 2025</td>
                      <td>14 Aug 2025</td>
                      <td><span class="badge text-bg-success">Returned</span></td>
                    </tr>
                    <tr>
                      <td class="fw-medium">Bob Smith</td>
                      <td>20 Aug 2025</td>
                      <td>03 Sep 2025</td>
                      <td>—</td>
                      <td><span class="badge text-bg-warning">Issued</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Similar Books -->
          <div class="mt-4">
            <h6 class="mb-3">Similar Books</h6>
            <div class="row row-cols-2 row-cols-md-4 g-3">
              <div class="col">
                <a href="#" class="text-decoration-none">
                  <div class="card h-100 border-0 shadow-sm">
                    <img src="https://picsum.photos/200/300" class="card-img-top" alt="">
                    <div class="card-body">
                      <div class="small fw-semibold text-truncate">The Power of Habit</div>
                      <div class="small text-muted text-truncate">Charles Duhigg</div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="#" class="text-decoration-none">
                  <div class="card h-100 border-0 shadow-sm">
                    <img src="https://picsum.photos/201/300" class="card-img-top" alt="">
                    <div class="card-body">
                      <div class="small fw-semibold text-truncate">Deep Work</div>
                      <div class="small text-muted text-truncate">Cal Newport</div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
@include('layouts.footer')

@endsection
