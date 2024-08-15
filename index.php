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

  <title>Gallery Cafe ™</title>
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
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 07AM - 12AM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0">
        <a href="#">Gallery Cafe</a>
      </h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
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
 

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Gallery Cafe</span></h1>
          <h2>Best and Quality Foods in Sri Lanka!!</h2>

          <div class="btns">
            <a href="menu.php" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="booking.php" class="btn-book animated fadeInUp scrollto">Bookings</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=fS8Rc2DqMJA" class="glightbox play-btn"></a>
        </div>
      </div>
    </div>
  </section>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Fresh Ingredients</h4>
              <p>
                We believe in using only the freshest and finest ingredients in all our dishes, ensuring you enjoy a flavorful and healthy dining experience.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Exceptional Service</h4>
              <p>
                Our staff is dedicated to providing exceptional service, making sure every visit is memorable and every meal is enjoyed to the fullest.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Cozy Ambiance</h4>
              <p>
                Enjoy your meal in a warm and inviting atmosphere, perfect for everything from casual lunches to romantic dinners.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="Gallery Cafe Interior" />
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Welcome to Gallery Cafe</h3>
            <p class="fst-italic">
              Serving our community since 2023, Gallery Cafe is dedicated to enriching lives through culinary excellence and community engagement.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Locally sourced ingredients for fresh, flavorful dishes.</li>
              <li><i class="bi bi-check-circle"></i> Seasonal menu crafted by our award-winning chefs.</li>
              <li><i class="bi bi-check-circle"></i> Relaxing atmosphere perfect for intimate gatherings or business lunches.</li>
            </ul>
            <p>
              Indulge in a culinary journey where every dish tells a story. At Gallery Cafe, our mission is to foster connections through exceptional food experiences that inspire and delight. We believe in using sustainable practices and supporting local producers to ensure every meal reflects our commitment to quality and community. Join us and discover why we have been a beloved destination for food enthusiasts and casual diners alike since [2023].
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <?php
              //Fetch Special Foods
              $sql = "SELECT * FROM SpecialMeals";
              $result = $conn->query($sql);

              if ($result === false) {
                die("Error executing query: " . $conn->error);
              }

              if ($result->num_rows > 0) {
                $first = true;
                while ($row = $result->fetch_assoc()) {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link' . ($first ? ' active show' : '') . '" data-bs-toggle="tab" href="#tab-' . $row['id'] . '">' . $row['name'] . '</a>';
                  echo '</li>';
                  $first = false;
                }
              } else {
                echo "No specials found.";
              }
              ?>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <?php
              $result->data_seek(0);
              $first = true;
              while ($row = $result->fetch_assoc()) {
                echo '<div class="tab-pane' . ($first ? ' active show' : '') . '" id="tab-' . $row['id'] . '">';
                echo '<div class="row">';
                echo '<div class="col-lg-8 details order-2 order-lg-1">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p class="fst-italic">' . $row['ingredients'] . '</p>';
                echo '<p>' . $row['description'] . '</p>';
                echo '</div>';
                echo '<div class="col-lg-4 text-center order-1 order-lg-2">';
                echo '<img src="assets/img/menu/' . $row['image_url'] . '" alt="" class="img-fluid" />';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $first = false;
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Special Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Special Events</h2>
          <p>Events on Our Restaurant</p>
        </div>

        <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
            // fetch special events
            $sql = "SELECT * FROM special_events";
            $result = $conn->query($sql);

            if ($result === false) {
              die("Error executing query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="swiper-slide">';
                echo '<div class="row event-item">';
                echo '<div class="col-lg-6">';
                echo '<img src="assets/img/special-events/' . $row['image'] . '" class="img-fluid" alt="" />';
                echo '</div>';
                echo '<div class="col-lg-6 pt-4 pt-lg-0 content">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<div class="price">';
                echo '<p><span>' . date("F j, Y", strtotime($row['date'])) . ' at ' . date("h:i A", strtotime($row['time'])) . '</span></p>';
                echo '</div>';
                echo '<p class="fst-italic">' . $row['description'] . '</p>';
                echo '<ul>';
                echo '<li><i class="bi bi-check-circled"></i> Location: ' . $row['location'] . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo "No events found.";
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <!-- ======= Booking Options ======= -->
    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Bookings</h2>
          <p>All the Booking Options</p>
        </div>
        <div class="bookingcards-container">
          <div class="booking-card">
            <img src="assets/img/booking/table-booking-banner.svg" alt="Table Booking Banner">
            <div class="bookingcard-content">
              <h3>Reserve a Table</h3>
              <p>Whether it's a romantic dinner, breakfast or a casual lunch, reserve your table for an unforgettable dining experience.</p>
            </div>
            <div class="bookingcard-banner">
              <a href="pages/booking/table-reservation.php"><button class="booking-button">Reserve Now</button></a>
            </div>
          </div>
          <div class="booking-card">
            <img src="assets/img/booking/pre-order-foods-banner.svg" alt="Pre Order Foods Banner">
            <div class="bookingcard-content">
              <h3>Pre Order Foods</h3>
              <p>Plan ahead for your event with our pre-order food service. Select your favorites and ensure a seamless dining experience.</p>
            </div>
            <div class="bookingcard-banner">
              <a href="pages/booking/pre-order.php"><button class="booking-button">Pre Order Now</button></a>
            </div>
          </div>
          <div class="booking-card">
            <img src="assets/img/booking/book a event-banner.svg" alt="Book a Event Banner">
            <div class="bookingcard-content">
              <h3>Book Your Event</h3>
              <p>Host your special event with us. From birthdays to corporate gatherings, we offer customizable event spaces and catering services.</p>
            </div>
            <div class="bookingcard-banner">
              <a href="pages/booking/table-reservation.php"><button class="booking-button">Book Your Event Now</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
            //fetch testimonials
            $sql = "SELECT * FROM testimonials";
            $result = $conn->query($sql);

            if ($result === false) {
              die("Error executing query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="swiper-slide">';
                echo '<div class="testimonial-item">';
                echo '<p><i class="bx bxs-quote-alt-left quote-icon-left"></i>' . $row['quote'] . '<i class="bx bxs-quote-alt-right quote-icon-right"></i></p>';
                echo '<img src="assets/img/testimonials/' . $row['image'] . '" class="testimonial-img" alt="" />';
                echo '<h3>' . $row['author'] . '</h3>';
                echo '<h4>' . $row['position'] . '</h4>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo "No testimonials found.";
            }

            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">
          <?php
          //fetch gallery images
          $sql = "SELECT * FROM gallery";
          $result = $conn->query($sql);

          if ($result === false) {
            die("Error executing query: " . $conn->error);
          }

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="col-lg-3 col-md-4">';
              echo '<div class="gallery-item">';
              echo '<a href="assets/img/gallery/' . $row['image_url'] . '" class="gallery-lightbox" data-gall="gallery-item">';
              echo '<img src="assets/img/gallery/' . $row['image_url'] . '" alt="' . $row['alt_text'] . '" class="img-fluid" />';
              echo '</a>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo "No gallery images found.";
          }

          ?>
        </div>
      </div>
    </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Gallery Cafe ™</h3>
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


  <!-- Popup Shop Close Screen -->
  <?php

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //Fetch shop close information from the database
  $sql = "SELECT * FROM closure_info ORDER BY id DESC LIMIT 1";
  $result = $conn->query($sql);


  if ($result === false) {
    die("Error executing query: " . $conn->error);
  }

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $startDate = date('F jS', strtotime($row['start_date']));
    $endDate = date('F jS', strtotime($row['end_date']));
    $closeReason = htmlspecialchars($row['close_reason']);
    $displayMessage = $row['display_message'];

    if ($displayMessage == 1) {
      echo '<div id="popup" class="popup-closeshop">';
      echo '    <div class="popup-content">';
      echo '        <span class="close-btn" onclick="closePopup()">&times;</span>';
      echo '        <h1>We are Closed!!</h1>';
      echo '        <div class="closed-dates">';
      echo '            <p><strong>Closed Dates:</strong> ' . $startDate . ' - ' . $endDate . '</p>';
      echo '        </div>';
      echo '        <div class="close-reason">';
      echo '            <p><strong>Close Reason:</strong> ' . $closeReason . '</p>';
      echo '        </div>';
      echo '        <div class="note">';
      echo '            <p>We hope you are enjoying your dining experiences at Gallery Cafe™. During these dates, we kindly request that you <b>do not place any pre-orders or book any halls or tables.</b> We apologize for any inconvenience this may cause and thank you for your understanding. We look forward to serving you again soon.</p>';
      echo '        </div>';
      echo '    </div>';
      echo '</div>';
    }
  } else {
    echo "<p>Ignore this Popup Message</p>";
  }

  $conn->close();
  ?>


  <!-- Third-Party JavaScript Libraries -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main JS Files -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/popup.js"></script>
</body>

</html>