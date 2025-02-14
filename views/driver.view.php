<?php require __DIR__."/components/header.php"; ?>
    <main class="container-fluid p-5">
        <?php if(isset($_SESSION['USER'])){ ?>
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
                                <h2 class="mb-0"><?=$_SESSION['USER']->nom .' '.$_SESSION['USER']->prenom ;?></h2>
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
                                            <div class="col-sm-3 col-md-4 col-5">
                                                <label class="fw-bold">Nom complet</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$_SESSION['USER']->nom .' '.$_SESSION['USER']->prenom ;?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-4 col-5">
                                                <label class="fw-bold">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$_SESSION['USER']->email;?> 
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-4 col-5">
                                                <label class="fw-bold">Telephone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$_SESSION['USER']->phone;?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-4 col-5">
                                                <label class="fw-bold">Date de naissance</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$_SESSION['USER']->date_naissance ;?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-4 col-6">
                                                <label class="fw-bold">Pays / Ville</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$_SESSION['USER']->pays.' '.$_SESSION['USER']->ville ;?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-4 col-5">
                                                <label class="fw-bold">Matricule de voiture</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                A 122546
                                            </div>
                                        </div>
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
                                        <input type="text" class="form-control" id="name" value="<?=$_SESSION['USER']->nom?>" placeholder="Votre nom">
                                        <label for="name">Nom</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="prenom" value="<?=$_SESSION['USER']->prenom?>" placeholder="Votre prénom">
                                        <label for="prenom">Prénom</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" value="<?=$_SESSION['USER']->email?>" placeholder="Votre email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="telephone" value="<?=$_SESSION['USER']->phone?>" placeholder="Téléphone">
                                        <label for="telephone">Téléphone</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="date-naissance" value="<?=$_SESSION['USER']->date_naissance?>" placeholder="Date de naissance">
                                        <label for="date-naissance">Date de naissance</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="pays" value="<?=$_SESSION['USER']->pays?>" placeholder="Pays">
                                        <label for="pays">Pays</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ville" value="<?=$_SESSION['USER']->ville?>" placeholder="Ville">
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
        <?php } ?>
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
    </script>
</body>

</html>