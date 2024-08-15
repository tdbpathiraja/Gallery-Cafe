<?php
session_start();

if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
}

include 'assets/database/db-connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Gallery Cafe</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/Gallery Cafe Logo.png" rel="icon" />
  <link href="assets/img/Gallery Cafe Logo.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Support FrontEnd Libraries CSS Files -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+94 76 623 8875</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 08AM - 10PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0">
        <a href="index.php">Gallery Cafe</a>
      </h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="about.php">About</a></li>
          <li class="dropdown">
            <a href="menu.php"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="pages/menu/breakfast.php">Breakfast</a></li>
              <li><a href="pages/menu/lunch.php">Lunch</a></li>
              <li><a href="pages/menu/tea-time.php">Tea Time</a></li>
              <li><a href="pages/menu/dinner.php">Dinner</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="promotions.php">Promotions</a></li>
          <li>
            <a class="nav-link" href="special-events.php">Special Events</a>
          </li>
          <li class="dropdown">
            <a href="booking.php"><span>Booking</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="pages/booking/table-reservation.php">Book a Table</a>
              </li>
              <li>
                <a href="pages/booking/pre-order.php">Pre Order Foods</a>
              </li>
              <li>
                <a href="pages/booking/pre-order.php">Book Your Event</a>
              </li>
            </ul>
          </li>
          <li><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
      <?php if (isset($_SESSION['username'])) : ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="pages/account/my-account.php">My Bookings</a>
      <?php else : ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="pages/account/login.php">Login</a>
      <?php endif; ?>
    </div>
  </header>
  

  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Privacy Policy</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Privacy Policy</li>
        </ol>
      </div>
    </div>
  </section>

  <!-- ======= Privacy Policy ======= -->
  <section id="terms" class="terms">
    <div class="container" data-aos="fade-up">
      <h2>Privacy Policy</h2>
      <p>Your privacy is important to us. This privacy policy explains how we collect, use, and protect your personal information.</p>

      <h3>1. Information We Collect</h3>
      <p>We collect information from you when you register on our site, place an order, subscribe to our newsletter, or fill out a form. The information collected may include your name, email address, phone number, and payment information.</p>

      <h3>2. How We Use Your Information</h3>
      <p>The information we collect from you may be used in the following ways:</p>
      <ul>
        <li>To personalize your experience</li>
        <li>To improve our website</li>
        <li>To process transactions</li>
        <li>To send periodic emails</li>
      </ul>

      <h3>3. How We Protect Your Information</h3>
      <p>We implement a variety of security measures to maintain the safety of your personal information. Your personal information is contained behind secured networks and is only accessible by a limited number of persons who have special access rights to such systems.</p>

      <h3>4. Disclosure to Third Parties</h3>
      <p>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential.</p>

      <h3>5. Third-Party Links</h3>
      <p>Occasionally, at our discretion, we may include or offer third-party products or services on our website. These third-party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites.</p>

      <h3>6. Changes to Our Privacy Policy</h3>
      <p>We reserve the right to modify this privacy policy at any time. If we decide to change our privacy policy, we will post those changes on this page.</p>

      <h3>7. Contacting Us</h3>
      <p>If there are any questions regarding this privacy policy, you may contact us using the information below:</p>
      <p>Gallery Cafe<br />2 Alfred House Road<br />Colombo 3, Sri Lanka<br />Email: info@gallerycafe.com</p>
    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Gallery Cafe</h3>
              <p>
                2 ALFRED HOUSE ROAD <br />
                COLOMBO 3 SRI LANKA<br /><br />
                <strong>Phone:</strong> +94 11 258 2162 <br />
                <strong>Email:</strong> info@gallerycafe.com<br />
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Important</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="index.php">Home</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="about.php">About us</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="menu.php">Menu</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="terms-of-services.php">Terms of service</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="privacy-policy.php">Privacy policy</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="pages/booking/table-reservation.php">Book a Seat</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="pages/booking/pre-order.php">Pre Order Foods</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="promotions.php">Our Promotions</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="special-events.php">Special Events</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="pages/menu/special.html">Special Foods</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Get our Latest Menu and Events Updates to your email.</p>
            <form action="" method="post">
              <input type="email" name="email" /><input type="submit" value="Subscribe" />
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright
        <strong><span>ICBT | CSE-5009 WAD Module Project </span></strong>. All
        Rights Reserved
      </div>
      <div class="credits">
        Designed by
        <a href="https://github.com/tdbpathiraja">Tharindu Darshana</a>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Third-Party JavaScript Libraries -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main JS Files -->
  <script src="assets/js/main.js"></script>
</body>

</html>