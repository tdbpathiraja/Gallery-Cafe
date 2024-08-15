<?php
session_start();

include '../../../assets/database/db-connection.php';

$promotions = [];

// Fetch Promotions
$query = "SELECT * FROM promotions";
$stmt = $conn->prepare($query);
$stmt->execute();
$promotions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

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
                    <li><a class="nav-link active" href="update-promotions.php">Update Promotions</a></li>
                    <li><a class="nav-link" href="update-specialevents.php"> Update Special Events </a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="admin.php">Go Back</a>
        </div>
    </header>

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Restaurant Promotions</h2>
                <ol>
                    <li><a href="index.php">Admin Home</a></li>
                    <li>Promotions</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- ======= Promotions ======= -->
    <section id="mainmenu" class="mainmenu">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Our Gallery Cafe</h2>
                <p>Promotions</p>
            </div>
            <div class="table-responsive">
                <table class="admin-fetchtable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Terms</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($promotions as $item): ?>
                            <tr>
                                <td><img src="../../../assets/img/promotions/<?php echo $item['image_url']; ?>" class="img-fluid" alt="<?php echo $item['title']; ?>"></td>
                                <td><?php echo $item['title']; ?></td>
                                <td><?php echo $item['description']; ?></td>
                                <td><?php echo $item['terms']; ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <!-- ======= Add New Promotion ======= -->
    <section id="addmenuitem" class="addmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Add New Promotion</h2>
            </div>
            <div class="container-addmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form class="add-menu-form" action="../../../assets/database/dashboards/admin/promotions/add_promotion.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Promotion Title :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Terms :</label>
                                <textarea class="form-control" id="terms" name="terms" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-add-menu">Add Promotion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Delete Promotion ======= -->
    <section id="deletemenuitem" class="deletemenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Delete Promotion</h2>
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

                        <form class="delete-menu-form" action="../../../assets/database/dashboards/admin/promotions/delete_promotion.php" method="POST">
                            <div class="form-group">
                                <label for="promotion_id">Select Promotion to Delete:</label>
                                <select class="form-control" id="promotion_id" name="promotion_id" required>
                                    <option value="" disabled selected> Select Promotion Below List </option>
                                    <?php foreach ($promotions as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-delete-menu">Delete Menu Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Edit Promotion ======= -->
    <section id="editmenuitem" class="editmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Edit Promotion</h2>
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

                        <form class="edit-menu-form" action="../../../assets/database/dashboards/admin/promotions/edit_promotion.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="promotion_id">Select Promotion :</label>
                                <select class="form-control" id="promotion_id" name="promotion_id" onchange="populateForm(this.value)" required>
                                    <option value="" disabled selected>Select an item</option>
                                    <?php foreach ($promotions as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_name">Promotion Title :</label>
                                <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_description">Description:</label>
                                <textarea class="form-control" id="edit_description" name="edit_description" rows="4" required></textarea>
                            </div>


                            <div class="form-group">
                                <label for="edit_terms">Terms :</label>
                                <textarea class="form-control" id="edit_terms" name="edit_terms" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="current_image">Current Image :</label><br>
                                <img src="" id="current_image" style="max-width: 200px; max-height: 200px;">
                            </div>

                            <div class="form-group">
                                <label for="new_image">Upload New Image :</label>
                                <input type="file" class="form-control" id="new_image" name="new_image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-edit-menu">Update Promotion Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const menuItems = <?php echo json_encode($promotions); ?>;

        function populateForm(itemId) {
            const selectedItem = menuItems.find(item => item.id == itemId);

            if (selectedItem) {
                document.getElementById('edit_name').value = selectedItem.title;
                document.getElementById('edit_description').value = selectedItem.description;
                document.getElementById('edit_terms').value = selectedItem.terms;
                document.getElementById('current_image').src = '../../../assets/img/promotions/' + selectedItem.image_url;
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