<?php

class Utilisateur {
    private $id_tache;
    private $description;
    private $date_limite;


    function __construct($id_tache, $description, $date) {
        $this->id = $id_tache;
        $this->description = $description;
        $this->date = $date;
    }


    function setId(string $id) {
        $this->id = $id;
    }

    function getId() : ?string {
        return $this->id;
    }

    function setDescription(string $description) {
        $this->description = $description;
    }

    function getDescription() : ?string {
        return $this->description;
    }

    function setDate(string $date) {
        $this->date = $date;
    }

    function getDate() : ?string {
        return $this->date;
    }

}