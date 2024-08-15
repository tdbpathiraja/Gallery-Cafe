<?php
session_start();

include '../../../assets/database/db-connection.php';

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
                <a href="#">Gallery Cafe</a>
            </h1>

            <a class="book-a-table-btn scrollto d-none d-lg-flex" href="../../assets/database/user-account/logout.php">LogOut</a>
        </div>
    </header>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome Owner</h1>
                    <h2>Your User Profile is below!!</h2>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Shop Close Message Popup ======= -->
    <section id="navigation-menuupdate" class="navigation-closescreen">
        <div class="container" data-aos="fade-up">
            <div class="closure-form-container">
                <h2 class="closure-form-title">Shop Close Message</h2>

                <form action="../../../assets/database/dashboards/admin/closure/submit_closure.php" method="POST" class="closure-form">
                <p>Note : If you already have live close message on your website and need to close that then click the switch off button and press submit button. </p>
                    <div class="form-group row closure-form-group">
                        <label for="start_date" class="col-sm-2 col-form-label closure-form-label">Start Date:</label>
                        <div class="col-sm-4">
                            <input type="date" id="start_date" name="start_date" class="form-control closure-form-input">
                        </div>
                        <label for="end_date" class="col-sm-2 col-form-label closure-form-label">End Date:</label>
                        <div class="col-sm-4">
                            <input type="date" id="end_date" name="end_date" class="form-control closure-form-input" >
                        </div>
                    </div>
                    <div class="form-group row closure-form-group">
                        <label for="close_reason" class="col-sm-2 col-form-label closure-form-label">Closure Reason:</label>
                        <div class="col-sm-10">
                            <textarea id="close_reason" name="close_reason" class="form-control closure-form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row closure-form-group">
                        <label for="display_message" class="col-sm-2 col-form-label closure-form-label">Display Message:</label>
                        <div class="col-sm-10">
                            <div class="switch">
                                <input type="checkbox" id="display_message" name="display_message" class="closure-form-checkbox" checked>
                                <label class="button" for="display_message">
                                    <div class="light"></div>
                                    <div class="dots"></div>
                                    <div class="characters"></div>
                                    <div class="shine"></div>
                                    <div class="shadow"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary closure-form-submit">Submit</button>
                </form>
            </div>
        </div>
    </section>


    <!-- ======= Menu EDIT Options ======= -->
    <section id="navigation-menuupdate" class="navigation-menuupdate">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Admin</h2>
                <p>Gallery Cafe Menu Options</p>
            </div>
            <div class="card-container">
                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Main Meals</p>
                        <p class="para-update">Show Meals | Add Foods | Delete Food Items | Update Food Items</p>
                        <a href="food-menu.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Side Dishes</p>
                        <p class="para-update">Show Meals | Add Foods | Delete Food Items | Update Food Items</p>
                        <a href="side-dishes.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Desserts</p>
                        <p class="para-update">Show Meals | Add Foods | Delete Food Items | Update Food Items</p>
                        <a href="desserts.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Beverages</p>
                        <p class="para-update">Show Beverages | Add Beverages | Delete Beverage Items | Update Beverage Items</p>
                        <a href="beverages.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Special Foods</p>
                        <p class="para-update">Show Specials | Add Specials | Delete Special Items | Update Special Items</p>
                        <a href="special.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ======= Highlighted areas EDIT Options ======= -->
    <section id="navigation-menuupdate" class="navigation-menuupdate">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Admin</h2>
                <p>Highlighted Areas</p>
            </div>
            <div class="card-container">
                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Promotions</p>
                        <p class="para-update">Promotions of the gallery cafe</p>
                        <a href="update-promotions.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Special Events</p>
                        <p class="para-update">Gallery Cafe Events</p>
                        <a href="update-specialevents.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ======= General Settings EDIT Options ======= -->
    <section id="navigation-menuupdate" class="navigation-menuupdate">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Admin</h2>
                <p>General Settings</p>
            </div>
            <div class="card-container">
                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Testimonials</p>
                        <p class="para-update">Client Testimonials</p>
                        <a href="update-testimonials.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Gallery</p>
                        <p class="para-update">Restaurant Gallery</p>
                        <a href="update-gallery.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Chefs</p>
                        <p class="para-update">Chefs working on Restaurant</p>
                        <a href="update-chefs.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Operational Teams</p>
                        <p class="para-update">Add or Remove Operational Team members</p>
                        <a href="manage-operation-team.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ======= Tables and Events EDIT Options ======= -->
    <section id="navigation-menuupdate" class="navigation-menuupdate">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Admin</h2>
                <p>Tables & Event Hall</p>
            </div>
            <div class="card-container">
                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Tables</p>
                        <p class="para-update">Table information's</p>
                        <a href="update-tableinfo.php"><button class="btn-update">Go to Dashboard</button></a>
                    </div>
                </div>

                <div class="card-update">
                    <div class="content-update">
                        <p class="heading-update">Event Halls</p>
                        <p class="para-update">Hall Information's</p>
                        <a href="update-hallinfo.php"><button class="btn-update">Go to Dashboard</button></a>
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

</body>

</html>
