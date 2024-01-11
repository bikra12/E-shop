<style>
    .ecommerce-footer {
        background-color: #4449c9;
        color: #FFF;
        padding: 40px 0;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
    }

    .footer-section {
        flex: 1;
        padding: 0 15px;
    }

    .footer-heading {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #FFF;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: #4F81D4;
    }

    .social-icons {
        display: flex;
        gap: 10px;
    }

    .social-icons a {
        color: #FFF;
        font-size: 24px;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #4F81D4;
    }

    /* Optional: Newsletter form styling */
    .newsletter-form {
        display: flex;
        gap: 10px;
    }

    .newsletter-form input {
        padding: 10px;
        border: none;
        border-radius: 4px;
    }

    .newsletter-form button {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        background-color: #4F81D4;
        color: #FFF;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .newsletter-form button:hover {
        background-color: #3F6AB7;
    }
</style>

<!-- E-commerce Footer -->
<div class="ecommerce-footer">
    <div class="footer-container">
        <!-- Section 1: About Us -->
        <div class="footer-section">
            <h4 class="footer-heading">About Us</h4>
            <p>Premium online shopping destination. Curated collections, top brands. Delivering quality,and
                value since 7 years shopping with us.</p>
        </div>

        <!-- Section 2: Quick Links -->
        <div class="footer-section">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="{{ url('/contactUs') }}">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>

        <!-- Section 3: Contact Us -->
        <div class="footer-section">
            <h4 class="footer-heading">Contact Us</h4>
            <ul class="footer-links">
                <li>Dalkhola,India</li>
                <li>Dalkhola, WestBengal 733201</li>
                <li>Email: bikrambaidya301@gmail.com</li>
            </ul>
        </div>

        <!-- Section 4: Stay Connected -->
        <div class="footer-section">
            <h4 class="footer-heading">Stay Connected</h4>
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/bikram-baidya-004055241/" target="_blank"><i class="fab fa-linkedin"></i></a>

            </div>
            <!-- Optional: Newsletter Signup -->
            {{-- <div class="newsletter-form">
                <input type="email" placeholder="Enter your email">
                <button type="submit">Subscribe</button>
            </div> --}}
        </div>
    </div>
</div>
