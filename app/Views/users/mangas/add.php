<div class="dashboard-main-wrapper">


<?php require APPROOT .'/app/Views/inc/menu_mangas.php'; ?>

<div class="dashboard-wrapper">
    
<div class="container-fluid dashboard-content">


<div class="row mb-5">

    <div class="col-md-12 mx-auto">

        <div class="card card-body">

            <h2>Add Mangas</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/mangas/add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">titre:</label>
                    <input type="text" name="titre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">desciption:</label>
                    <textarea name="description" class="form-control" rows="4" cols="50"  onmousedown="this.onmousemove='return false';"></textarea>
                </div>
                <div class="form-group">
                    <label for="title">image:</label>
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




