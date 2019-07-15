<!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">


        <nav class="navbar navbar-expand-lg bg-white fixed-top">

            <a class="navbar-brand" href="index.html">Geekword</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto navbar-right-top">

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo URLROOT; ?>/public/img/<?php echo $_SESSION['user_img']; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['user_name']; ?></h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </div>
                    </li>

                </ul>

            </div>
            

        </nav>

    </div>


    <div class="nav-left-sidebar sidebar-dark">

            <div class="menu-list">
    
                <nav class="navbar navbar-expand-lg navbar-light">
    
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
    
                        <ul class="navbar-nav flex-column p-t-20">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/articles/index">Article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/evens/index">Evenement</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URLROOT; ?>/admin/categories/index">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT; ?>/admin/gestionUsers/index">Utilisateur</a>
                            </li>
                        </ul>
                        
                </nav>
    
            </div>

    </div>