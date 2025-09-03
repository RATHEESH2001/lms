<style>/* ========== FOOTER ========== */
footer {
  background: #1e293b; /* dark slate */
  color: #f1f5f9;
  padding: 40px 20px 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  margin-bottom: 30px;
}

/* Sections */
.footer-section h3 {
  font-size: 1.2rem;
  margin-bottom: 15px;
  font-weight: 600;
  color: #93c5fd; /* light blue */
}

.footer-section p,
.footer-section ul,
.footer-section li {
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

.footer-section ul {
  list-style: none;
}

.footer-section ul li {
  margin-bottom: 8px;
}

.footer-section ul li a {
  color: #f1f5f9;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer-section ul li a:hover {
  color: #60a5fa; /* hover blue */
}

/* Bottom */
.footer-bottom {
  border-top: 1px solid #334155;
  padding-top: 15px;
  text-align: center;
  font-size: 0.9rem;
  color: #94a3b8;
}

/* Responsive */
@media (max-width: 600px) {
  footer {
    text-align: center;
  }
  .footer-section h3 {
    margin-top: 10px;
  }
}
</style>
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
