<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Koulia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=ROOT?>images/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=ROOT?>libs/animate/animate.min.css" rel="stylesheet">
    <link href="<?=ROOT?>libs/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=ROOT?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=ROOT?>css/style.css" rel="stylesheet">
    
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
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="contact.html" class="nav-item nav-link">Login</a>
            </div>
            
        </div>
    </nav>
    <!-- Navbar End -->


<section class="d-flex p-5">

<section class="w-50">
    <h4 class="text-md mb-4">Bonjour User</h4>

    <div class="d-flex gap-2">
        <p><span id="total demandes" class="text-primary ">10</span> demandes</p>
        <div class="bg-primary" style="width:1px;height:20px;"></div>
        <p><span id="accepted-demandes" class="text-primary ">2</span> demande encour</p>
        <div class="bg-primary" style="width:1px;height:20px;"></div>
        <p><span id="accepted-demandes" class="text-primary ">2</span> demande accépter</p>
        <div class="bg-primary" style="width:1px;height:20px;"></div>
        <p><span id="accepted-demandes" class="text-primary ">4</span> demande refuser</p>
    </div>
    

    <div>
        <h4>
            vos demande :
        </h4>
        
        <table>
            <thead>
                <th>
                    
                </th>
            </thead>

            <tbody>

            </tbody>
        </table>
    </div>
</section>

<section class="w-50">
<div class="container w-100">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">nom d'utilisateur</a></h2>
                    
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">nom complet</label>
                                            </div>
                                           
                                            <div class="col-md-8 col-6">
                                                Jamshaid Kamran
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">date de naissance</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                March 22, 1994.
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">adress</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            casablanca Rue hassan 2 ,residece andra
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">matricule de voiture</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                A 122546
                                            </div>
                                        </div>
                                
                                        <hr />

                                    </div>
                                 
                                </div>

                                <button class="btn btn-primary w-100 py-3" type="button">modifier profile</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</section>

<div class="col-md-6 contact-form wow fadeIn bg-light p-4 shadow-sm" style="top:100px;left:100px;z-index:50;" data-wow-delay="0.1s">
    <img src="<?=ROOT?>images/fermer.png" alt="">
    <h4 class="mb-4">modifer vos informations</h4>
    <div class="">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                        <label for="name">Nom</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                        <label for="name">Prenom</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="telephone" placeholder="telephone">
                        <label for="telephone">Telephone</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="date-naissance" placeholder="date-naissance">
                        <label for="date-naissance">Date Naissance</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="pay" placeholder="pay">
                        <label for="pay">Date Naissance</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="ville" placeholder="ville">
                        <label for="ville">Date Naissance</label>
                    </div>
                </div>
                                
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="button">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>


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
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=ROOT?>libs/wow/wow.min.js"></script>
    <script src="<?=ROOT?>libs/easing/easing.min.js"></script>
    <script src="<?=ROOT?>libs/waypoints/waypoints.min.js"></script>
    <script src="<?=ROOT?>libs/counterup/counterup.min.js"></script>
    <script src="<?=ROOT?>libs/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=ROOT?>js/main.js"></script>
</body>

</html>