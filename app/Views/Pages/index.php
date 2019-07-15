
    <?php

        // echo '<pre>';
        // var_dump($data["GrandeCategories"]);
        // echo '</pre>';
        // die();

    ?>
<div id="degrade"></div>
<header id="header" style="background:url(<?php echo URLROOT; ?>/public/img/7.png) no-repeat center center/cover;">
    <div class="overlay">
        <div class="container">
            <div class="header-content">
                <h1>Geekword</h1>
                <p>L'univers des etres extra</p>
                <div class="btn-header">
                    <a href="<?php echo URLROOT; ?>/users/register" class="btn-border-color">Je suis nouveau</a>
                    <a href="<?php echo URLROOT; ?>/users/login" class="btna bouttonCouleur<?php echo $id?>">Me connecter</a>
                </div>
            </div> 
        </div>
    </div>
</header>   

<?php require dirname(dirname(__DIR__)) .'/Views/inc/navbar.php'; ?>

<section id="categorie" style="background:url(<?php echo URLROOT; ?>/img/6.jpg) no-repeat center center/cover;">

    <?php foreach($categories as $categorie) : ?>

        <div class="overlay-categorie couleur<?php echo $categorie->id?>">

            <div class="contenu-categorie">

                <div class="categorie-indication-mobile">
                    <h2>Recents</h2>
                </div>

                <div class="cards">

                
                    <?php foreach($categorie->items as $item) : ?>

                        <a href="<?php echo URLROOT; ?>/pages/article/<?php echo $item->slug; ?>">

                            <div class="card"  style="background:url(<?php echo URLROOT; ?>/public/img/<?php echo $item->image; ?>) no-repeat center center/cover;">
                                <div class="overlay-card">
                                    <div class="card-content">
                                        <div class="header">
                                            <p class="icon">Nouveautes</p>
                                        </div>
                                        <div class="body">
                                            <h1><?php echo $item->titre; ?></h1>
                                            <p><?php echo $item->description; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php endforeach; ?>
                    
                </div>

                <div class="lien-categorie">
                    <a href="#" class="btn-categorie">Voir plus > </a>
                </div>
    
                <div class="categorie-indication">
                    <div class="left couleurIndicationleft<?php echo $categorie->id?>">
                        <?php echo $categorie->nom; ?>
                    </div>
                    <div class="rigth couleurIndicationrigth<?php echo $categorie->id?>"></div>
                </div>
            </div>

            
        </div>

    <?php endforeach; ?>
        
</section>

<section id="evenement" style="background:url(<?php echo URLROOT; ?>/public/img/6.jpg) no-repeat center center/cover;">
    <div class="overlay-green">
        <div class="containere">
            <img src="img/4.png" alt="">
            <p>Tout les evenements des geek</p>
        </div>
    </div>
</section>

<section id="evenement-semaine">
    <div class="containere">
        <p>Evenement de la semaine</p>
    </div>
</section>

<section id="evenements-slider">

        <div class="evenement-background">

            <?php foreach($evenements as $evenement) : ?>

                <div class="evenement-slider" style="background:url(<?php echo URLROOT; ?>/public/img/<?php echo $evenement->image; ?>) no-repeat center center/cover;">
                    <div class="overlay-blue"></div>
                </div>

            <?php endforeach; ?>


        </div>
        
        

        <div class="evenement-contenue">

            <?php foreach($evenements as $evenement) : ?>
                
                <div class="card-even">
                    
                    <div class="header">
                        <a href="#" class="btn-even-header" style="background:<?php echo $evenement->couleur_type; ?>;"><?php echo $evenement->type; ?></a>
                    </div>
                    <div class="body">
                        <h1><?php echo $evenement->titre; ?></h1>
                        <p><?php echo $evenement->description; ?></p>
                        <a href="#" class="btn-even">Reserver ma place</a>
                    </div>

                </div>

            <?php endforeach; ?>
            
        </div>

</section>

<section id="partenaires">
        <div class="header">
            <h1>partenaire</h1>
        </div>
        <ul>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/google-2015.svg" alt=""></li>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/google-icon.svg" alt=""></li>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/mango-2.svg" alt=""></li>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/mango-4.svg" alt=""></li>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/myweb.svg" alt=""></li>
            <li><img src="<?php echo URLROOT; ?>/public/img/partenaires/nike-3.svg" alt=""></li>
        </ul>
    
</section>
