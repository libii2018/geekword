<nav id="navbar">
    <ul>
        <?php foreach($GrandeCategories as $GrandeCategorie) : ?>
            <li><a class="<?= ($GrandeCategorie->id == $id) ? "active".$id : " "  ?>" href="<?php echo URLROOT; ?>/pages/index/<?php echo $GrandeCategorie->slug; ?>"><?php echo $GrandeCategorie->nom; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>

<!-- End navbar -->

<div id="navbar_mobile">
    <?php foreach($GrandeCategories as $GrandeCategorie) : ?>
        <div class="grandeCategorie"><a href="<?php echo URLROOT; ?>/pages/index/<?php echo $GrandeCategorie->slug; ?>"><?= $GrandeCategorie->nom; ?></a></div>
    <?php endforeach; ?>
</div>

<!-- Navbar mobile -->