<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
  header('Location: login.php');
  exit();
}

include '../../assets/database/db-connection.php';

// Fetch the username from the session
$username = $_SESSION['username'] ?? '';

$tableReservations = [];
$hallReservations = [];
$preOrders = [];

if (!empty($username)) {
  // Fetch table reservations
  $query = "SELECT * FROM table_reservations WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $tableReservations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  // Fetch hall reservations
  $query = "SELECT * FROM hall_reservations WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $hallReservations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  // Fetch pre-orders
  $query = "SELECT * FROM pre_orders WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $preOrders = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

  // Fetch Client Name
  $query = "SELECT name FROM users WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $userName = $userData['name'];
  }
}
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
          <li><a class="nav-link scrollto" href="../../index.php">Home</a></li>
          <li><a class="nav-link" href="../../about.php">About</a></li>
          <li class="dropdown">
            <a href="../../menu.php"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../../pages/menu/breakfast.php">Breakfast</a></li>
              <li><a href="../../pages/menu/lunch.php">Lunch</a></li>
              <li><a href="../../pages/menu/tea-time.php">Tea Time</a></li>
              <li><a href="../../pages/menu/dinner.php">Dinner</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="../../promotions.php">Promotions</a></li>
          <li>
            <a class="nav-link" href="../../special-events.php">Special Events</a>
          </li>
          <li class="dropdown">
            <a href="../../booking.php"><span>Booking</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a href="../../pages/booking/table-reservation.php">Book a Table</a>
              </li>
              <li>
                <a href="../../pages/booking/pre-order.php">Pre Order Foods</a>
              </li>
              <li>
                <a href="../../pages/booking/book-event.php">Book Your Event</a>
              </li>
            </ul>
          </li>
          <li><a class="nav-link" href="../../contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      
      <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../../assets/database/user-account/logout.php">LogOut</a>
    </div>
  </header>
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome <?php echo htmlspecialchars($userName); ?></h1>
          <h2>Your User Profile is below!!</h2>
        </div>
      </div>
    </div>
  </section>
 

  <section id="profile" class="profile">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2><?php echo htmlspecialchars($userName); ?>'s</h2>
        <p>Pre Orders</p>
      </div>
      <?php if (!empty($preOrders)) : ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Meal Details</th>
                <th>Order Request Date</th>
                <th>Requested Meal</th>
                <th>Order Request Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($preOrders as $order) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($order['preorder_id']); ?></td>
                  <td><?php echo htmlspecialchars($order['meal_details']); ?></td>
                  <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                  <td><?php echo htmlspecialchars($order['order_time']); ?></td>
                  <td><?php echo htmlspecialchars($order['orderneed_time']); ?></td>
                  <td class="<?php echo getStatusPreorder($order['order_status']); ?>">
                    <?php echo htmlspecialchars($order['order_status']); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <p>You have not placed any pre-orders.</p>
      <?php endif; ?>
    </div>

    <?php
    // Function to determine status class
    function getStatusPreorder($status)
    {
      switch ($status) {
        case 'Pending':
          return 'status-pending';
        case 'Order Processing':
          return 'status-processing';
        case 'Foods Ready':
          return 'status-ready';
        default:
          return '';
      }
    }
    ?>

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2><?php echo htmlspecialchars($userName); ?>'s</h2>
        <p>Table Reservations</p>
      </div>
      <?php if (!empty($tableReservations)) : ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Reservation ID</th>
                <th>Table Category</th>
                <th>Arrival Time</th>
                <th>Leave Time</th>
                <th>Booked Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tableReservations as $reservation) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($reservation['booking_id']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['table_category']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['arrival_time']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['planned_leave_time']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['booked_date']); ?></td>
                  <td class="<?php echo getStatusTable($reservation['booking_status']); ?>">
                    <?php echo htmlspecialchars($reservation['booking_status']); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <p>You have not placed any table reservations.</p>
      <?php endif; ?>
    </div>

    <?php
    // Function to determine status class
    function getStatusTable($status)
    {
      switch ($status) {
        case 'Pending':
          return 'tbstatus-pending';
        case 'Table Available':
          return 'tbstatus-tableavailable';
        case 'Table Unavailable':
          return 'tbstatus-tableunavailable';
        case 'Table Booked For You':
          return 'tbstatus-tablebooked';
        default:
          return '';
      }
    }
    ?>

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2><?php echo htmlspecialchars($userName); ?>'s</h2>
        <p>Event Hall Bookings</p>
      </div>
      <?php if (!empty($hallReservations)) : ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Reservation ID</th>
                <th>Hall Category</th>
                <th>Arrival Time</th>
                <th>Leave Time</th>
                <th>Booked Date</th>
                <th>Participants</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($hallReservations as $reservation) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($reservation['booking_id']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['hall_category']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['arrival_time']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['planned_leave_time']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['booked_date']); ?></td>
                  <td><?php echo htmlspecialchars($reservation['participant_count']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <p>You have not placed any Event Hall Booking.</p>
      <?php endif; ?>
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
                <a href="../../index.php">Home</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../about.php">About us</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../menu.php">Menu</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../terms-of-services.php">Terms of service</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../privacy-policy.php">Privacy policy</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../pages/booking/table-reservation.php">Book a Seat</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../pages/booking/pre-order.php">Pre Order Foods</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../promotions.php">Our Promotions</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../special-events.php">Special Events</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i>
                <a href="../../pages/menu/special.html">Special Foods</a>
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
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Third-Party JavaScript Libraries -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main JS Files -->
  <script src="../../assets/js/main.js"></script>
</body>

</html>