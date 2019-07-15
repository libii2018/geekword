<div class="dashboard-main-wrapper">
    
    <?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
    
    

    

    <div class="container-fluid dashboard-content">

        <!-- ============================================================== -->
        <!-- MANGAS -->
        <!-- ============================================================== -->



        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">CHAPITRES</h2>
                </div>
                <a href="<?php echo URLROOT; ?>/ChapitreMangas/add/<?= $id_mangas; ?>" class="btn btn-success">Ajouter</a>
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
                                        <th scope="col">NOM DU MANGAS</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">CATEGORIES</th>
                                        <th scope="col">LES PAGES</th>
                                        <th scope="col">EDITER</th>
                                        <th scope="col">SUPPRIMER</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($chapitres as $chapitre): ?>

                                    <tr>
                                        <th scope="row"><?= $chapitre->chapitreId; ?></th>
                                        <th><?= $chapitre->chapitreTitre; ?></th>
                                        <th><?= $chapitre->mangasTitre; ?></th>
                                        <th><?= $chapitre->chapitreDescription; ?></th>
                                        <th><?= $chapitre->nomCategories; ?></th>
                                        <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/pagesMangas/index/<?= $chapitre->chapitreId; ?>">VOIR LES PAGES</a></th>
                                        <!-- <th><img src="<?php echo URLROOT; ?>/public/img/<?= $chapitre->mangasImage; ?>" width="60"></th> -->
                                        <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/chapitreMangas/edit/<?= $chapitre->chapitreId; ?>">Editer</a></th>
                                        <th>

                                                <form action="<?php echo URLROOT; ?>/chapitreMangas/delete/<?= $chapitre->chapitreId; ?>" method="post" style="display: inline;">
                                
                                                    <input type="hidden" name="mangasId" value="<?= $chapitre->chapitreId; ?>">
                                
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
        <!-- END MANGAS -->
        <!-- ============================================================== -->

    </div>

        


    
   
    </div>

</div>