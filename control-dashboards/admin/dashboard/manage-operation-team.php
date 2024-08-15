<?php
session_start();

include '../../../assets/database/db-connection.php';

$operationteam = [];

// Fetch Operations Team Details
$query = "SELECT * FROM operations_team_users";
$stmt = $conn->prepare($query);
$stmt->execute();
$operationteam = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

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
                <i class="bi bi-phone d-flex align-items-center"><span>If you encounter any bug or failure on the system please contact <a href="">Tharindu Darshana</a> for help.</span></i>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
            <h1 class="logo me-auto me-lg-0">
                <a href="admin.php">Gallery Cafe</a>
            </h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link" href="update-testimonials.php">Update Testimonials</a></li>
                    <li><a class="nav-link" href="update-gallery.php"> Update Gallery </a></li>
                    <li><a class="nav-link" href="update-chefs.php">Update Chefs</a></li>
                    <li><a class="nav-link active" href="manage-operation-team.php">Operational Team</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="admin.php">Go Back</a>
        </div>
    </header>

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Restaurant Operation Team</h2>
                <ol>
                    <li><a href="index.php">Admin Home</a></li>
                    <li>Operation Team</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- ======= Operation Team Members ======= -->
    <section id="mainmenu" class="mainmenu">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Our Gallery Cafe</h2>
                <p>Operation Team</p>
            </div>
            <p>Due to the security cancers we are not showing the <b>passwords</b> in here and passwords are saved in the database encrypted way.</p>
            <br>
            <div class="table-responsive">
                <table class="admin-fetchtable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User Register Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($operationteam as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['username']; ?></td>
                                <td><?php echo $item['email']; ?></td>
                                <td><?php echo $item['registered_timestamp']; ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!-- ======= Add New Operations Team Member ======= -->
    <section id="addmenuitem" class="addmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Add New Operations Team Member</h2>
            </div>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
echo $_SESSION['error'];
unset($_SESSION['error']);
?>
                </div>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
                </div>
            <?php endif;?>
            <div class="container-addmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form class="add-menu-form" action="../../../assets/database/dashboards/admin/operations-team-info/add_operation-team.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Member Name :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Email Address :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password :</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-add-menu">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Delete Member ======= -->
    <section id="deletemenuitem" class="deletemenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Delete Operational Team Member</h2>
            </div>
            <div class="container-deletemenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <?php if (isset($_SESSION['teamopsuccess'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['teamopsuccess'];
unset($_SESSION['teamopsuccess']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error'];
unset($_SESSION['error']); ?>
                            </div>
                        <?php endif;?>

                        <form class="delete-menu-form" action="../../../assets/database/dashboards/admin/operations-team-info/delete_operation-team.php" method="POST">
                            <div class="form-group">
                                <label for="operationmember_id">Select Member to Delete:</label>
                                <select class="form-control" id="operationmember_id" name="operationmember_id" required>
                                    <option value="" disabled selected> Select Member Below List </option>
                                    <?php foreach ($operationteam as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['username']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-delete-menu">Delete Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Edit Team Member Data ======= -->
    <section id="editmenuitem" class="editmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Edit Team Member</h2>
            </div>
            <div class="container-editmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <?php if (isset($_SESSION['promosuccess'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['promosuccess'];
unset($_SESSION['promosuccess']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error'];
unset($_SESSION['error']); ?>
                            </div>
                        <?php endif;?>

                        <form class="edit-menu-form" action="../../../assets/database/dashboards/admin/operations-team-info/edit_operation-team.php" method="POST">
                            <div class="form-group">
                                <label for="team_member_id">Select Team Member :</label>
                                <select class="form-control" id="team_member_id" name="team_member_id" onchange="populateForm(this.value)" required>
                                    <option value="" disabled selected>Select a team member</option>
                                    <?php foreach ($operationteam as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_name">Member Name :</label>
                                <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_email">Email Address :</label>
                                <input type="email" class="form-control" id="edit_email" name="edit_email" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_username">Username :</label>
                                <input type="text" class="form-control" id="edit_username" name="edit_username" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password :</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password :</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-edit-menu">Update Team Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const teamMembers = <?php echo json_encode($operationteam); ?>;

        function populateForm(itemId) {
            const selectedItem = teamMembers.find(item => item.id == itemId);

            if (selectedItem) {
                document.getElementById('edit_name').value = selectedItem.name;
                document.getElementById('edit_email').value = selectedItem.email;
                document.getElementById('edit_username').value = selectedItem.username;
            }
        }
    </script>


    <!-- Support FrontEnd JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="../../../assets/js/main.js"></script>
    <script src="../../../assets/js/admin/password-hide.js"></script>

</body>

</html>