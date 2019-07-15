<?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>

<div class="dashboard-wrapper">

<div class="container-fluid dashboard-content">

<div class="row m-t-40">

    <div class="m-t-40">
        <a href="<?php echo URLROOT; ?>/pagesMangas/add/<?= $id_chapitre; ?>" class="btn btn-success">Ajouter</a>
    </div>

    <div class="flex m-r-10 m-l-10 m-t-20 m-b-10">

        <?php foreach($pages as $page): ?>

            
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="<?= URLROOT; ?>/public/img/pages_mangas/<?= $page->pagesImg; ?>" alt="" class="img-fluid">
                        <div class="card-body">
                            <h3 class="card-title"><?= $page->pagesImg; ?></h3>

                        </div>
                    </div>
                </div>
            
            

        <?php endforeach; ?>
</div>

</div>

</div>

</div>