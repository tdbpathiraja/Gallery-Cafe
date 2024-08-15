<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header('Location: ../login/operational-team-login.php');
    exit();
}

include '../../../assets/database/db-connection.php';

$tableReservations = [];
$hallReservations = [];
$preOrders = [];

// Fetch table reservations
$query = "SELECT * FROM table_reservations";
$stmt = $conn->prepare($query);
$stmt->execute();
$tableReservations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch hall reservations
$query = "SELECT * FROM hall_reservations";
$stmt = $conn->prepare($query);
$stmt->execute();
$hallReservations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch pre-orders
$query = "SELECT * FROM pre_orders";
$stmt = $conn->prepare($query);
$stmt->execute();
$preOrders = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

//Fetch Table Booking Status
$statusQuery = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'table_reservations' AND COLUMN_NAME = 'booking_status'";
$statusResult = $conn->query($statusQuery);
$statuses = [];
if ($statusResult->num_rows > 0) {
    $row = $statusResult->fetch_assoc();
    $enumList = str_replace("'", "", substr($row['COLUMN_TYPE'], 5, -1));
    $statuses = explode(",", $enumList);
}

//Fetch Pre Order Booking Status
$statusQuery = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'pre_orders' AND COLUMN_NAME = 'order_status'";
$statusResult = $conn->query($statusQuery);
$prestatuses = [];
if ($statusResult->num_rows > 0) {
    $row = $statusResult->fetch_assoc();
    $enumList = str_replace("'", "", substr($row['COLUMN_TYPE'], 5, -1));
    $prestatuses = explode(",", $enumList);
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
    <link href="../../../assets/img/Gallery Cafe Logo.png" rel="icon" />
    <link href="../../../assets/img/Gallery Cafe Logo.png" rel="apple-touch-icon" />

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
    <link href="../../../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>IF you facing any login issues or technical difficulties please inform it to the Owner or IT Department.</span></i>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
            <h1 class="logo me-auto me-lg-0">
                <a href="operation_dashboard.php">Gallery Cafe</a>
            </h1>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../login/logout-function-operational.php">LogOut</a>
        </div>
    </header>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome Operational Team Portal</h1>
                    <h2>Your User Profile is below!!</h2>
                </div>
            </div>
        </div>
    </section>


    <section id="operation-dashboard" class="operation-dashboard">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery Cafe</h2>
                <p>Pre Orders</p>
            </div>
            <?php if (!empty($preOrders)): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Username</th>
                                <th>Meal Details</th>
                                <th>Order Need Date</th>
                                <th>Order Need Time</th>
                                <th>Meal Time</th>
                                <th>Order Type</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($preOrders as $order): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['preorder_id']); ?></td>
                                    <td><?php echo htmlspecialchars($order['username']); ?></td>
                                    <td><?php echo htmlspecialchars($order['meal_details']); ?></td>
                                    <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                    <td><?php echo htmlspecialchars($order['orderneed_time']); ?></td>
                                    <td><?php echo htmlspecialchars($order['order_time']); ?></td>
                                    <td><?php echo htmlspecialchars($order['order_method']); ?></td>
                                    <td><?php echo htmlspecialchars($order['message']); ?></td>
                                    <td>
                                        <form method="post" action="../../../assets/database/dashboards/operational-staff/update-order-status.php" style="display:inline-block;">
                                            <input type="hidden" name="preorder_id" value="<?php echo htmlspecialchars($order['preorder_id']); ?>">
                                            <select name="order_status" class="form-select">
                                                <?php
