<?php
/* Déclaration de l'instance clientFidelity de l'objet clients */
$clientFidelity = NEW clients();
/* Récupération du modele getClientsHaveFidelityCard dans l'objet $clientsFidelityList */
$clientsFidelityList = $clientFidelity->getClientsHaveFidelityCard();
