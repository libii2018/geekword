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
                        <h2 class="pageheader-title">UTILISATEUR</h2>
                    </div>
                    <a href="<?php echo URLROOT; ?>/admin/articles/add" class="btn btn-success">Ajouter</a>
                </div>
                
            </div>

            <div class="row  m-t-30">
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
                                            <th scope="col">NOM</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">MOT DE PASSE</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">EDITER</th>
                                            <th scope="col">SUPPRIMER</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($users as $user): ?>

                                            <?php if($user->name !== $_SESSION['user_name'] ) : ?>

                                                <tr>
                                                    <th scope="row"><?= $user->id; ?></th>
                                                    <th><?= $user->name; ?></th>
                                                    <th><?= $user->email; ?></th>
                                                    <th><?= $user->password; ?></th>
                                                    <th><?php if($user->admin == 1){ echo "ADMINISTRATEUR";}else{ echo "UTILISATEUR";} ?></th>
                                                    <th><a class="btn btn-primary" href="<?php echo URLROOT; ?>/articles/edit/<?= $articles->id; ?>">Editer</a></th>
                                                    <th>

                                                    <form action="<?php echo URLROOT; ?>/articles/delete/<?= $articles->id; ?>" method="post" style="display: inline;">

                                                        <input type="hidden" name="id" value="<?= $articles->id; ?>">

                                                        <button type="submit" class="btn btn-danger">Supprimer</button>


                                                    </form>

                                                    </th>
                                                </tr>

                                            <?php endif; ?>


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










    