// $statuses = ['Pending', 'Order Processing', 'Foods Ready'];
foreach ($prestatuses as $peostatus) {
    if ($peostatus == $order['order_status']) {
        echo "<option value=\"$peostatus\" selected disabled>$peostatus</option>";
    } else {
        echo "<option value=\"$peostatus\">$peostatus</option>";
    }
}
?>
                                            </select>


                                            <button type="submit" class="Btn">
                                                <svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                    <path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path>
                                                    <path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                                                </svg>
                                                <span class="tooltip">Update Status</span>
                                            </button>
                                        </form>

                                    </td>
                                    <td>
                                        <form method="post" action="../../../assets/database/dashboards/operational-staff/delete-order.php" style="display:inline-block;">
                                            <button type="button" onclick="deletePreOrder('<?php echo htmlspecialchars($order['preorder_id']); ?>')" class="Btn2">
                                                <svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                    <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path>
                                                    <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path>
                                                </svg>
                                                <span class="tooltip">Delete Order</span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No Pre Orders Left to proceed.</p>
            <?php endif;?>


        </div>


        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery Cafe</h2>
                <p>Table Reservations</p>
            </div>

            <?php if (!empty($tableReservations)): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Username</th>
                                <th>Table Category</th>
                                <th>Arrival Time</th>
                                <th>Leave Time</th>
                                <th>Booked Date</th>
                                <th>Status</th>
                                <th>Staff Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tableReservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['booking_id']); ?></td>
                                    <td><?php echo isset($reservation['username']) ? htmlspecialchars($reservation['username']) : ''; ?></td>
                                    <td><?php echo isset($reservation['table_category']) ? htmlspecialchars($reservation['table_category']) : ''; ?></td>
                                    <td><?php echo isset($reservation['arrival_time']) ? htmlspecialchars($reservation['arrival_time']) : ''; ?></td>
                                    <td><?php echo isset($reservation['planned_leave_time']) ? htmlspecialchars($reservation['planned_leave_time']) : ''; ?></td>
                                    <td><?php echo isset($reservation['booked_date']) ? htmlspecialchars($reservation['booked_date']) : ''; ?></td>
                                    <td>
                                        <form method="post" action="../../../assets/database/dashboards/operational-staff/update-table-status.php">
                                            <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($reservation['booking_id']); ?>">
                                            <select name="booking_status" class="form-select">
                                                <?php
// $statuses = ['Pending', 'Table Available', 'Table Unavailable', 'Table Booked'];
foreach ($statuses as $status) {
    if ($status == $reservation['booking_status']) {
        echo "<option value=\"$status\" selected disabled>$status</option>";
    } else {
        echo "<option value=\"$status\">$status</option>";
    }
}
?>
                                            </select>
                                            <!-- <button type="submit" class="btn btn-primary btn-sm">Update</button> -->
                                            <button type="submit" class="Btn">
                                                <svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                    <path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path>
                                                    <path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                                                </svg>
                                                <span class="tooltip">Update Status</span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="../../../assets/database/dashboards/operational-staff/delete-table-reserve.php" style="display:inline-block;">
                                            <!-- <button type="button" onclick="deletetablereserve('<?php echo htmlspecialchars($reservation['booking_id']); ?>')" class="btn btn-danger btn-sm">Delete Order</button> -->
                                            <button type="button" onclick="deletetablereserve('<?php echo htmlspecialchars($reservation['booking_id']); ?>')" class="Btn2">
                                                <svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                    <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path>
                                                    <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path>
                                                </svg>
                                                <span class="tooltip">Delete Reserve</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No table reservations.</p>
            <?php endif;?>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery Cafe</h2>
                <p>Hall Reservations</p>
            </div>
            <?php if (!empty($hallReservations)): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Hall Category</th>
                                <th>Arrival Time</th>
                                <th>Leave Time</th>
                                <th>Booked Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hallReservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['booking_id']); ?></td>
                                    <td><?php echo isset($reservation['hall_category']) ? htmlspecialchars($reservation['hall_category']) : ''; ?></td>
                                    <td><?php echo isset($reservation['arrival_time']) ? htmlspecialchars($reservation['arrival_time']) : ''; ?></td>
                                    <td><?php echo isset($reservation['planned_leave_time']) ? htmlspecialchars($reservation['planned_leave_time']) : ''; ?></td>
                                    <td><?php echo isset($reservation['booked_date']) ? htmlspecialchars($reservation['booked_date']) : ''; ?></td>
                                    <td><?php echo isset($reservation['status']) ? htmlspecialchars($reservation['status']) : ''; ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p>No hall reservations.</p>
            <?php endif;?>
        </div>
    </section>

    <!-- Support FrontEnd JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="../../../assets/js/main.js"></script>

    <!-- Delete pre-order confirmation message -->
    <script>
        function deletePreOrder(preOrderId) {
            if (confirm("Are you sure you want to delete this pre-order?")) {

                $.ajax({
                    type: 'POST',
                    url: '../../../assets/database/dashboards/operational-staff/delete-order.php',
                    data: {
                        preorder_id: preOrderId
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error);
                        alert("Failed to delete pre-order.");
                    }
                });
            }
        }
    </script>

    <!-- Delete Table Reservation Confirmation Message -->
    <script>
        function deletetablereserve(reservationId) {
            if (confirm("Are you sure you want to delete this table reservation?")) {
                $.ajax({
                    type: 'POST',
                    url: '../../../assets/database/dashboards/operational-staff/delete-table-reserve.php',
                    data: {
                        booking_id: reservationId
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error);
                        alert("Failed to delete table reservation.");
                    }
                });
            }
        }
    </script>

</body>

</html>