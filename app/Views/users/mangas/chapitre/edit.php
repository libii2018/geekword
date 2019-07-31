<?php require APPROOT .'/app/Views/inc/header_admin.php'; ?>
<div class="row mb-5">

    <div class="col-md-6 mx-auto">

        <div class="card card-body">

            <h2>Edit Chapitre</h2>
            <p></p>
            <?php  ?>
            <form action="<?php echo URLROOT; ?>/chapitreMangas/edit/<?php echo $chapitres->id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">titre: <sup>*</sup></label>
                    <input type="text" name="titre" class="form-control" value="<?php echo $chapitres->titre; ?>">
                </div>
                <div class="form-group">
                    <label for="description">description: <sup>*</sup></label>
                    <textarea name="description" class="form-control"><?php echo $chapitres->description; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="title">image: <sup>*</sup></label>
                    <input type="file" name="file" class="form-control-file">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>

    </div>


</div>
<?php require APPROOT .'/app/Views/inc/footer_admin.php'; ?>




