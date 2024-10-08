<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">WIB</span>
                    <span class="profession">Espace Admin</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                

                <ul class="menu-links" id="maListe">
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/home.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/categories/liste.php">
                        <i class='bx bx-grid icon'></i>
                            <span class="text nav-text">Catégories</span>
                        </a>
                    </li>
                    <!-- <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/produits/liste.php">
                            <i class='bx bx-shopping-bag icon'></i>
                            <span class="text nav-text">Produits</span>
                        </a>
                    </li> -->
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/nouveaux/liste.php">
                        <i class='bx bx-basket icon'></i>
                            <span class="text nav-text">Nouveautés</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/promotions/liste.php">
                        <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Promotions</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/fourniture_bureautique/liste.php">
                        <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Founiture bureautique</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/fourniture_scolaire/liste.php">
                        <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Founiture Scolaire</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/stocks/liste.php">
                        <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Stocks</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/commandes/liste.php">
                        <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">Panier</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/visiteurs/liste.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Visiteurs</span>
                        </a>
                    </li>

                    

                    <li class="nav-link active">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/admin/profile.php">
                            <i class='bx bx-user-circle icon'  style="color: #FFFFFF;"></i>
                            <span class="text nav-text " style="color: #FFFFFF;">Profile</span>
                        </a>
                    </li>

                    

                </ul>
            </div>

            <div class="bottom-content">
                <li class="" >
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/wib/deconnexion.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Se déconnecter</span>
                    </a>
                </li>

                

            </div>
        </div>

    </nav>