<?php
session_start();

include '../../../assets/database/db-connection.php';

$eventhallinfo = [];

// Fetch Hall information's
$query = "SELECT * FROM event_hall_info";
$stmt = $conn->prepare($query);
$stmt->execute();
$eventhallinfo = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

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
                    <li><a class="nav-link" href="update-tableinfo.php">Update Table Details</a></li>
                    <li><a class="nav-link active" href="update-hallinfo.php"> Update Event Halls </a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="admin.php">Go Back</a>
        </div>
    </header>

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Restaurant Halls</h2>
                <ol>
                    <li><a href="index.php">Admin Home</a></li>
                    <li>Halls</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- ======= Event Hall Information ======= -->
    <section id="mainmenu" class="mainmenu">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Our Gallery Cafe</h2>
                <p>Table information's</p>
            </div>
            <div class="table-responsive">
                <table class="admin-fetchtable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Hall Category</th>
                            <th>Seating Capacity</th>
                            <th>About Hall</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventhallinfo as $item): ?>
                            <tr>
                                <td><img src="../../../assets/img/booking/<?php echo $item['image']; ?>" class="img-fluid" alt="<?php echo $item['category_name']; ?>"></td>
                                <td><?php echo $item['category_name']; ?></td>
                                <td><?php echo $item['seating_capacity']; ?></td>
                                <td><?php echo $item['description']; ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <!-- ======= Add New Hall Category ======= -->
    <section id="addmenuitem" class="addmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Add New Hall Category</h2>
            </div>
            <div class="container-addmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form class="add-menu-form" action="../../../assets/database/dashboards/admin/hall-informations/add_hallinfo.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Hall Category Name :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Seating Capacity Per Hall :</label>
                                <input type="number" class="form-control" id="seating" name="seating" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-add-menu">Add New Hall Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Delete Hall Category ======= -->
    <section id="deletemenuitem" class="deletemenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Delete Hall Category</h2>
            </div>
            <div class="container-deletemenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success'];
unset($_SESSION['success']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error'];
unset($_SESSION['error']); ?>
                            </div>
                        <?php endif;?>

                        <form class="delete-menu-form" action="../../../assets/database/dashboards/admin/hall-informations/delete_hallinfo.php" method="POST">
                            <div class="form-group">
                                <label for="hallinfo_id">Select Hall Category to Delete:</label>
                                <select class="form-control" id="hallinfo_id" name="hallinfo_id" required>
                                    <option value="" disabled selected> Select Hall Category Below List </option>
                                    <?php foreach ($eventhallinfo as $item): ?>
                                        <option value="<?php echo $item['hall_id']; ?>"><?php echo $item['category_name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-delete-menu">Delete Table Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Edit Hall Category Information ======= -->
    <section id="editmenuitem" class="editmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Edit Hall Category</h2>
            </div>
            <div class="container-editmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <?php if (isset($_SESSION['hallsuccess'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['hallsuccess'];
unset($_SESSION['hallsuccess']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error'];
unset($_SESSION['error']); ?>
                            </div>
                        <?php endif;?>

                        <form class="edit-menu-form" action="../../../assets/database/dashboards/admin/hall-informations/edit_hallinfo.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="hallinfo_id">Select Hall Category :</label>
                                <select class="form-control" id="hallinfo_id" name="hallinfo_id" onchange="populateForm(this.value)" required>
                                    <option value="" disabled selected>Select an item</option>
                                    <?php foreach ($eventhallinfo as $item): ?>
                                        <option value="<?php echo $item['hall_id']; ?>"><?php echo $item['category_name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_name">Hall Category Name :</label>
                                <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Seating Capacity Per Hall :</label>
                                <input type="number" class="form-control" id="edit_seating" name="edit_seating" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_description">Description:</label>
                                <textarea class="form-control" id="edit_description" name="edit_description" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Current Image :</label><br>
                                <img src="" id="current_image" style="max-width: 200px; max-height: 200px;">
                            </div>

                            <div class="form-group">
                                <label for="new_image">Upload New Image :</label>
                                <input type="file" class="form-control" id="new_image" name="new_image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-edit-menu">Update Hall Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const menuItems = <?php echo json_encode($eventhallinfo); ?>;

        function populateForm(itemId) {
            const selectedItem = menuItems.find(item => item.hall_id == itemId);

            if (selectedItem) {
                document.getElementById('edit_name').value = selectedItem.category_name;
                document.getElementById('edit_seating').value = selectedItem.seating_capacity;
                document.getElementById('edit_description').value = selectedItem.description;
                document.getElementById('current_image').src = '../../../assets/img/booking/'+ selectedItem.image;
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

</body>

</html>