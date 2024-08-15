<?php
session_start();

include '../../../assets/database/db-connection.php';

$gallery = [];

// Fetch Gallery
$query = "SELECT * FROM gallery";
$stmt = $conn->prepare($query);
$stmt->execute();
$gallery = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

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
                    <li><a class="nav-link active" href="update-gallery.php"> Update Gallery </a></li>
                    <li><a class="nav-link" href="update-chefs.php">Update Chefs</a></li>
                    <li><a class="nav-link" href="manage-operation-team.php">Operational Team</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="admin.php">Go Back</a>
        </div>
    </header>

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Restaurant Gallery</h2>
                <ol>
                    <li><a href="index.php">Admin Home</a></li>
                    <li>Gallery</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- ======= Gallery ======= -->
    <section class="parent-container">
        <div class="container">
            <div class="section-title">
                <h2>Our Gallery Cafe</h2>
                <p>Gallery</p>
            </div>
            <div class="wrapper" data-aos="fade-up">
                <i class='bx bx-left-arrow-alt button' id="prev"></i>
                <div class="image-container">
                    <div class="carousel">
                        <?php foreach ($gallery as $image): ?>
                            <img src="../../../assets/img/gallery/<?php echo htmlspecialchars($image['image_url']); ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>" />
                        <?php endforeach;?>
                    </div>
                    <i class='bx bx-right-arrow-alt button' id="next"></i>
                </div>
            </div>
        </div>

    </section>


    <!-- ======= Add New Image ======= -->
    <section id="addmenuitem" class="addmenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Add New Image</h2>
            </div>
            <div class="container-addmenu" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form class="add-menu-form" action="../../../assets/database/dashboards/admin/gallery-informations/add_gallery.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">ALT Text :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-add-menu">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Delete Image ======= -->
    <section id="deletemenuitem" class="deletemenuitem">
        <div class="container">
            <div class="section-title">
                <h2>Delete Image</h2>
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

                        <form class="delete-menu-form" action="../../../assets/database/dashboards/admin/gallery-informations/delete_gallery.php" method="POST">
                            <div class="form-group">
                                <label for="gallery_id">Select Image to Delete:</label>
                                <select class="form-control" id="gallery_id" name="gallery_id" required>
                                    <option value="" disabled selected> Select Image Below List </option>
                                    <?php foreach ($gallery as $item): ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['alt_text']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger btn-delete-menu">Delete Image</button>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="../../../assets/js/admin/gallery.js"></script>

</body>

</html>