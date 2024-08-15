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

      <?php if (isset($_SESSION['username'])): ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../account/my-account.php">My Bookings</a>
      <?php else: ?>
        <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../account/login.php">Login</a>
      <?php endif;?>
    </div>
  </header>


  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Pre Order Foods</h2>
        <ol>
          <li><a href="../../index.php">Home</a></li>
          <li>Booking</li>
          <li>Pre Order Foods</li>
          </li>
        </ol>
      </div>
    </div>
  </section>


  <!-- ======= Pre Order Foods Section ======= -->
<section id="pre-order-foods" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Booking</h2>
            <p>Pre Order Foods</p>
        </div>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_SESSION['message']);unset($_SESSION['message']); ?>
            </div>
        <?php endif;?>

        <p>Make sure to place your order before 1 hour or at least 30 mins before.</p>

        <form action="../../assets/database/pre-order/pre-order-save.php" method="post" role="form" class="form-booking" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="col-lg-4 col-md-6 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly />
                        <div class="validate"></div>
                    </div>

                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                        <label for="order_time">Order Time</label>
                        <select class="form-control" name="order_time" id="order_time" required onchange="updateOrderNeedTime()">
                            <option value="" disabled selected>Select Time</option>
                            <option value="Breakfast">Breakfast (8.00 am to 11.00 am)</option>
                            <option value="Lunch">Lunch (12.00 pm to 2.00 pm)</option>
                            <option value="Tea Time">Tea Time (3.30 pm to 5.30 pm)</option>
                            <option value="Dinner">Dinner (7.00 pm to 10.00 pm)</option>
                        </select>
                        <div class="validate"></div>
                    </div>

                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                        <label for="order_method">Order Method</label>
                        <select class="form-control" name="order_method" id="order_method" required>
                            <option value="" disabled selected>Select Method</option>
                            <option value="PickUp">PickUp</option>
                            <option value="Dining">Dining</option>
                        </select>
                        <div class="validate"></div>
                    </div>

                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                        <label for="booked_date">Ordering Date</label>
                        <input type="date" class="form-control" name="booked_date" id="booked_date" placeholder="MM/DD/YYYY" required />
                        <div class="validate"></div>
                    </div>

                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                        <label for="orderneed_time">Order Need Time</label>
                        <input type="time" class="form-control" name="orderneed_time" id="orderneed_time" placeholder="HH:MM AM/PM" required />
                        <div class="validate"></div>
                    </div>

                </div>

                <div class="row mt-3" id="meal-options">
                    <!-- Main Meals -->
                    <div class="col-lg-3 col-md-6">
                        <div class="meal-card">
                            <div class="meal-card-body">
                                <h5>Main Meals</h5>
                                <div id="mainMeals" class="meal-options"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Desserts -->
                    <div class="col-lg-3 col-md-6">
                        <div class="meal-card">
                            <div class="meal-card-body">
                                <h5>Desserts</h5>
                                <div id="desserts" class="meal-options"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Dishes -->
                    <div class="col-lg-3 col-md-6">
                        <div class="meal-card">
                            <div class="meal-card-body">
                                <h5>Side Dishes</h5>
                                <div id="sideDishes" class="meal-options"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Beverages -->
                    <div class="col-lg-3 col-md-6">
                        <div class="meal-card">
                            <div class="meal-card-body">
                                <h5>Beverages</h5>
                                <div id="beverages" class="meal-options"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="message">Message (Optional)</label>
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div>

                <div class="text-center"><button type="submit">Pre Order Foods</button></div>
            <?php else: ?>
                <div class="col-12 mt-3">
                    <p style="text-align: center;">Please <a href="../account/login.php">login</a> to pre-order foods.</p>
                </div>
            <?php endif;?>
        </form>
        <?php $conn->close();?>
    </div>
</section>

<!-- Popup Modal -->
<div id="timeErrorModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Hey!! Make sure to select the correct time between the meals available time range.</p>
    </div>
</div>


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


  <!-- Fetch Meals and change meals related to the meal time -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('order_time').addEventListener('change', fetchMeals);

      function fetchMeals() {
        const orderTime = document.getElementById('order_time').value;

        fetch('../../assets/database/pre-order/fetch_meals.php?order_time=' + orderTime)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              displayMeals(data.meals);
            } else {
              alert('Failed to fetch meals.');
            }
          })
          .catch(error => console.error('Error:', error));
      }

      function displayMeals(meals) {
        displayMealCategory('mainMeals', meals.main_meals);
        displayMealCategory('desserts', meals.desserts);
        displayMealCategory('sideDishes', meals.side_dishes);
        displayMealCategory('beverages', meals.beverages);
      }

      function displayMealCategory(categoryId, categoryMeals) {
        const categoryElement = document.getElementById(categoryId);
        categoryElement.innerHTML = '';

        categoryMeals.forEach(meal => {
          const cardText = `${meal.name} - Rs. ${meal.price}`;
          const checkboxId = `${categoryId}_${meal.id}`;

          const cardItem = document.createElement('div');
          cardItem.classList.add('meal-card', 'shadow-sm', 'mb-3');

          const cardBody = document.createElement('div');
          cardBody.classList.add('meal-card-body');

          const checkbox = document.createElement('input');
          checkbox.type = 'checkbox';
          checkbox.id = checkboxId;
          checkbox.name = `${categoryId}[]`;
          checkbox.value = meal.id;

          const label = document.createElement('label');
          label.setAttribute('for', checkboxId);
          label.textContent = cardText;

          const qtyInput = document.createElement('input');
          qtyInput.type = 'number';
          qtyInput.name = `qty_${categoryId}_${meal.id}`;
          qtyInput.min = 1;
          qtyInput.placeholder = 'Qty';
          qtyInput.classList.add('form-control', 'mb-2');

          cardBody.appendChild(checkbox);
          cardBody.appendChild(label);
          cardBody.appendChild(qtyInput);

          cardItem.appendChild(cardBody);

          categoryElement.appendChild(cardItem);
        });
      }
    });
  </script>

<!-- Order Time Validation -->
<script>
    function updateOrderNeedTime() {
        const orderTimeSelect = document.getElementById('order_time');
        const orderNeedTimeInput = document.getElementById('orderneed_time');

        const timeRanges = {
            'Breakfast': ['08:00', '11:00'],
            'Lunch': ['12:00', '14:00'],
            'Tea Time': ['15:30', '17:30'],
            'Dinner': ['19:00', '22:00']
        };

        const selectedTime = orderTimeSelect.value;
        const [startTime, endTime] = timeRanges[selectedTime];

        orderNeedTimeInput.min = startTime;
        orderNeedTimeInput.max = endTime;
        orderNeedTimeInput.value = startTime;

        orderNeedTimeInput.addEventListener('input', () => {
            const selectedNeedTime = orderNeedTimeInput.value;
            if (selectedNeedTime < startTime || selectedNeedTime > endTime) {
                showModal();
                orderNeedTimeInput.setCustomValidity('Please select a time within the specified range.');
            } else {
                closeModal();
                orderNeedTimeInput.setCustomValidity('');
            }
        });
    }

    function showModal() {
        const modal = document.getElementById('timeErrorModal');
        modal.style.display = 'block';
    }

    function closeModal() {
        const modal = document.getElementById('timeErrorModal');
        modal.style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const closeBtn = document.querySelector('.modal .close');
        closeBtn.addEventListener('click', closeModal);

        window.addEventListener('click', (event) => {
            const modal = document.getElementById('timeErrorModal');
            if (event.target === modal) {
                closeModal();
            }
        });
    });
</script>


</body>

</html>