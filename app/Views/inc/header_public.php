    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Header -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <header id="header">
        <nav class="navbar">
            <div class="left">
                <a href="<?php echo URLROOT; ?>/pages/index" class="lien_logo">Geekwold</a>
            </div>
            <div class="rigth">
                <div class="menu">
                    <a href="<?php echo URLROOT; ?>/pages/mangas" class="lien_menu">Mangas</a>
                    <a href="<?php echo URLROOT; ?>/pages/comic" class="lien_menu">Comic</a>
                    <a href="<?php echo URLROOT; ?>/pages/ligth_novel" class="lien_menu">Ligth Novel</a>
                    <a href="<?php echo URLROOT; ?>/pages/bd" class="lien_menu">BD</a>
                </div>
                <div class="bar"></div>
                <div class="user">
                    <a href="<?php echo URLROOT; ?>/users/login" class="lien_user login">Login</a>
                    <a href="<?php echo URLROOT; ?>/users/register" class="lien_user connecter">Se connecter</a>
                </div>

                <!-- <div id="nav-user">
                    <div><button onclick="OnClickDropdown()" id="nav-user-img" ><img src="<?php echo URLROOT; ?>/public/img/<?php echo $_SESSION['user_img']; ?>" alt="" class="user-avatar-md rounded-circle"></button></div>
                    
                    <div id="nav-user-dropdown" class="nav-user-dropdown">
                        <div class="nav-user-info">
                            <h5 class="nav-user-name"><?php echo $_SESSION['user_name']; ?></h5>
                            <span class="status"></span><span class="ml-2">Available</span>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </div> -->
            </div>
        </nav>
    </header>
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Header -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Hamburger Menu -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <div id="menu-bar">
        <div id="menu" onclick="OnClickMenu()">
            <div id="bar1" class="bar_res"></div>
            <div id="bar2" class="bar_res"></div>
            <div id="bar3" class="bar_res"></div>
        </div>
        <ul class="nav_res" id="nav_res">
            <li><a href="<?php echo URLROOT; ?>/pages/mangas">Mangas</a></li>
            <li><a href="<?php echo URLROOT; ?>/pages/comic">Comic</a></li>
            <li><a href="<?php echo URLROOT; ?>/pages/ligth_novel">Ligth Novel</a></li>
            <li><a href="<?php echo URLROOT; ?>/pages/bd">BD</a></li>
        </ul>
    </div>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Hamburger Menu -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    