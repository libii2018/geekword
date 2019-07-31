<?php require APPROOT .'/app/Views/inc/header_public.php'; ?>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Carossel -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <div class="carossels">
        <div id="carossel">
            <div class="image">
                <img class="img-src" src="<?php echo URLROOT; ?>/public/img/5.jpg" alt="">
            </div>
            <div class="info">
                <h2>Publie vos ouvres mangas en quelques minutes sur geekworld</h2>
                <p>La communaute MIT est animee par un objectif commun cree un monde meilleur grace a l'eduction a la recherche et al'innovation.Nous sommes
                    amusants et originaux elites mais pas elistes inventifs et artistiques obsedes par les chiffres et accueillants pour les personnes talentueuses 
                    quelle que soit leur origine.
                </p>
                <a href="<?php echo URLROOT; ?>/users/register" class="Btn Btn-blue">Subscribe</a>
            </div>
        </div>

        <!-- <div id="carossel">
                <div class="image">
                    <img class="img-src" src="img/6.jpg" alt="">
                </div>
                <div class="info">
                    <h2>Publie vos ouvres mangas en quelques minutes sur geekworld</h2>
                    <p>La communaute MIT est animee par un objectif commun cree un monde meilleur grace a l'eduction a la recherche et al'innovation.Nous sommes
                        amusants et originaux elites mais pas elistes inventifs et artistiques obsedes par les chiffres et accueillants pour les personnes talentueuses 
                        quelle que soit leur origine.
                    </p>
                    <a href="#" class="Btn Btn-blue">Subscribe</a>
                </div>
            </div> -->
        
    </div>
    
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Carossel -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->



    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!-- <section id="creation">
        <div class="container">
            <div class="header">
                <div class="titre"><h2>Les articles les plus populaire</h2></div>
                <div class="lien"><a href="<?php echo URLROOT; ?>/pages/mangas">Voir plus</a></div>
            </div>
            <div class="Card_container">

            <?php $i = 0; ?>
            <?php foreach($articles as $articles): ?>
                <?php $i++; ?>
                <?php if($i <= 4): ?>
                    <div class="Card">
                        <div class="image-card">
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $articles->id ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $articles->img ?>" alt=""></a>
                        </div>
                        <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $articles->id ?>"><h2><?= $articles->titre ?></h2></a>
                        <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $articles->id ?>"><h3><?= $articles->id_user ?></h3></a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

                <div class="footer">
                    <div class="lien_mobile"><a href="<?php echo URLROOT; ?>/pages/mangas">Voir plus</a></div>
                </div>
            </div>    
        </div>
    </section> -->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->


    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="creation">
        <div class="container">
            <div class="header">
                <div class="titre"><h2>Les mangas les plus populaire</h2></div>
                <div class="lien"><a href="<?php echo URLROOT; ?>/pages/mangas">Voir plus</a></div>
            </div>
            <div class="Card_container">

            <?php $i = 0; ?>
            <?php foreach($mangas as $mangas): ?>
                <?php $i++; ?>
                <?php if($i <= 4): ?>
                    <div class="Card">
                        <div class="image-card">
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $mangas->mangasId ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $mangas->mangasImage ?>" alt=""></a>
                        </div>
                        <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $mangas->mangasId ?>"><h2><?= $mangas->mangasTitre ?></h2></a>
                        <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $mangas->mangasId ?>"><h3><?= $mangas->usersName ?></h3></a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

                <div class="footer">
                    <div class="lien_mobile"><a href="<?php echo URLROOT; ?>/pages/mangas">Voir plus</a></div>
                </div>
            </div>    
        </div>
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="creation">
        <div class="container">
            <div class="header">
                <div class="titre"><h2>Les comic les plus populaire</h2></div>
                <div class="lien"><a href="<?php echo URLROOT; ?>/pages/comic">Voir plus</a></div>
            </div>
            <div class="Card_container">

                <?php $i = 0; ?>
                <?php foreach($Comic as $Comic): ?>
                    <?php $i++; ?>
                    <?php if($i <= 3): ?>
                        <div class="Card">
                            <div class="image-card">
                                <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Comic->mangasId ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $Comic->mangasImage ?>" alt=""></a>
                            </div>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Comic->mangasId ?>"><h2><?= $Comic->mangasTitre ?></h2></a>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Comic->mangasId ?>"><h3><?= $Comic->usersName ?></h3></a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="footer">
                    <div class="lien_mobile"><a href="<?php echo URLROOT; ?>/pages/comic">Voir plus</a></div>
                </div>
            </div>    
        </div>
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="creation">
        <div class="container">
            <div class="header">
                <div class="titre"><h2>Les BD les plus populaire</h2></div>
                <div class="lien"><a href="<?php echo URLROOT; ?>/pages/bd">Voir plus</a></div>
            </div>
            <div class="Card_container">

                <?php $i = 0; ?>
                <?php foreach($BD as $BD): ?>
                    <?php $i++; ?>
                    <?php if($i <= 3): ?>
                        <div class="Card">
                            <div class="image-card">
                                <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $BD->mangasImage ?>" alt=""></a>
                            </div>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><h2><?= $BD->mangasTitre ?></h2></a>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><h3><?= $BD->usersName ?></h3></a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="footer">
                    <div class="lien_mobile"><a href="<?php echo URLROOT; ?>/pages/bd">Voir plus</a></div>
                </div>
            </div>    
        </div>
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="creation">
        <div class="container">
            <div class="header">
                <div class="titre"><h2>Les Ligth Novel plus les populaire</h2></div>
                <div class="lien"><a href="<?php echo URLROOT; ?>/pages/ligth_novel">Voir plus</a></div>
            </div>
            <div class="Card_container">

                <?php $i = 0; ?>
                <?php foreach($Ligth_Novel as $Ligth_Novel): ?>
                    <?php $i++; ?>
                    <?php if($i <= 3): ?>
                        <div class="Card">
                            <div class="image-card">
                                <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Ligth_Novel->mangasId ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $Ligth_Novel->mangasImage ?>" alt=""></a>
                            </div>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Ligth_Novel->mangasId ?>"><h2><?= $Ligth_Novel->mangasTitre ?></h2></a>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $Ligth_Novel->mangasId ?>"><h3><?= $Ligth_Novel->usersName ?></h3></a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="footer">
                    <div class="lien_mobile"><a href="<?php echo URLROOT; ?>/pages/ligth_novel">Voir plus</a></div>
                </div>
            </div>    
        </div>
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

       
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section-1 -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <section id="section-1">
        <div class="container">
            <h2>Publie vos ouvres mangas en quelques minutes sur geekworld</h2>
            <div class="container_text">
                <p>La communaute MIT est animee par un objectif commun cree un monde meilleur grace a l'eduction a la recherche et al'innovation.Nous sommes
                    amusants et originaux elites mais pas elistes inventifs et artistiques obsedes par les chiffres et accueillants pour les personnes talentueuses 
                    quelle que soit leur origine.
                </p>
            </div>
            <a href="<?php echo URLROOT; ?>/users/register" class="Btn Btn-blue">Subscribe</a>
        </div>
    </section>
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section-1 -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section Email -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="email">
        <div class="container">
            <h2>RESTE PROCHE DE TOUT CE QUI VOUS PASSIONNE</h2>
            <p>Souscrire a notre newlettre et soyez parmi les premier informer des nouveautes vos 
                themes premier
            </p>
            <div class="search-container">
                <form action="">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit">Subscribe</i></button>
                </form>
            </div>
        </div>
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section Email -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
