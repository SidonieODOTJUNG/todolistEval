<?php

class Tache {
    private $user_id;
    private $id_tache;
    private $description;
    private $date_limite;


    

    function __construct($user_id, $id_tache, $description, $date_limite) {
        $this->user_id = $user_id;
        $this->id_tache = $id_tache;
        $this->description = $description;
        $this->date_limite = $date_limite;
    }


    function setUser_id(string $user_id) {
        $this->user_id = $user_id;
    }

    function getser_id() : ?string {
        return $this->user_id;
    }

    function setId_tache(string $id_tache) {
        $this->id_tache = $id_tache;
    }

    function getId_tache() : ?string {
        return $this->id_tache;
    }

    function setDescription(string $description) {
        $this->description = $description;
    }

    function getDescription() : ?string {
        return $this->description;
    }

    function setDate_limite (string $date_limite) {
        $this->date_limite = $date_limite;

    }

    function getDate_limite() : ?string {
        return $this->date_limite;
    }


    function save_tache() {
            
        $listeTaches = json_decode(file_get_contents("datas/listeTaches.json"));
        array_push($listeTaches, get_object_vars($this));

        $myFile = fopen("datas/listeTaches.json", "w");
        $json = json_encode($listeTaches);
        fwrite($myFile, $json);
        fclose($myFile);

       
        }
    static function recup_liste() {
        $listeTaches = json_decode(file_get_contents("datas/listeTaches.json"));
        $tachesutilisateur = [];

        foreach($listeTaches as $tache) {
            if($tache->user_id == $_SESSION["user"] ) {
                array_push($tachesutilisateur, $tache);
            }
        }
        // trier le tableau
        usort($tachesutilisateur, function($a, $b) {
            $al = strtolower($a->date_limite);
            $bl = strtolower($b->date_limite);
            if($al == $bl) {
                return 0;
            } return ($al > $bl)? +1 : -1 ;
        });

        return $tachesutilisateur;
    }
}





