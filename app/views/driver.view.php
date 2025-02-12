<?php 
require __DIR__."/components/header.php";
?>


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

<?php
require __DIR__."/components/footer.php";
?>