@extends('app')
@section('content')

<div class="library-home">

    @include('layouts.header')

    <div class="search-container">
        <h2>Find Books, Articles, and More</h2>
        <div class="search-box">
            <input type="text" placeholder="Search by title, author, ISBN...">
            <button>Search</button>
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

        <!-- Recent Books -->
        <section class="recent-books">
            <h2 class="section-title">New Arrivals</h2>
            <div class="books-grid">
                <div class="book-card">
                    <img src="/api/placeholder/200/300" alt="Book Cover">
                    <div class="book-info">
                        <h4>The Silent Patient</h4>
                        <p>Alex Michaelides</p>
                        <span class="status available">Available</span>
                    </div>
                </div>
                <div class="book-card">
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
                </div>
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

    @include('layouts.footer')

</div>
@endsection
