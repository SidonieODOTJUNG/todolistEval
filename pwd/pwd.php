

<?php

// générer un cryptage avec password_hash()



// password_hash('mdp', PASSWORD_DEFAULT, ['cost' => 12]);

// PASSWORD_DEFAULT = algo de cryptage 
/* 
Notez que cette constante est concue pour changer 
dans le temps, au fur et à mesure que des algorithmes 
plus récents et plus forts sont ajoutés à PHP. Pour cette raison, 
la longueur du résultat issu de cet algorithme peut changer dans le temps, 
il est donc recommandé de stocker le résultat dans une colonne de la base de données 
qui peut contenir au moins 60 caractères 
(255 caractères peut être un très bon choix). 
*/

// ['cost' => 12] 
/*
changer le cost permet de compliquer le travail des hackers
aujourd'hui le bon cout aurait tendance à être autour de 12
mais plus les procésseurs sont rapides et plus il faut augmenter le cout
il est tout a fait possible de laisser le cout par défaut
*/



// vérifier la signature du mdp avec password_verify()


// password_verify('mdp', 'signature' );

// renvoie true si cela correspond, or false si le mdp n'est pas correcte



/* 
1. dans ma base de donnée => 
j'envoie la signature générée par password_hash('mdp', PASSWORD_DEFAULT, ['cost' => 12]);

2. lors de la co, je vérifie que le mdp poster soit compétible avec la signature