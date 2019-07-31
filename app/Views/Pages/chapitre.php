<?php require APPROOT .'/app/Views/inc/header_public.php'; ?>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section Box -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <div id="chapitre">
        <div class="container">
           
                <div class="img_chap" style="background:url(<?php echo URLROOT; ?>/public/img/<?= $Mangas->chapitreImg; ?>) no-repeat center center/cover;"></div>
                <div class="titre"><h2><?php if($Mangas === false){ echo 'Pas de chapitre'; }else{ echo $Mangas->chapitreTitre; }  ?></h2></div> 
            
        </div>
    </div>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Box -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section Main -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <div id="main">

        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- Section Infos -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <?php if(isset($pages)): ?>
            <div class="infos">
                <div class="auteur">
                    <div class="img"  style="background:url(<?php echo URLROOT; ?>/public/img/<?= $Mangas->userImg; ?>) no-repeat center center/cover;"></div>
                    <div class="pseudo">
                        <p>Auteur</p>
                        <p class="gras"><?= $Mangas->userNom; ?></p>
                    </div>
                </div>
                <div class="vue">
                    <p>Vues</p>
                    <p class="gras"><?= $Mangas->chapitreVue; ?></p>
                </div>
                <div class="date">
                    <p>Date de sortie</p>
                    <p class="gras"><?= $Mangas->chapitreDate; ?></p>
                </div>
                <div class="categorie">
                    <p>Categorie</p>
                    <p class="gras"><?= $Mangas->grandesCategorieNom; ?></p>
                </div>
            </div>
        <?php endif; ?>
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- End Section Infos -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->

        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- Section Text -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->

        <section id="text">
            <p>Les débouchés pour l’UX design ne manquent pas, mais certains secteurs 
                semblent déjà plus favorables que d’autres à l’éclosion du design. Ces quelques 
                clés de lecture ne doivent pas . Les débouchés pour l’UX design ne manquent pas, 
                mais certains secteurs semblent déjà plus favorables que d’autres à 
                l’éclosion du design. Ces quelques clés de lecture ne doivent pas
            </p>
        </section>

        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- End Section Text -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->

        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- Section Chapitre -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->

        <section id="chapitres">
            <h2>Chapitre</h2>
            <div class="boxe_chapitre">
                <?php foreach($toutChapitreMangas as $toutChapitreMangas): ?>
                    <div class="boxe">
                        <a href="<?php echo URLROOT; ?>/pages/pages/<?= $toutChapitreMangas->id; ?>">
                            <div class="chap_nom"><h3><?= $toutChapitreMangas->titre; ?> <?= $toutChapitreMangas->numero_de_chapitre; ?> :<span><?= $toutChapitreMangas->titre; ?></span></h3></div>
                        </a>
                        <div class="chap_date"><p><?= $toutChapitreMangas->date_de_creation; ?></p></div>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->
        <!-- End Section Chapitre -->
        <!--------------------------------------------------------------------->
        <!--------------------------------------------------------------------->



    </div>


