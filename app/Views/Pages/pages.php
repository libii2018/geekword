<?php require APPROOT .'/app/Views/inc/header_public.php'; ?>

<?php if($page): ?>
    <div class="button">
        <div class="precedant"><a href="<?php echo URLROOT; ?>/pages/pages/<?= $page->id_chapitre ?>/<?= $page->numero_de_page - 1?>" class="btn btn-blue">precedant</a></div>
        <div class="numero">numero de la page : <?= $page->numero_de_page ?></div>
        <div class="suivant"><a href="<?php echo URLROOT; ?>/pages/pages/<?= $page->id_chapitre ?>/<?= $page->numero_de_page + 1?>" class="btn btn-blue">suivant</a></div>
    </div>
    <div class="page">
        <div class="pages">
            
            <img src="<?php echo URLROOT; ?>/public/img/pages_mangas/<?= $page->img ?>" alt="">
        </div>
    </div>
<?php else: ?>

    <p>Aucun pages</p>

<?php endif; ?>
