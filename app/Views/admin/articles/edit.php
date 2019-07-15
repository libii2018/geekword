<a href="<?php echo URLROOT; ?>/posts" class="">Back</a>

<div class="row mb-5">

    <div class="col-md-6 mx-auto">

        <div class="card card-body">

            <h2>Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/admin/articles/edit/<?php echo $article->id; ?>" method="post" enctype="multipart/form-data">
                <div class="">
                    <label for="title">Titre: <sup>*</sup></label>
                    <input type="text" name="titre" class="" value="<?php echo $article->titre; ?>">
                </div>
                <div class="">
                    <label for="title">image: <sup>*</sup></label>
                    <input type="file" name="file" value="<?php echo $article->image; ?>">
                    <img src="<?php echo URLBASE; ?>/public/img/205913.jpg" alt="Smiley face" height="42" width="42">
                    <?php //var_dump(URLBASE."\public\img\\".$article->image); die();?>
                </div>
                <div class="">
                    <label for="contenu">contenu: <sup>*</sup></label>
                    <textarea name="contenu" class=""><?php echo $article->contenu; ?></textarea>
                </div> 
                <div class="">
                    <label for="description">description: <sup>*</sup></label>
                    <textarea name="description" id="editor" class=""><?php echo $article->description; ?></textarea>
                </div>
                <div class="">
                    <select name="categorie">
                        <?php foreach($categories as $categorie) : ?>
                            <option value="<?php echo $categorie->id; ?>"><?php echo  $categorie->nom; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="" value="Submit">
            </form>

        </div>

    </div>


</div>