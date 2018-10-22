<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
        <link rel="stylesheet" href="assets/css/style.css"/>
        <title>title</title>
    </head>
    <body>
        <nav class="nav-extended blue-grey">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo text-grey lighten-4">PDO partie 1</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="badges.html">Inscription</a></li>
                    <li><a href="collapsible.html">Connexion</a></li>
                </ul>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#Exercice1">Exercice 1</a></li>
                    <li class="tab"><a href="#Exercice2">Exercice 2</a></li>
                    <li class="tab"><a href="#Exercice3">Exercice 3</a></li>
                    <li class="tab"><a href="#Exercice4">Exercice 4</a></li>
                    <li class="tab"><a href="#Exercice5">Exercice 5</a></li>
                    <li class="tab"><a href="#Exercice6">Exercice 6</a></li>
                    <li class="tab"><a href="#Exercice7">Exercice 7</a></li>
                </ul>
            </div>
        </nav>
        <div id="Exercice1" class="col s12">
            <h2>Exercice 1</h2>
            <table class="striped" border="5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Carte</th>
                        <th>Numéro de carte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clientsList as $detailClient) {
                        ?>
                        <tr>
                            <td><?= $detailClient->id ?></td>
                            <td><?= $detailClient->lastName ?></td>
                            <td><?= $detailClient->firstName ?></td>
                            <td><?= $detailClient->birthDate ?></td>
                            <td><?= $detailClient->card ?></td>
                            <td><?= $detailClient->cardNumber ?></td>
                        </tr>
                        <?php
                    }
                    $reqClients->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Exercice2" class="col s12">
            <h2>Exercice 2</h2>
            <table class="striped" border="5">
                <thead>
                    <tr>
                        <th>Types de spectacles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $showType = 'SELECT * FROM `showTypes`';
                    $reqShowType = $pdo->query($showType);
                    foreach ($clientsList as $typeList) {
                        ?>
                        <tr>
                            <td><?= $row['type'] ?></td>
                        </tr>
                        <?php
                    }
                    $reqShowType->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Exercice3" class="col s12">
            <h2>Exercice 3</h2>

            <table class="striped" border="5">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $clientLimit = 'SELECT * FROM `clients` LIMIT 20';
                    $reqClientLimit = $pdo->query($clientLimit);
                    while ($row = $reqClientLimit->fetch()) {
                        ?>
                        <tr>
                            <td><?= $row['lastName'] ?></td>
                            <td><?= $row['firstName'] ?></td>
                        </tr>
                        <?php
                    }
                    $reqClientLimit->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Exercice4" class="col s12">
            <h2>Exercice 4</h2>
            <table class="striped" border="5">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Carte</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $clientCard = 'SELECT * FROM `clients` WHERE `card`>0';
                    $reqClientCard = $pdo->query($clientCard);
                    while ($row = $reqClientCard->fetch()) {
                        ?>
                        <tr>
                            <td><?= $row['lastName'] ?></td>
                            <td><?= $row['firstName'] ?></td>
                            <td><?= $row['card'] ?></td>
                        </tr>
                        <?php
                    }
                    $reqClientCard->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Exercice5" class="col s12">
            <h2>Exercice 5</h2>
            <div class="">
                <?php
                $clientName = 'SELECT `lastName`, `firstName` FROM `clients` ORDER BY `lastName` HAVING \'m%\'';
                $reqClientName = $pdo->query($clientName);
                while ($row = $reqClientName->fetch()) {
                    ?>
                    <p> Nom : <?= $row['lastName'] ?></p>
                    <p> Prénom : <?= $row['firstName'] ?></p>
                    <?php
                }
                $reqClientName->closeCursor();
                ?>
            </div>
        </div>
        <div id="Exercice6" class="col s12">Exercice 6</div>
        <div id="Exercice7" class="col s12">Exercice 7</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    </body>
</html>