
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #1e3a8a;
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            margin-left: 10px;
            font-size: 1.8rem;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #2c4da7;
        }

        .search-container {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b5bdb 100%);
            padding: 2rem;
            text-align: center;
            color: white;
        }

        .search-box {
            max-width: 700px;
            margin: 2rem auto 0;
            display: flex;
        }

        .search-box input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 4px 0 0 4px;
            font-size: 1rem;
            outline: none;
        }

        .search-box button {
            padding: 0 20px;
            background-color: #fbbf24;
            color: #1e3a8a;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #f59e0b;
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 2rem;
        }

        .feature-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
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

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #1e3a8a;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
        }

        .recent-books {
            margin-bottom: 2rem;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
        }

        .book-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
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

        .book-info p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .status {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .available {
            background-color: #d1fae5;
            color: #065f46;
        }

        .borrowed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .stat-card h3 {
            color: #1e3a8a;
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #666;
        }

        .quick-links {
            margin-bottom: 2rem;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .link-card {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .link-card:hover {
            background-color: #f0f4ff;
        }

        .link-icon {
            width: 40px;
            height: 40px;
            background-color: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #1e3a8a;
            font-size: 1.2rem;
        }

        footer {
            background-color: #1e3a8a;
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 15px;
                justify-content: center;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }

            nav ul li {
                margin-left: 10px;
                margin-right: 10px;
            }
        }
    </style>


<header>
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
    </header>

    <div class="search-container">
        <h2>Find Books, Articles, and More</h2>
        <div class="search-box">
            <input type="text" placeholder="Search by title, author, ISBN...">
            <button>Search</button>
        </div>
    </div>

    <main>
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

        <section class="quick-links">
            <h2 class="section-title">Quick Services</h2>
            <div class="links-grid">
                <div class="link-card">
                    <div class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>LibraryHub is dedicated to providing resources and services that meet the educational, informational and cultural needs of our community.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Library Catalog</a></li>
                    <li><a href="#">E-Resources</a></li>
                    <li><a href="#">Research Help</a></li>
                    <li><a href="#">Events Calendar</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <ul>
                    <li>Address: 123 Library Street, Booktown</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Email: info@libraryhub.com</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Hours</h3>
                <ul>
                    <li>Monday - Thursday: 9am - 8pm</li>
                    <li>Friday - Saturday: 9am - 5pm</li>
                    <li>Sunday: 1pm - 5pm</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 LibraryHub Library Management System. All rights reserved.</p>
        </div>
    </footer>

