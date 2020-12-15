
<nav>
    <a href="index.php?page=accueil">Retourner à l'accueil</a>
    <!-- fermer la session avec le retour à l'accueil : mode déco -->
</nav>


<h1>Bienvenue sur votre compte utilisateur</h1>

<form action="index.php?page=ajoutTache" method="POST">
    <input type="text" name="intitule" id="intitule" placeholder="Entrer l'intitulé de la tache"> <br>
    <textarea name="resume" id="resume" cols="30" rows="10"></textarea> <br>
    <input type="date" name="date" id="date" placeholder="Entrez la date limite de réalisation"> <br>
    <input type="submit">
</form>

<section>
    <h1>Votre liste de taches : </h1>

    <table>
        <tr>
            <th>Tache à exécuter</th>
            <th>Détail de la tache</th>
            <th>Date limite</th>
        </tr>

    <?php var_dump($listeTaches);?>

    
    </table>
</section>



