<?php

/**
 * Rend la monnaie
 * @param int $montant Montant à rendre
 */

function rendreMonnaie(int $montant)
{
    //Déclaration des variables
    $listeBillets = [10, 5, 2];  //Liste des coupure dispo
    $nbEntree = 0; //Combien de fois un chiffre entre dans le montant
    $message = [];
    $reste = 0;


    for ($ibillet = 0; $ibillet < sizeof($listeBillets); $ibillet++) {
        // Calcul du reste de la division du montant par le billet
        $reste = $montant % $listeBillets[$ibillet];
        if ($reste == 0) {
            // Si le reste est 0, le montant est un multiple du billet
            // Calcul du nombre de billets nécessaires
            $nbEntree = intdiv($montant, $listeBillets[$ibillet]);
            // Ajout du nombre de billets et du type de billet au message
            array_push($message, "$nbEntree x $listeBillets[$ibillet]");
            break;
        } else if ($reste >= $listeBillets[2]) {
            // Si le reste est supérieur ou égal au plus petit billet
            // Calcul du nombre de billets nécessaires
            $nbEntree = intdiv($montant, $listeBillets[$ibillet]);
            // Ajout du nombre de billets et du type de billet au message
            array_push($message, "$nbEntree x $listeBillets[$ibillet]");
            // Mise à jour du montant avec le reste
            $montant = $reste;
        } else {
            // Si le reste est inférieur au plus petit billet
            $nbEntree = intdiv($montant, $listeBillets[$ibillet]);
            $result = $montant - $listeBillets[$ibillet];
            if ($result % 2 == 0) {
                // Si le résultat est un multiple de 2
                $nbEntree = intdiv($result, $listeBillets[$ibillet]);
                // Ajout du nombre de billets et du type de billet au message
                array_push($message, "$nbEntree x $listeBillets[$ibillet]");
            } else {
                // Si le résultat n'est pas un multiple de 2
                $result += $listeBillets[$ibillet];
                $nbEntree = intdiv($result, $listeBillets[$ibillet]);
                // Ajout du nombre de billets et du type de billet au message
                array_push($message, "$nbEntree x $listeBillets[$ibillet]");
            }
        }
    }
    // Affichage du tableau message pour le débogage
    var_dump($message);
    for ($i = 0; $i < sizeof($message); $i++) {
        // Suppression des éléments du message qui commencent par un nombre inférieur à 1
        if ($message[$i][0] < 1) {
            unset($message[$i]);
        }
    }
    // Conversion du tableau message en une chaîne de caractères
    $message = implode(" + ", $message);
    echo ($message);
}

rendreMonnaie(14); //affiche 1 x 10
echo ("<br>");
rendreMonnaie(11); //affiche 4 x 2
echo ("<br>");
rendreMonnaie(21); //affiche 1 x 10 + 1 x 5 + 3 x 2
echo ("<br>");
rendreMonnaie(23); //1 x 10 + 1 x 5 + 4 x 2
echo ("<br>");
rendreMonnaie(31); //affiche 2 x 10 + 1 x 5 + 3 x 2
echo ("<br>");
rendreMonnaie(16); //affiche 1 x 10 + 3 x 2
echo ("<br>");
rendreMonnaie(15); //affiche 1 x 10 + 1 x 5
echo ("<br>");
rendreMonnaie(13); //affiche 1 x 5 + 4 x 2
echo ("<br>");
rendreMonnaie(189); //affiche 18 x 10 + 1 x 5 + 2 x 2
echo ("<br>");
rendreMonnaie(89); //affiche 8 x 10 + 1 x 5 + 2 x 2
echo ("<br>");
rendreMonnaie(9007199254740991); //affiche 900719925474098 x 10 + 1 x 5 + 3 x 2
