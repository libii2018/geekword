<?php require APPROOT .'/app/Views/inc/header_admin.php'; ?>

<div class="row mb-5">

    <div class="col-md-6 mx-auto">

        <div class="card card-body">

            <h2>Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/admin/articles/add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="titre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">image: <sup>*</sup></label>
                    <input type="file" name="file" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="contenu">contenu: <sup>*</sup></label>
                    <textarea name="contenu" id="editor" class="form-control"></textarea>
                </div> 
                <div class="form-group">
                    <label for="description">desciption: <sup>*</sup></label>
                    <textarea name="description" class="form-control"></textarea>
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
<?php require APPROOT .'/app/Views/inc/footer_admin.php'; ?>



