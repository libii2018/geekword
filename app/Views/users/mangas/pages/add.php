<form action="<?php echo URLROOT; ?>/pagesMangas/add/<?= $id_chapitre; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple>
    <input type="submit" name="submit" value="Upload">
</form>