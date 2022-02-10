<section id="page-content">
    <div class="container">
        <div class="row">
        
               <!-- SIDEBAR -->
            <div id="info-section" class="col-md-3">
                <h4 class="text-uppercase">Vos informations</h4>
                <p><strong>Votre société</strong><br><img id="info-section-logo"></p>
                <p><strong>Nom</strong><br><small id="info-section-lastname"></small></p>
                <p><strong>Prénom</strong><br><small id="info-section-firstname"></small></p>
                <p><strong>Mot de passe</strong><br><small>******</small></p>
                <a id="info-section-reload" href="#" class="btn btn-inverted btn-sm">Actualiser</a><br><br>
                <a href="../storage/app/public/docs/cgvfr.pdf">Conditions générales</a><br><br>
                <a href="../storage/app/public/docs/DocAssuranceOmnium_B2C_FR.pdf">Assurance Omnium</a><br><br>
                <a href="../storage/app/public/docs/KAMEO-BikePolicy.pdf">Bike policy</a><br><br>
                <a href="../storage/app/public/docs/manueldutilisationmykameo.pdf">Manuel d'utilisation</a><br><br>
                <a href="#" class="btn btn-inverted btn-sm" target="_blank">Partager vos impressions</a><br><br>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-inverted btn-sm">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <!-- END SIDEBAR -->
    
            <!-- WIDGETS -->
            <div class="col-md-9">
            <h2 class="text-uppercase">My kameo</h2><i class="fa fa-2x fa-bell float-right text-primary"></i>
            
            
                <div class="tabs tabs-folder">
                    <ul class="nav nav-tabs" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#fleet" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-user"></i> Fleet manager</a>
                        </li>
                        <!-- 2e TAB -->
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li> 
                        -->
                        <!-- END 2e TAB -->
                    </ul>
                    <div class="tab-content" id="myTabContent3">
                        <div class="tab-pane fade show active" id="fleet" role="tabpanel" aria-labelledby="home-tab">
                            
                            <h4> Administration Kameo</h4>
                            <div class="space"></div>
                            
                            <div id="widget-list" class="row">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            </div>
            <!-- END WIDGETS -->
            
        </div>
    </div>
</section>