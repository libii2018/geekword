

<div id="degrade"></div>
    <header id="header" style="background:url(<?php echo URLROOT; ?>/public/img/<?php echo $articles[0]->image; ?>) no-repeat center center/cover;">
        <div class="overlay">
            <div class="container">
                <div class="header-content">
                    <h1><?php echo $articles[0]->titre; ?></h1>
                    <p><?php echo $articles[0]->description; ?></p>
                    <div class="header-description">
                        <p>Categorie : <strong><?php echo $articles[0]->nomCategories; ?></strong></p>
                        <p>Cree le <strong><?php echo $articles[0]->date_de_creation; ?></strong></p>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
    <p><?php echo $articles[0]->contenu; ?></p>
    </form>
    </div>