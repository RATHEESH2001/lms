    @extends('app')
    @section('content')
    <style>/* ========== LIBRARY HOME ========== */
    .library-home {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #1e293b;
    background: #f8fafc;
    }

    /* --- Search Section --- */
    .search-container {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, #2563eb, #1e40af);
    color: #fff;
    }

    .search-container h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    }

    .search-box {
    display: flex;
    justify-content: center;
    max-width: 500px;
    margin: 0 auto;
    gap: 10px;
    }

    .search-box input {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px;
    outline: none;
    font-size: 1rem;
    }

    .search-box button {
    background: #fbbf24;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
    }

    .search-box button:hover {
    background: #f59e0b;
    }

    /* --- Features --- */
    .features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    padding: 60px 20px;
    }

    .feature-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.3s ease;
    }

    .feature-card:hover {
    transform: translateY(-5px);
    }

    .feature-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    }

    .feature-content {
    padding: 20px;
    }

    .feature-content h3 {
    margin-bottom: 10px;
    color: #1e3a8a;
    }

    /* --- Stats --- */
    .stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
    padding: 40px 20px;
    text-align: center;
    background: #f1f5f9;
    }

    .stat-card {
    background: #fff;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }

    .stat-card h3 {
    font-size: 1.8rem;
    color: #2563eb;
    margin-bottom: 10px;
    }

    /* --- New Arrivals --- */
    .recent-books {
    padding: 60px 20px;
    }

    .section-title {
    font-size: 1.6rem;
    margin-bottom: 30px;
    text-align: center;
    color: #1e3a8a;
    }

    .books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    }

    .book-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease;
    }

    .book-card:hover {
    transform: translateY(-5px);
    }

    .book-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    }

    .book-info {
    padding: 15px;
    }

    .book-info h4 {
    font-size: 1rem;
    margin-bottom: 5px;
    }

    .status {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    margin-top: 8px;
    }

    .status.available {
    background: #dcfce7;
    color: #166534;
    }

    .status.borrowed {
    background: #fee2e2;
    color: #991b1b;
    }

    /* --- Quick Links --- */
    .quick-links {
    padding: 60px 20px;
    background: #f9fafb;
    }

    .links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    margin-top: 20px;
    }

    .link-card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    display: flex;
    align-items: center;
    gap: 12px;
    transition: transform 0.3s ease;
    cursor: pointer;
    }

    .link-card:hover {
    transform: translateY(-4px);
    background: #eff6ff;
    }

    .link-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #2563eb;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .link-card h4 {
    font-size: 1rem;
    margin: 0;
    color: #1e293b;
    }

    /* --- Responsive --- */
    @media (max-width: 600px) {
    .search-box {
        flex-direction: column;
    }
    .search-box button {
        width: 100%;
    }
    }
    .search-dropdown {
  position: absolute;
  background: #fff;
  color: #000;
  width: 100%;
  max-width: 500px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  margin-top: 5px;
  display: none;
  z-index: 1000;
  overflow: hidden;
}

.dropdown-item {
  display: block;
  padding: 10px 15px;
  border-bottom: 1px solid #f1f5f9;
  text-decoration: none;
  color: #1e293b;
  transition: background 0.2s ease;
}

.dropdown-item:hover {
  background: #eff6ff;
}

.dropdown-item.disabled {
  color: #94a3b8;
  cursor: default;
  pointer-events: none;
}

    </style>
    <div class="library-home">

        @include('layouts.header')

        <div class="search-container">
            <h2>Find Books, Articles, and More</h2>
            <div class="search-box">
                {{-- <form action="{{ route('home.search') }}" method="GET" >
                <input type="text" name="query"  placeholder="Search by title, author, ISBN..." value="{{ request('query') }}">
                <button  type="submit">Search</button>
    </form> --}}
    {{-- <form action="{{ route('home.search') }}" method="GET">
    <input type="text" name="query" placeholder="Search by title, author, ISBN..." value="{{ request('query') }}">
    <button type="submit">Search</button>
</form> --}}
<form action="{{ route('home.search') }}" method="GET" id="searchForm" autocomplete="off">
    <input type="text" name="query" id="searchInput"
        placeholder="Search by title, author, ISBN..." value="{{ request('query') }}">
    <button type="submit">Search</button>

    <div id="searchDropdown" class="search-dropdown"></div>
