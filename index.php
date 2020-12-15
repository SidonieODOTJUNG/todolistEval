<?php

// routage
$page = (isset($_GET["page"]))? $_GET["page"] : "accueil";


switch($page) {
    case "accueil" : $template = home();
    break;
    case "inscription" : $template = showFormInscript();
    break;
    case "insert_user" : $template = insert_user();
    break;
    case "connexion" : $template = showFormCo();
    break;
    case "connect_user" : $template = connect_user();
    break;
    case "compte" : $template = welcome();
    break;
    case "ajoutTache" : $template = insert_tache();
    break;
    default : $template = home();
    break;
}



function home(): array {
    return ["template" => "accueil.php"];
}

function showFormInscript(): array {
    require_once "classes/Utilisateur.php";

    $users = Utilisateur::getUsers();

    return ["template" => "inscription.php", "datas" => $users];
}

function ajoutID() {
    // création du compteur pour l'id_utilisateur

    $monFichier = fopen('datas/compteur.txt',"r" ); 


    if(!$monFichier) {   
        exit('ouverture du fichier impossible, le fichier n\'est pas créer');  
    }

    $compteur = fgets($monFichier);
    fclose($monFichier);
    $compteur++;

    $monFichier = fopen('datas/compteur.txt', 'w');
    fwrite($monFichier,$compteur);
    fclose($monFichier);

    return $compteur;


}

function insert_user(): array {

    require_once "classes/Utilisateur.php";
    $compteur = ajoutID();

    $user = new Utilisateur($_POST["pseudo"], $_POST["mdp"], $compteur );
    $user->save_user();

    // redirection du la page de co au lieu de la page d'accueil
    header("Location:index.php?page=connexion");
    exit;   
}

function showFormCo(): array {

    return ["template" => "connexion.php"];

}

function connect_user(): array {

    require_once "classes/Utilisateur.php";

    $userCo = new Utilisateur($_POST["pseudoCo"], $_POST["mdpCo"], $compteur=0 );
    if ($userCo->verify_user()) {
        session_start();
        $_SESSION["user"] = $_POST["pseudoCo"];
        $_SESSION["mdp"] = $_POST["mdpCo"];
        
        header("Location:index.php?page=compte");
        exit; 
    }else {
        // j'ai renvoyé à la page de connexion au lieu de l'accueil
        header("Location:index.php?page=connexion");
        exit; 
    }
}

function welcome(): array {
    session_start();
    return ["template" => "bienvenue.php"];
}


function insert_tache() {
    session_start();
    require_once "classes/Tache.php";

    $tache = new Tache($_SESSION["user"], $_POST["intitule"],$_POST["resume"], $_POST["date"]);
    $tache->save_tache();
    
    header("Location:index.php?page=compte");
    exit; 
}




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
</head>
<body>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet totam nemo porro. Ad, repellendus! Quasi consequuntur ullam perferendis reiciendis ea id quas nobis consequatur doloremque, nesciunt non consectetur iusto laudantium.</p>
    <p>
        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, repellendus reprehenderit maxime sequi nobis culpa natus necessitatibus consequuntur distinctio laudantium ut, sapiente maiores aliquid vel deleniti ipsum quia saepe facere!</span>
        <span>Sit pariatur possimus amet expedita! Rem sint sed reiciendis vel minus, dolore recusandae architecto quis fugiat asperiores assumenda cupiditate et error. Excepturi vero dolore minima? Ipsam eligendi illum cupiditate necessitatibus.</span>
        <span>Magnam, dicta. Quam nostrum odit dicta animi earum. Optio veniam atque facilis deserunt neque commodi beatae mollitia labore eveniet, illo laudantium in alias ea dolore? Ipsam reprehenderit recusandae esse odio.</span>
    </p>

    <?php require_once "templates/". $template['template']; ?>


</body>
</html>