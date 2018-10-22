<?php

/* Déclaration de la class SowTypes */

class ShowTypes {
    /* Déclaration de attribut privé connexion */

    private $connexion;

    /* Déclaration des attributs public correspondants aux noms des champs de la table */
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $card;
    public $cardNumber;

    /* Déclaration de la fonction publique construct */

    public function __construct() {
        try {
            /* Connexion a la base de donnée */
            $this->connexion = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'mohamedf');
        } catch (Exception $e) {
            /* Message d'érreur en cas échec de la connexion */
            die($e->getMessage());
        }
    }

    /**
     * Renvoie la liste des type de spectacles de la table `showTypes` dans la base de donnée `colyseum`
     * @return type
     */
    public function getShowType() {
        $showTypeResult = $this->connexion->query(
                'SELECT `type` '
                . 'FROM `showTypes`');
        return $showTypeResult->fetchAll(PDO::FETCH_OBJ);
    }

    /* Déclaration de la fonction publique destruct */

    public function __destruct() {
        
    }

}

?>