<div class="dashboard-main-wrapper">

<?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>
   <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
<div class="dashboard-wrapper">
    


    

        <div class="container-fluid dashboard-content">
        

           <!-- ============================================================== -->
            <!-- ARTICLES -->
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
                                            <th scope="col">CATEGORIES</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col">EDITER</th>
                                            <th scope="col">SUPPRIMER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($articles as $articles): ?>

                                        <tr>
                                            <th scope="row"><?= $articles->id; ?></th>
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/show/<?php echo $articles->slug; ?>"><?= $articles->titre; ?></a></th>
                                            <th><?= $articles->nomCategories; ?></th>
                                            <th><?= $articles->description; ?></th>
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/edit/<?= $articles->id; ?>">Editer</a></th>
                                            <th>

                                                    <form action="<?php echo URLROOT; ?>/admin/articles/delete/<?= $articles->id; ?>" method="post" style="display: inline;">
                                    
                                                        <input type="hidden" name="id" value="<?= $articles->id; ?>">
                                    
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    
                                                    
                                                    </form>

                                            </th>
                                        </tr>
                    </div>
                </div>

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
            <!-- END ARTICLES -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- MANGAS -->
            <!-- ============================================================== -->



            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">MANGAS</h2>
                    </div>
                    <a href="<?php echo URLROOT; ?>/mangas/add" class="btn btn-success">Ajouter</a>
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
                                            <th scope="col">CATEGORIES</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col">CATEGORIES</th>
                                            <th scope="col">LES CHAPITRES</th>
                                            <th scope="col">EDITER</th>
                                            <th scope="col">SUPPRIMER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($mangas as $mangas): ?>

                                        <tr>
                                            <th scope="row"><?= $mangas->mangasId; ?></th>
                                            <th><?= $mangas->mangasTitre; ?></th>
                                            <th><?= $mangas->nomCategories; ?></th>
                                            <th><?= $mangas->mangasDescription; ?></th>
                                            <th><?= $mangas->nomCategories; ?></th>
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/ChapitreMangas/index/<?= $mangas->mangasId; ?>">VOIR LES CHAPITRES</a></th>
                                            <!-- <th><img src="<?php echo URLROOT; ?>/public/img/<?= $mangas->mangasImage; ?>" width="60"></th> -->
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/mangas/edit/<?= $mangas->mangasId; ?>">Editer</a></th>
                                            <th>

                                                    <form action="<?php echo URLROOT; ?>/mangas/delete/<?= $mangas->mangasId; ?>" method="post" style="display: inline;">
                                    
                                                        <input type="hidden" name="mangasId" value="<?= $mangas->mangasId; ?>">
                                    
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