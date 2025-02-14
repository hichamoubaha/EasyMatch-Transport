<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Koulia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../public/images/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../public/libs/animate/animate.min.css" rel="stylesheet">
    <link href="../public/libs/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../public/css/style.css" rel="stylesheet">
    
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <style>
        .vertical-divider {
            width: 1px;
            height: 20px;
            background-color: #0d6efd; /* Bootstrap primary color */
        }
        
        .notif{
            display: none;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">Koulia</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

            <div id="notification_popup" class="notif absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg p-3">
                    <h3 class="font-semibold text-lg">Notifications</h3>
                    <ul>
                        <li class="border-b py-2">New message received <span class="text-gray-500 text-sm">12/02/2025</span></li>
                        <li class="border-b py-2">Your order has been shipped <span class="text-gray-500 text-sm">11/02/2025</span></li>
                        <li class="py-2">Reminder: Meeting at 3 PM <span class="text-gray-500 text-sm">10/02/2025</span></li>
                    </ul>
                </div>
                
                <div class="cursor-pointer" id="notification-button">
                <svg xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" width="40" height="40" viewBox="0 0 30 30">
                    <path d="M 15 3 C 13.9 3 13 3.9 13 5 L 13 5.265625 C 9.5610846 6.1606069 7 9.2910435 7 13 L 7 15.400391 C 7 17.000391 6.6996094 18.5 6.0996094 20 L 23.900391 20 C 23.300391 18.5 23 17.000391 23 15.400391 L 23 13 C 23 9.2910435 20.438915 6.1606069 17 5.265625 L 17 5 C 17 3.9 16.1 3 15 3 z M 5 22 A 1.0001 1.0001 0 1 0 5 24 L 12.173828 24 C 12.068319 24.312339 12 24.644428 12 25 C 12 26.7 13.3 28 15 28 C 16.7 28 18 26.7 18 25 C 18 24.644428 17.931681 24.312339 17.826172 24 L 25 24 A 1.0001 1.0001 0 1 0 25 22 L 5 22 z"></path>
                </svg>       
                </div>

                
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="contact.html" class="nav-item nav-link">Login</a>
            </div>
            
        </div>
    </nav>
    <!-- Navbar End -->

    <main class="container-fluid p-5">
        <!-- Dashboard Section -->
        <section class="row">
            <!-- Left Panel: User Requests Summary -->
            <div class="col-md-6">
                <h4 class="text-md mb-4">Bonjour User</h4>
                <div class="d-flex gap-2 align-items-center">
                    <p><span id="total-demandes" class="text-primary">10</span> demandes</p>
                    <div class="vertical-divider"></div>
                    <p><span id="encour-demandes" class="text-primary">2</span> demande en cours</p>
                    <div class="vertical-divider"></div>
                    <p><span id="accepted-demandes" class="text-primary">2</span> demande acceptées</p>
                    <div class="vertical-divider"></div>
                    <p><span id="rejected-demandes" class="text-primary">4</span> demande refusées</p>
                </div>

                <div class="mt-4">
                    <h4>Vos demandes :</h4>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>001</td>
                                <td>En cours</td>
                                <td>2023-10-01</td>
                                <td class="d-flex gap-2">
                                    <p>
                                        <a href="" >accepter</a>
                                    </p>
                                    <p>
                                        <a href="">refuser</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Panel: User Profile Information -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="mb-0">Nom d'utilisateur</h2>
                                <button id="modifier-profile-btn" class="btn btn-primary" style="border-radius: 10px;">Modifier le profil</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="basicInfo-tab" data-bs-toggle="tab" data-bs-target="#basicInfo" type="button" role="tab" aria-controls="basicInfo" aria-selected="true">Informations de base</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="profileTabsContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label class="fw-bold">Nom complet</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Jamshaid Kamran
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label class="fw-bold">Date de naissance</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                22 Mars 1994
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label class="fw-bold">Adresse</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Casablanca, Rue Hassan 2, Résidence Andra
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label class="fw-bold">Matricule de voiture</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                A 122546
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hidden Form for Profile Update -->
        <div id="update-form-modal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier vos informations</h5>
                        <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Votre nom">
                                        <label for="name">Nom</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="prenom" placeholder="Votre prénom">
                                        <label for="prenom">Prénom</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Votre email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="telephone" placeholder="Téléphone">
                                        <label for="telephone">Téléphone</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="date-naissance" placeholder="Date de naissance">
                                        <label for="date-naissance">Date de naissance</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="pays" placeholder="Pays">
                                        <label for="pays">Pays</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ville" placeholder="Ville">
                                        <label for="ville">Ville</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="border-radius: 10px;" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">Air Freight</a>
                    <a class="btn btn-link" href="">Sea Freight</a>
                    <a class="btn btn-link" href="">Road Freight</a>
                    <a class="btn btn-link" href="">Logistic Solutions</a>
                    <a class="btn btn-link" href="">Industry solutions</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control w-100 py-3 ps-4 pe-5" style="border-radius: 10px;"  type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" style="border-radius: 10px;">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top" style="border-radius: 10px;"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/libs/wow/wow.min.js"></script>
    <script src="../public/libs/easing/easing.min.js"></script>
    <script src="../public/libs/waypoints/waypoints.min.js"></script>
    <script src="../public/libs/counterup/counterup.min.js"></script>
    <script src="../public/libs/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../public/js/main.js"></script>
   
    <script>
        
        const modifierProfileBtn = document.getElementById('modifier-profile-btn');
        const updateFormModal = new bootstrap.Modal(document.getElementById('update-form-modal'));

        modifierProfileBtn.addEventListener('click', () => {
            updateFormModal.show();
        });




        document.addEventListener("DOMContentLoaded", function () {
    const notificationPopup = document.getElementById("notification_popup");
    const notification_btn = document.getElementById("notification-button");
    

    notification_btn.addEventListener("click", function () {
            if (notificationPopup.style.display === "none" ) {
                notificationPopup.style.display = "block";
            } else {
                notificationPopup.style.display = "none";
            }
        });
    
});



</script>

    

</body>

</html>