<?php

/*
objet DateTime

$date = new DateTime();

param1 soit renseigner la date voulue dans une variable $datetime, soit ne rien mettre et on obtient la date
param2 = 128 dans une variable $timezone = 128 pour Europe 

Methodes : 
1. formater une date
$date->format('d/m/Y');

2. modifier une date
$date->modify('+1 month');  // ajoute un mois, voir la doc pour les possibilités


3. pour calculer l'écart entre plusieurs dates

$date1 = '2020-01-01';
$date2 = '2020-04-01';

$d = new DateTime($date1);
$d2 = new DateTime($date2);

$diff = $d->diff($d2, true);  // true renvoie la valeur absolue pour ne pas avoir de chiffre néfatif 
il faudra donc choisir false pour renvoie du négatif 
$nbjours = $diff->days;

ecart de plusieurs années entre les dates:
$diffAnnee = $diff->y;
$diffMois = $diff->m;
$diffjours = $diff->d;



*/