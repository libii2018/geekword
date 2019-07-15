
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
    
    <?php require APPROOT .'/app/Views/inc/menu_dash.php'; ?>

    <div class="dashboard-wrapper">

        

        <div class="container-fluid dashboard-content">


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">EVENEMENT</h2>
                    </div>
                    <a href="<?php echo URLROOT; ?>/admin/articles/add" class="btn btn-success">Ajouter</a>
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
                                            <th scope="col">TYPE</th>
                                            <th scope="col">TITRE</th>
                                            <th scope="col">COULEUR</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col">IMAGE</th>
                                            <th scope="col">EDITER</th>
                                            <th scope="col">SUPPRIMER</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($evenements as $evenement): ?>

                                        <tr>
                                            <th scope="row"><?= $evenement->id; ?></th>
                                            <th><?= $evenement->type; ?></th>
                                            <th><?= $evenement->titre; ?></th>
                                            <th><?= $evenement->couleur_type; ?></th>
                                            <th><?= $evenement->description; ?></th>
                                            <th><img src="<?php echo URLROOT; ?>/public/img/<?= $evenement->image; ?>" width="60"></th>
                                            <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/articles/edit/<?= $articles->id; ?>">Editer</a></th>
                                            <th>

                                                <form action="<?php echo URLROOT; ?>/articles/delete/<?= $articles->id; ?>" method="post" style="display: inline;">
                                                    
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

        </div>

            

    </div>
        
       
</div>

