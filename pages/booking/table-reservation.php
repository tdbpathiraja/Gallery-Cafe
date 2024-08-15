<?php
session_start();

if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
}

include '../../assets/database/db-connection.php';
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
  <link href="../../assets/img/Gallery Cafe Logo.png" rel="icon" />
  <link href="../../assets/img/Gallery Cafe Logo.png" rel="apple-touch-icon" />

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
  <link href="../../assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+94 76 623 8875</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 07AM - 12PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0">
        <a href="../../index.php">Gallery Cafe</a>
      </h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link" href="../../index.php">Home</a></li>
          <li><a class="nav-link" href="../../about.php">About</a></li>
          <li class="dropdown">
            <a href="../../menu.php"><span>Menu</span> <i class="bi bi-chevron-down active"></i></a>
            <ul>
              <li><a href="breakfast.php">Breakfast</a></li>
              <li><a href="lunch.php">Lunch</a></li>
              <li><a href="tea-time.php">Tea Time</a></li>
              <li><a href="dinner.php">Dinner</a></li>
            </ul>
          </li>
          <li>
            <a class="nav-link" href="../../promotions.php">Promotions</a>
          </li>
          <li>
            <a class="nav-link" href="../../special-events.php">Special Events</a>
          </li>
          <li class="dropdown">
            <a href="../../booking.php"><span>Booking</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="../booking/table-reservation.php">Book a Table</a>
              </li>
              <li>
                <a href="../booking/pre-order.php">Pre Order Foods</a>
              </li>
              <li>
                <a href="../booking/pre-order.php">Book Your Event</a>
              </li>
            </ul>
          </li>
          <li><a class="nav-link" href="../../contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
      <?php if (isset($_SESSION['username'])) : ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../account/my-account.php">My Bookings</a>
      <?php else : ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../account/login.php">Login</a>
      <?php endif; ?>
    </div>
  </header>
  

  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Table Reservation</h2>
        <ol>
          <li><a href="../../index.php">Home</a></li>
          <li>Booking</li>
          <li>Table Reservation</li>
          </li>
        </ol>
      </div>
    </div>
  </section>


  <!-- ======= Table Information ======= -->
  <section id="table-info" class="table-info">
    <div class="container" data-aos="fade-up">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          //fetch table categories
          $sql = "SELECT * FROM tables_info";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="swiper-slide">
                <div class="table-category">
                  <img src="../../assets/img/booking/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['category_name']); ?>">
                  <div class="description-box">
                    <h3><?php echo htmlspecialchars($row['category_name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "No table categories found.";
          }
          ?>
        </div>
        
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- ======= Book A Table Section ======= -->
  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Reservation</h2>
        <p>Book a Table</p>
      </div>

      <?php
      if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-info text-center">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
      }
      ?>

      <div class="container">
        <div class="row">
          <?php

          // fetch data from tables_info
          $sql = "SELECT table_id, category_name, total_count, image, seating_capacity, description FROM tables_info";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="col-md-4 mb-4">
                <div class="available-card">
                  <img src="../../assets/img/booking/<?php echo $row['image']; ?>" class="available-card-img-top" alt="Table Image">
                  <div class="card-body">
                    <h5 class="available-card-title"><?php echo $row['category_name']; ?></h5>
                    <p class="available-card-texttables">Total Available Tables: <?php echo $row['total_count']; ?></p>
                    <p class="available-card-text">Seating Capacity Per Table: <?php echo $row['seating_capacity']; ?></p>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo '<div class="col-12"><p class="text-center">No tables found.</p></div>';
          }
          ?>
        </div>
      </div>

      <p>Please note that table reservations require a minimum notice of 24 hours. Requests received within this timeframe may experience delayed approval or availability due to high demand. Thank you for your understanding!</p>

      <form action="../../assets/database/table-booking/table_booking.php" method="post" role="form" class="form-booking" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <?php if (isset($_SESSION['username'])) : ?>
            <div class="col-lg-4 col-md-6 form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly />
              <div class="validate"></div>
            </div>

          <?php endif; ?>

          <?php if (isset($_SESSION['username'])) : ?>

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <label for="table_category">Table Category</label>
              <select class="form-control" name="table_category" id="table_category" required>
                <option value="" disabled selected>Select Table Category</option>
                <?php
                // Fetch table categories
                $sql = "SELECT category_name FROM tables_info";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row['category_name']) . '">' . htmlspecialchars($row['category_name']) . '</option>';
                  }
                }
                ?>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <label for="booked_date">Booking Date</label>
              <input type="date" class="form-control" name="booked_date" id="booked_date" placeholder="MM/DD/YYYY" required />
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <label for="arrival_time">Arrival Time</label>
              <input type="time" class="form-control" name="arrival_time" id="arrival_time" placeholder="HH:MM AM/PM" required />
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <label for="leave_time">Planned Leave Time</label>
              <input type="time" class="form-control" name="leave_time" id="leave_time" placeholder="HH:MM AM/PM" required />
              <div class="validate"></div>
            </div>
            <div class="form-group mt-3">
              <label for="message">Message (Optional)</label>
              <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
              <div class="validate"></div>
            </div>


            <div class="error-message mt-3"></div>

            <div class="text-center"><button type="submit">Book a Table</button></div>
          <?php else : ?>
            <div class="col-12 mt-3">
              <p style="text-align: center;">Please <a href="../account/login.php">login</a> to book a table.</p>
            </div>
          <?php endif; ?>
        </div>
      </form>


      <?php
      $conn->close();
      ?>
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
                <a href="parking.html">Parking Availability</a>
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
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Main JS Files -->
  <script src="../../assets/js/main.js"></script>
  <script src="../../assets/js/bookings/tables-info.js"></script>

  <!-- Table availability js function -->
  <script>
    $(document).ready(function() {
      $('#booked_date, #table_category, #arrival_time, #leave_time').change(function() {
        var bookedDate = $('#booked_date').val();
        var tableCategory = $('#table_category').val();
        var arrivalTime = $('#arrival_time').val();
        var leaveTime = $('#leave_time').val();

        $.ajax({
          type: 'POST',
          url: '../../assets/database/table-booking/check_availability.php',
          data: {
            booked_date: bookedDate,
            table_category: tableCategory,
            arrival_time: arrivalTime,
            leave_time: leaveTime
          },
          success: function(response) {
            if (response == 'available') {
              $('.error-message').hide();
              $('#book-table-btn').prop('disabled', false);
            } else {
              $('.error-message').text('This table is not available at the selected time. Please choose another time or category.');
              $('.error-message').show();
              $('#book-table-btn').prop('disabled', true);
            }
          }
        });
      });
    });
  </script>

</body>

</html>