<?php

class Shows {

    private $connexion;
    public $id;
    public $title;
    public $performer;
    public $date;
    public $showTypesId;
    public $firstGenresId;
    public $secondGenreId;
    public $duration;
    public $startTime;

    public function __construct() {
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'mohamedf');
        } catch (Exception $e) {
            die($e->getMessage());
        };
    }
    /**
     * Retourne par ordre alphabétique, le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.
     * @return type
     */
    public function getShowsList() {
        $showListResult = $this->connexion->query(
                'SELECT `title`, `performer`, DATE_FORMAT(`date`, \'%d/%m/%Y\') AS `date`, TIME_FORMAT(`startTime`, \'%Hh%i\') AS `startTime`'
                . 'FROM `shows`'
                . 'ORDER BY `title`');
        return $showListResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function __destruct() {
        ;
    }

}