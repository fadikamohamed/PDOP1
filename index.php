<?php
/* Inclusion des modele contenant les class */
include 'models/modelClientsList.php';
include 'models/modelShowType.php';
include 'models/modelShowsList.php';

/* Inclusion des controllers */
include 'controllers/controllerListClients.php';
include 'controllers/controllerShowType.php';
include 'controllers/controllerTwentyFirstClients.php';
include 'controllers/controllerClientsHaveFidelityCard.php';
include 'controllers/controllerClientsBeginByM.php';
include 'controllers/controllerShowsList.php';
include 'controllers/controllerClientsInfoList.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
        <link rel="stylesheet" href="assets/css/style.css"/>
        <title>PDO Partie 1</title>
    </head>
    <body>
        <nav class="nav-extended red accent-4">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo text-grey lighten-4">SALLE DE SPECTACLE "COLYSEUM"</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../index.php">Retour</a></li>
                </ul>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#exercice1">Liste des clients</a></li>
                    <li class="tab"><a href="#exercice2">Types de spectacles possible</a></li>
                    <li class="tab"><a href="#exercice3">Les 20 premiers clients</a></li>
                    <li class="tab"><a href="#exercice4">Les clients fideles</a></li>
                    <li class="tab"><a href="#exercice5">Les clients en M</a></li>
                    <li class="tab"><a href="#exercice6">Les spectacles</a></li>
                    <li class="tab"><a href="#exercice7">Info clients</a></li>
                </ul>
            </div>
        </nav>
        <div id="exercice1" class="col s12">
            <h2 class="centered white-text">Liste des clients</h2>
            <table class="centered white-text" border="5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientList as $detailClient) { ?>
                        <tr>
                            <td><?= $detailClient->id ?></td>
                            <td><?= $detailClient->lastName ?></td>
                            <td><?= $detailClient->firstName ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="exercice2" class="col s12">
            <h2 class="centered white-text">Types de spectacles possible</h2>
            <table class="centered white-text" border="5">
                <thead>
                    <tr>
                        <th>Types de spectacles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($showTypeList as $showTypes) { ?>
                        <tr>
                            <td><?= $showTypes->type ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="exercice3" class="col s12">
            <h2 class="centered white-text">Les 20 premiers clients</h2>
            <table class="centered white-text" border="5">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($twentyFirstClientsList AS $clientsList) { ?>
                        <tr>
                            <td><?= $clientsList->lastName ?></td>
                            <td><?= $clientsList->firstName ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="exercice4" class="col s12">
            <h2 class="centered white-text">Les clients fideles</h2>
            <table class="centered white-text" border="5">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientsFidelityList AS $clientsCardsResult) { ?>
                        <tr>
                            <td><?= $clientsCardsResult->lastName ?></td>
                            <td><?= $clientsCardsResult->firstName ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="exercice5" class="col s12">
            <h2 class="centered white-text">Les clients en M</h2>
            <table class="centered white-text">
                <tbody>
                <div class="">
                    <?php foreach ($clientsBeginMList AS $clientsM) { ?>
                        <tr>
                            <td>
                                <p> Nom : <?= $clientsM->lastName ?></p>
                                <p> Prénom : <?= $clientsM->firstName ?></p>
                                <div class="divider"></div>
                            </td>                            
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
        <!-- comment -->
    <div id="exercice6" class="col s12">
        <h2 class="centered white-text">Les spectacles</h2>

                <?php foreach ($showsList AS $showDetail) { ?>
        <p class="white-text"><?= $showDetail->title ?> par <?= $showDetail->performer ?>, le <?= $showDetail->date ?> à <?= $showDetail->startTime ?></p>
                <?php } ?>
    </div>
    <div id="exercice7" class="col s12">
        <h2 class="centered white-text">Info clients</h2>
        <table class="centered white-text">
            <tbody>
                <?php foreach ($clientsInfoList AS $infoList) { ?>
                    <tr>
                        <td>                                
                            <p>Nom : <?= $infoList->lastName ?></p>
                            <p>Prénom : <?= $infoList->firstName ?></p>
                            <p>Date de naissance : <?= $infoList->birthDate ?></p>
                            <p>Catre de fidélité : <?= $infoList->case ?></p>
                            <?php if ($infoList->case == 'Oui') { ?>
                                <p>Numéro de carte : <?= $infoList->cardNumber ?></p>
                            <?php } ?>
                            <div class="divider"></div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>