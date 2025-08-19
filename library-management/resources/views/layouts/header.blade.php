
    @extends('app')
@section('content')
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
