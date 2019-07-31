<?php require APPROOT .'/app/Views/inc/header_admin.php'; ?>

<div class="dashboard-main-wrapper">


<?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>

<div class="dashboard-wrapper">
    
<div class="container-fluid dashboard-content">

<div class="row mb-5">

    <div class="col-md-6 mx-auto">

        <div class="card card-body">

            <h2>Edit Mangas</h2>
            <p></p>
            <?php  ?>
            <form action="<?php echo URLROOT; ?>/mangas/edit/<?php echo $mangas->id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">titre: <sup>*</sup></label>
                    <input type="text" name="titre" class="form-control" value="<?php echo $mangas->titre; ?>">
                </div>
                <div class="form-group">
                    <label for="description">description: <sup>*</sup></label>
                    <textarea name="description" class="form-control"><?php echo $mangas->description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="title">image: <sup>*</sup></label>
                    <input type="file" name="file" class="form-control-file">
                </div>
                <div class="form-group">
                    <select name="categorie" class="form-control">
                        <?php foreach($categories as $categorie) : ?>
                            <option value="<?php echo $categorie->id; ?>"><?php echo  $categorie->nom; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>

    </div>


</div>

</div>

</div>

</div>
<?php require APPROOT .'/app/Views/inc/footer_admin.php'; ?>




