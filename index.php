<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LookWork</title>
    <link rel="stylesheet" href="aset/css/index.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo" >LookWork</div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">LookWork</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <div class="slider">
        <div class="slide">
            <img src="image/banner1.png" alt="Banner 1" class="banner-image">
        </div>
        <div class="slide">
            <img src="image/banner3.png" alt="Banner 2" class="banner-image">
        </div>
        <div class="slide">
            <img src="image/banner4.png" alt="Banner 3" class="banner-image">
        </div>
        <!-- Tambahkan lebih banyak slide jika perlu -->
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>

    <section id="about" class="about-section">
        <h2>About Us</h2>
        <p>We are a team of creative individuals passionate about modern web design and development. Our mission is to provide stunning web experiences with smooth navigation and clean code.</p>
    </section>

        <section id="services" class="services-section">
        <h2>LookWork</h2>
        <div class="service-cards">
            <div class="card">
                <h3>Web Design</h3>
                <p>Creating beautiful, modern, and responsive designs that adapt to all devices.</p>
            </div>
            <div class="card">
                <h3>Development</h3>
                <p>Building secure and scalable web applications tailored to your business needs.</p>
            </div>
            <div class="card">
                <h3>SEO Optimization</h3>
                <p>Improving your website's visibility and ranking on search engines.</p>
            </div>
        </div>
        <button class="seek-job" onclick="window.location.href='jobseek.php'">look for job</button>
    </section>



    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    

    <footer>
        <p>&copy; 2024 LookWork. All Rights Reserved.</p>
    </footer>

    <script src="aset/js/index.js"></script>
</body>
</html>
