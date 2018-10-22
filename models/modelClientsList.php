<?php

/* Class clients */

class clients {
    /* Déclaration de l'attribut privé connexion */

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
     * Renvoie la liste des clients de la table `clients` dans la base de donnée `colyseum`
     * @return type
     */
    public function getClientsList() {

        $listClientsResult = $this->connexion->query(
                'SELECT `id`, `lastName`, `firstName`'
                . 'FROM `clients`');
        return $listClientsResult->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Renvoie la liste des vingt premiers clients de la tables `clients` dans la base de donnée `colyseum`
     * @return type
     */
    public function getTwentyFirtsClients() {
        $twentyFirstClientsResult = $this->connexion->query(
                'SELECT `lastName`, `firstName` '
                . 'FROM `clients`'
                . 'LIMIT 20 OFFSET 0');
        return $twentyFirstClientsResult->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Renvoie la liste des clients de la tables `clients` dans la base de donnée `colyseum` qui ont une carte de fidélité
     * @return type
     */
    public function getClientsHaveFidelityCard() {
        $clientsHaveFidelityResult = $this->connexion->query(
                'SELECT `cls`.`lastName`, `cls`.`firstName`'
                . 'FROM `clients` AS `cls`'
                . 'LEFT JOIN `cards` AS `cds` ON `cds`.`cardNumber`=`cls`.`cardNumber`'
                . 'LEFT JOIN `cardTypes` AS `ctps` ON `cds`.`cardTypesId`=`ctps`.`id`'
                . 'WHERE `ctps`.`id`=\'1\'');
        return $clientsHaveFidelityResult->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Renvoie par ordre alphabétique, uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M" dans la base de donnée `colyseum`
     * @return type
     */
    public function getClientsBeginByM() {
        $clientsBeginByMResult = $this->connexion->query(
                'SELECT `lastName`, `firstName`'
                .'FROM `clients` WHERE `lastName` LIKE \'m%\''
                .'ORDER BY `lastName`');
        return $clientsBeginByMResult->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Renvoie les informations des clients nom, prénom, date de naissance, si ils ont une carte de fidelité et si oui le numéro de cette derniere
     * @return type
     */
    public function getClientsInfoList() {
        $clientsInfoResult = $this->connexion->query(
                'SELECT `lastName`, `firstName`, `birthDate`, `clients`.`cardNumber`, `card`, ('
                . 'CASE WHEN `cardTypesId`=\'1\' THEN \'Oui\' ELSE \'Non\' END) AS `case` '
                . 'FROM `clients` LEFT JOIN `cards` ON `clients`.`cardNumber`=`cards`.`cardNumber`');
        return $clientsInfoResult->fetchAll(PDO::FETCH_OBJ);
    }
    /* Déclaration de la fonction publique destruct */

    public function __destruct() {
        
    }
}

?>