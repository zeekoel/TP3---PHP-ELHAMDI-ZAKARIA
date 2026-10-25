<?php
// Auteur : Zakaria Elhamdi
// Objectif : Exercice 1 - Variables, constantes, types et chaînes
// Date : 25/10/2026

// Inclusion du fichier de configuration
require 'config.php';

// --- Exercice 1.1 : Noms de variables ---
/*
  $x       : Valide (commence par une lettre)
  $_x      : Valide (commence par un underscore)
  $2x      : Invalide (ne peut pas commencer par un chiffre)
  $x-y     : Invalide (le tiret '-' est l'opérateur de soustraction)
  $Prix_HT : Valide (majuscules/underscores autorisés)
  $prix ht : Invalide (contient un espace)
  $état    : Valide (caractères accentués acceptés)
*/

$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "actif";

// Sensibilité à la casse entre $a et $A
$a = "test minuscule";
$A = "TEST MAJUSCULE";
echo "$a et $A sont bien deux variables distinctes.<br><hr>";

// --- Exercice 1.2 : Constantes ---
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "Barème des notes : de " . NOTE_MIN . " à " . NOTE_MAX . "<br>";

var_dump(defined('SEUIL'));    // bool(true)
var_dump(defined('INCONNUE')); // bool(false)
echo "<br><hr>";

// --- Exercice 1.3 : Calcul ---
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "Le prix TTC du produit est de $prix_ttc €.<br><hr>";

// --- Exercice 1.4 : Types et conversions ---
$test = 42;
$test = (string) $test; // Cast en string
var_dump($test); // Affiche string(2) "42"
echo "<br>";

// Test booléen
var_dump((bool) 0);      // false
var_dump((bool) "abc");  // true
echo "<br>";

// Notations numériques (255)
$dec = 255;
$hex = 0xFF;
$oct = 0377;
$bin = 0b11111111;
echo "Décimal: $dec | Hexadécimal: $hex | Octal: $oct | Binaire: $bin<br><hr>";

// --- Exercice 1.5 : Chaînes de caractères ---
$traitees = "égales à";
$ici = 2;

echo "1. Ahmed a dit : \"J'ai réussi\"<br>";
echo '2. Voulez-vous supprimer C:\*.*?<br>';
echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo '4. Les variables ne seront pas $traitees $ici<br>';
echo "5. Les variables seront $traitees $ici<br><hr>";

// Trim et parcours
$chaine_etoile = "*Bonjour les développeurs*";
echo trim($chaine_etoile, "*") . "<br>";

$msg = "PHP";
for ($i = 0; $i < strlen($msg); $i++) {
    echo $msg[$i] . "<br>";
}