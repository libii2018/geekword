<?php require APPROOT .'/app/Views/inc/header_admin.php'; ?>

<div class="dashboard-main-wrapper">

<?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>
   <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
<div class="dashboard-wrapper">
    


    

        <div class="container-fluid dashboard-content">
        

           <!-- ============================================================== -->
            <!-- ARTICLE -->
            <!-- ============================================================== -->



            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ARTICLES</h2>
                    </div>
                    <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-success">Ajouter</a>
                </div>
                
            </div>

            <div class="row m-t-30">
                    <!-- ============================================================== -->
                    <!-- basic table -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">TITRE</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col">CATEGORIES</th>
                                            <th scope="col">EDITER</th>
                                            <th scope="col">SUPPRIMER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($articles as $articles): ?>

                                        <tr>
                                            <th scope="row"><?= $articles->id; ?></th>
                                            <th><?= $articles->titre; ?></th>
                                            <th><?= $articles->description; ?></th>
                                            <th><?= $articles->nomCategories; ?></th>
                                            <!-- <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/index/<?= $articles->id; ?>">VOIR LES CHAPITRES</a></th> -->
                                            <!-- <th><img src="<?php echo URLROOT; ?>/public/img/<?= $articles->image; ?>" width="60"></th> -->
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/edit/<?= $articles->id; ?>">Editer</a></th>
                                            <th>

                                                    <form action="<?php echo URLROOT; ?>/users/delete/<?= $articles->id; ?>" method="post" style="display: inline;">
                                    
                                                        <input type="hidden" name="id" value="<?= $articles->id; ?>">
                                    
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    
                                                    
                                                    </form>

                                            </th>
                                        </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table -->
                    <!-- ============================================================== -->
            </div>

             <!-- ============================================================== -->
            <!-- END ARTICLE -->
            <!-- ============================================================== -->

        </div>

            

    
        
       
</div>

</div>

<?php require APPROOT .'/app/Views/inc/footer_admin.php'; ?>