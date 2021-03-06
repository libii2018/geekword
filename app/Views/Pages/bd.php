<?php require APPROOT .'/app/Views/inc/header_public.php'; ?>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section Box -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <div id="box">
        <div class="container">
            <h2>BD</h2>
            <a href="" class="Btn Btn-blue">Ajouter mon manga</a>
        </div>
    </div>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Box -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section Navbar 2 -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <div id="navbar_2">
        <div class="container">
            <div><a href="mangas.html" class="">Films et series</a></div>
            <div><a href="mangas.html" class="">IT</a></div>
            <div><a href="mangas.html" class="">Mangas</a></div>
            <div><a href="mangas.html" class="">Gaming</a></div>
            <div><a href="mangas.html" class="">Evenements</a></div>
        </div>
    </div>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section Navbar 2 -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

    <section id="box_2">
        <h2 class='titre'>Tous les BD</h2>
                <div class="box_2">
                    <?php foreach($BD as $BD):?> 
                        <div class="Card">
                            <div class="image-card">
                                <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><img class="img-src" src="<?php echo URLROOT; ?>/public/img/<?= $BD->mangasImage ?>" alt=""></a>
                            </div>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><h2><?= $BD->mangasTitre ?></h2></a>
                            <a href="<?php echo URLROOT; ?>/pages/chapitre/<?= $BD->mangasId ?>"><h3><?= $BD->usersName ?></h3></a>
                        </div>
                    <?php endforeach ?>
                </div>  
    </section>

    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Section creation -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->


    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- Js -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->
    <!-- End Js -->
    <!--------------------------------------------------------------------->
    <!--------------------------------------------------------------------->

</body>