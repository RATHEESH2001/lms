@extends('app')

@section('title', 'Books')
@include('layouts.header')

@section('content')
<div class="container py-4">


<a href="{{ url('/home') }}">⬅ Back to Categories</a>

  {{-- Header --}}
  <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0">Books</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
      <i class="bi bi-plus-lg me-1"></i> Add Book
    </button>
  </div>

  {{-- Search + Filters --}}
  <div class="card card-body mb-3 shadow-sm border-0">
    <div class="row g-2">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control" placeholder="Search by title, author, ISBN...">
        </div>
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option>All Categories</option>
          <option>Fiction</option>
          <option>Science</option>
        </select>
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option>Status</option>
          <option>Available</option>
          <option>Checked Out</option>
        </select>
      </div>
    </div>
  </div>

  {{-- Table View --}}
  <div class="table-responsive bg-white border rounded shadow-sm">
    <table class="table align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th>Book</th>
          <th>Author</th>
          <th>Category</th>
          <th>ISBN</th>
          <th>Status</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="https://via.placeholder.com/40x60" alt="cover" class="book-cover">
              <div>
                <div class="fw-semibold">Book Title</div>
                <div class="text-muted small">#001</div>
              </div>
            </div>
          </td>
          <td>Author Name</td>
          <td>Fiction</td>
          <td>123456789</td>
          <td><span class="badge bg-success">Available</span></td>
          <td class="text-end">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <img src="https://via.placeholder.com/40x60" alt="cover" class="book-cover">
              <div>
                <div class="fw-semibold">Another Book</div>
                <div class="text-muted small">#002</div>
              </div>
            </div>
          </td>
          <td>Another Author</td>
          <td>Science</td>
          <td>987654321</td>
          <td><span class="badge bg-warning">Checked Out</span></td>
          <td class="text-end">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- Empty State (optional) --}}
  <div class="text-center py-5 d-none" id="emptyState">
    <i class="bi bi-book text-secondary" style="font-size: 3rem;"></i>
    <p class="mt-2 text-muted">No books found</p>
  </div>

  {{-- Pagination --}}
  <nav class="mt-3">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled"><a class="page-link">Previous</a></li>
      <li class="page-item active"><a class="page-link">1</a></li>
      <li class="page-item"><a class="page-link">2</a></li>
      <li class="page-item"><a class="page-link">3</a></li>
      <li class="page-item"><a class="page-link">Next</a></li>
    </ul>
  </nav>

</div>

{{-- Add Book Modal --}}
<div class="modal fade" id="addBookModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Add Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" class="form-control" placeholder="Enter title">
          </div>
          <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" placeholder="Enter author">
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select">
              <option>Fiction</option>
              <option>Science</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" class="form-control" placeholder="Enter ISBN">
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select">
              <option>Available</option>
              <option>Checked Out</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')

@endsection

@push('styles')
<style>
/* === Books Page Styles === */
h1.h3 { font-weight: 600; color: #2c3e50; }
.btn-primary { border-radius: 8px; padding: 6px 16px; font-weight: 500; }
.card-body { background: #f9fafb; border-radius: 12px; border: 1px solid #e5e7eb; }
.input-group-text { background: #fff; border-right: none; }
.input-group .form-control { border-left: none; }
.table { border-radius: 12px; overflow: hidden; }
.table thead th { font-size: 14px; font-weight: 600; color: #374151; text-transform: uppercase; letter-spacing: 0.03em; }
.table tbody td { vertical-align: middle; font-size: 14px; }
.book-cover { width: 42px; height: 60px; object-fit: cover; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
.fw-semibold { font-weight: 600; color: #111827; }
.text-muted.small { font-size: 12px; }
.badge { font-size: 12px; font-weight: 500; padding: 6px 10px; border-radius: 8px; }
.badge.bg-success { background-color: #10b981 !important; }
.badge.bg-warning { background-color: #f59e0b !important; color: #111; }
.badge.bg-danger { background-color: #ef4444 !important; }
.table .btn { border-radius: 6px; padding: 4px 8px; }
.table .btn-outline-secondary { color: #6b7280; border-color: #d1d5db; }
.table .btn-outline-secondary:hover { background: #f3f4f6; }
.table .btn-outline-danger { border-color: #fca5a5; color: #ef4444; }
.table .btn-outline-danger:hover { background: #fee2e2; }
.pagination .page-link { border-radius: 6px; margin: 0 2px; font-size: 14px; }
.pagination .active .page-link { background-color: #2563eb; border-color: #2563eb; }
</style>
@endpush
