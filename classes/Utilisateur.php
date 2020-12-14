<?php

class Utilisateur {
    private $id_utilisateur;
    private $pseudo;
    private $mdp_utilisateur;


    function __construct( $pseudo, $mdp_utilisateur, $id_utilisateur ) {
        $this->pseudo = $pseudo;
        $this->mdp_utilisateur = $mdp_utilisateur;
        $this->id_utilisateur = $id_utilisateur;
    }


    function setId(int $id) {
        $this->id = $id;
    }

    function getId() : ?int {
        return $this->id;
    }

    function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    function getPseudo() : ?string {
        return $this->pseudo;
    }

    function setPwd(string $pwd) {
        $this->pwd = $pwd;
    }

    function getPwd() : ?string {
        return $this->pwd;
    }

    static function getUsers(): array {
        $users = json_decode(file_get_contents("datas/users.json"));
        return $users;
    }

    function save_user() {
        //récup du fichier json
        $users = json_decode(file_get_contents("datas/users.json"));

        // récupération de l'objet en tableau 
        array_push($users, get_object_vars($this));

        // écriture du tableau au format json dans le fichier
        $myFile = fopen("datas/users.json", "w");
        $json = json_encode($users);
        fwrite($myFile, $json);
        fclose($myFile);
    }

    function verify_user() {

        // aller chercher les données dans mon fichier json et les transformer en tab
        $tab = json_decode(file_get_contents("datas/users.json"));
    
        // si mon tab rencontre le pseudo POST, rechercher si bon mdp
        foreach($tab as $cle => $valeur) {
            if($valeur->pseudo == $this->pseudo && $valeur->mdp_utilisateur == $this->mdp_utilisateur) {
                $connexion = true; 
                } else {
                    $connexion = false;
                }
        }
        return $connexion;
    }
}