</form>



            </div>
        </div>

        <main>
            <!-- Features Section -->
            <section class="features">
                <div class="feature-card">
                    <img src="/api/placeholder/400/150" alt="Borrow Books">
                    <div class="feature-content">
                        <h3>Borrow Books</h3>
                        <p>Browse our extensive collection and borrow your favorite titles with just a few clicks.</p>
                    </div>
                </div>
                <div class="feature-card">
                    <img src="/api/placeholder/400/150" alt="Digital Resources">
                    <div class="feature-content">
                        <h3>Digital Resources</h3>
                        <p>Access e-books, audiobooks, and research papers from anywhere at any time.</p>
                    </div>
                </div>
                <div class="feature-card">
                    <img src="/api/placeholder/400/150" alt="Community Events">
                    <div class="feature-content">
                        <h3>Events & Programs</h3>
                        <p>Join our reading clubs, workshops, and educational programs for all ages.</p>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats">
                <div class="stat-card">
                    <h3>10,000+</h3>
                    <p>Books</p>
                </div>
                <div class="stat-card">
                    <h3>5,000+</h3>
                    <p>E-Books</p>
                </div>
                <div class="stat-card">
                    <h3>1,200+</h3>
                    <p>Members</p>
                </div>
                <div class="stat-card">
                    <h3>24/7</h3>
                    <p>Online Access</p>
                </div>
            </section>

            <section class="recent-books">
                <h2 class="section-title">New Arrivals</h2>
                <div class="books-grid">
                    @foreach($categories as $category)
                    <div class="book-card">
                        <img src="/api/placeholder/200/300" alt="Book Cover">
                        <div class="book-info">
                            <h4> <a href="{{ url('/home/book_categories/' . $category) }}">
                    {{ $category }}
                </a></h4>
                            <p>Alex Michaelides</p>
                            <span class="status available">Available</span>
                        </div>
                    </div>
                @endforeach

                    {{-- <div class="book-card">
                        <img src="/api/placeholder/200/300" alt="Book Cover">
                        <div class="book-info">
                            <h4>Atomic Habits</h4>
                            <p>James Clear</p>
                            <span class="status available">Available</span>
                        </div>
                    </div>
                    <div class="book-card">
                        <img src="/api/placeholder/200/300" alt="Book Cover">
                        <div class="book-info">
                            <h4>Educated</h4>
                            <p>Tara Westover</p>
                            <span class="status borrowed">Borrowed</span>
                        </div>
                    </div>
                    <div class="book-card">
                        <img src="/api/placeholder/200/300" alt="Book Cover">
                        <div class="book-info">
                            <h4>The Midnight Library</h4>
                            <p>Matt Haig</p>
                            <span class="status available">Available</span>
                        </div>
                    </div>
                    <div class="book-card">
                        <img src="/api/placeholder/200/300" alt="Book Cover">
                        <div class="book-info">
                            <h4>Project Hail Mary</h4>
                            <p>Andy Weir</p>
                            <span class="status borrowed">Borrowed</span>
                        </div>
                    </div> --}}
                </div>
            </section>

            <!-- Quick Links -->
            <section class="quick-links">
                <h2 class="section-title">Quick Services</h2>
                <div class="links-grid">
                    <div class="link-card">
                        <div class="link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </div>
                        <div>
                            <h4>Reserve a Book</h4>
                        </div>
                    </div>
                    <div class="link-card">
                        <div class="link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4>Renew Loan</h4>
                        </div>
                    </div>
                    <div class="link-card">
                        <div class="link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h4>Check Fines</h4>
                        </div>
                    </div>
                    <div class="link-card">
                        <div class="link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div>
                            <h4>Room Booking</h4>
                        </div>
                    </div>
                </div>
            </section>
        </main>


    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    const dropdown = document.getElementById('searchDropdown');

    let timeout = null;

    input.addEventListener('keyup', function () {
        const query = input.value.trim();
        clearTimeout(timeout);

        if (query.length < 2) {
            dropdown.style.display = 'none';
            return;
        }

        timeout = setTimeout(() => {
            fetch(`/home/search/ajax?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        dropdown.innerHTML = '<div class="dropdown-item disabled">No results found</div>';
                    } else {
                        dropdown.innerHTML = data.map(book => `
                            <a href="/books/${book.id}" class="dropdown-item">
                                <strong>${book.title}</strong><br>
                                <small>${book.author}</small>
                            </a>
                        `).join('');
                    }
                    dropdown.style.display = 'block';
                })
                .catch(err => console.error(err));
        }, 300);
    });

    // Hide dropdown if clicked outside
    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && e.target !== input) {
            dropdown.style.display = 'none';
        }
    });
});
</script>

    @include('layouts.footer')
    @endsection
