
    @extends('app')
@section('content')
<style>/* Header Container */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #1e3a8a; /* deep blue */
    padding: 15px 30px;
    color: #fff;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* Logo */
.header-container .logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-container .logo h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
}

/* Navigation */
.header-container nav ul {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.header-container nav ul li a {
    text-decoration: none;
    color: #f1f5f9; /* light gray */
    font-weight: 500;
    transition: color 0.3s ease;
}

.header-container nav ul li a:hover {
    color: #38bdf8; /* light blue */
}

/* Logout button inside nav */
.header-container nav ul form button {
    cursor: pointer;
    font-weight: 500;
    transition: background 0.3s ease;
}

.header-container nav ul form button:hover {
    background: #c53030; /* darker red on hover */
}

/* Responsive */
@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        align-items: flex-start;
    }

    .header-container nav ul {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        margin-top: 15px;
    }
}
</style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Bootstrap Icons (for bi bi-eye, bi-plus-lg etc.) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<div class="header-container">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                <h1>LibraryHub</h1>
            </div>
            <nav>
                <ul>
                  <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="{{ url('/profile') }}">My Account</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Admin</a></li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="padding: 8px 16px; background: #e3342f; color: white; border: none; border-radius: 4px;">
                            Logout
                        </button>
                    </form>

                </ul>
            </nav>
        </div>
