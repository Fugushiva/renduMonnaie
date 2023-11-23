<?php

/**
 * Rend la monnaie
 * @param int $montant Montant à rendre
 */

function rendreMonnaie(int $montant)
{
    // Initialisation de la liste des billets disponibles
    $listeBillets = [10, 5, 2];
    // Initialisation des variables
    $nbEntree = 0;
    $message = "";


    // Parcours du tableau de billets
    for ($iBillet = 0; $iBillet < count($listeBillets); $iBillet) {
        // Test si le montant est un multiple du billet de 10
        if ($montant % $listeBillets[0] === 0) {
            // Calcul du nombre de billets de 10 nécessaire
            $nbEntree = intdiv($montant, $listeBillets[0]);
            // Construction du message à afficher
            $message = "$nbEntree x {$listeBillets[0]}";
            echo ($message);
            break;
            // Test si le montant est un multiple du billet de 5
        } else if ($montant % $listeBillets[1] === 0) {
            // Calcul du nombre de billets de 10 et de 5 nécessaires
            $nbEntree = $montant - $listeBillets[1];
            $nbEntree = intdiv($montant, $listeBillets[0]);
            // Construction du message à afficher
            $message = "$nbEntree x {$listeBillets[0]} + 1 x {$listeBillets[1]}";
            echo ($message);
            break;
            // Test si le montant est un multiple du billet de 2 et si il est plus petit que 10
        } else if ($montant < $listeBillets[0]) {
            if ($montant % $listeBillets[2] === 0) {
                // Calcul du nombre de billets de 2 nécessaires
                $nbEntree = intdiv($montant, $listeBillets[2]);
                $message = "$nbEntree x {$listeBillets[2]}";
                echo ($message);
                break;
                // Si le montant n'est pas un multiple de 2 et qu'il est plus grand que 5 et plus petit que 10
            } else if ($montant % $listeBillets[2] !== 0 && $montant > 5 && $montant < 10) {
                // Calcul du nombre de billets de 5 et de 2 nécessaires
                $result = $montant % $listeBillets[1];
                $nbEntree = intdiv($montant, $listeBillets[1]);
                $message = "$nbEntree x {$listeBillets[1]}";
                $nbEntree = intdiv($result, $listeBillets[2]);
                $message .= " + $nbEntree x {$listeBillets[2]}";
                echo ($message);
                break;
                // Si le montant n'est pas un multiple de 2 et qu'il est plus petit que 5
            } else if ($montant % $listeBillets[2] !== 0 && $montant < 5) {
                $message = "impossible";
                echo ($message);
                break;
            }

            // Si le montant est supérieur à 15 et inférieur ou égal à 20
        } elseif ($montant > 15 && $montant <= 20) {
            // On récupère le reste de la division du montant par 10
            $result = $montant % $listeBillets[0];
            // On récupère le nombre de fois que 10 entre dans le montant
            $nbEntree = intdiv($montant, $listeBillets[0]);
            $message = "$nbEntree x {$listeBillets[0]} + ";
            // On teste si le reste de la division du montant par 10 est un multiple de 5 ou de 2
            if ($result %  $listeBillets[1] === 0 || $result %  $listeBillets[2] === 0) {
                // On récupère le nombre de fois que 2 entre dans le reste
                $nbEntree = intdiv($result, $listeBillets[2]);
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
                // On teste si le reste de la division du montant par 10 est plus petit que 5
            } else {
                // On récupère le nombre de fois que 5 entre dans le reste
                $nbEntree = intdiv($result, $listeBillets[1]);
                // On met à jour le reste en le divisant par 5
                $result %= $listeBillets[1];
                $message .= "$nbEntree x {$listeBillets[1]} + ";
                $nbEntree = intdiv($result, $listeBillets[2]);
                $result %= $listeBillets[2];
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
            }
            // Si le montant est inférieur à 15 && un multiple de 2
        } else if ($montant < 15) {
            if ($montant % 2 == 0) {

                $result = $montant % $listeBillets[0];
                $nbEntree = intdiv($montant, $listeBillets[0]);
                $message = "$nbEntree x {$listeBillets[0]} + ";
                $nbEntree = intdiv($result, $listeBillets[2]);
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
            }
            $result = $montant % $listeBillets[1];
            $result +=  $listeBillets[1];
            $nbEntree = intdiv($result, $listeBillets[1]);
            $message = "$nbEntree x {$listeBillets[1]} + ";
            $nbEntree = intdiv($result, $listeBillets[2]);
            $message .= "$nbEntree x {$listeBillets[2]} ";
            echo ("$message");
            break;
            // Si le montant est supérieur à 15 && un multiple de 2
        } else if ($montant > 15 && $montant % 2 != 0) {
            // on vérifie que le dernier chiffre du montant est plus petit que 5
            if (substr($montant, -1) < 5) {
                $montant -= $listeBillets[0];
                $result = $montant % $listeBillets[0];
                $nbEntree = intdiv($montant, $listeBillets[0]);
                $message = "$nbEntree x {$listeBillets[0]} + ";
                $result = $montant % $listeBillets[1];
                $result +=  $listeBillets[1];
                $nbEntree = intdiv($result, $listeBillets[1]);
                $message .= "$nbEntree x {$listeBillets[1]} + ";
                $nbEntree = intdiv($result, $listeBillets[2]);
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
                // on vérifie que le dernier chiffre du montant est plus grand que 5
            } else {
                $result = $montant % $listeBillets[0];
                $nbEntree = intdiv($montant, $listeBillets[0]);
                $message = "$nbEntree x {$listeBillets[0]} + ";
                $result = $montant % $listeBillets[1];
                $result +=  $listeBillets[1];
                $nbEntree = intdiv($result, $listeBillets[1]);
                $message .= "$nbEntree x {$listeBillets[1]} + ";
                $result -= $listeBillets[1];
                $nbEntree = intdiv($result, $listeBillets[2]);
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
            }
        } else if ($montant > 15 && $montant % 2 == 0) {
            $result = $montant % $listeBillets[0]; // on récupère le reste de la division du montant par 10
            $nbEntree = intdiv($montant, $listeBillets[0]); // on récupère le nombre de fois que 10 entre dans le montant
            $message = "$nbEntree x {$listeBillets[0]} +";
            $nbEntree = intdiv($result, $listeBillets[2]); // on récupère le nombre de fois que 2 entre dans le reste de la division du montant par 10
            $message .= "$nbEntree x {$listeBillets[2]} ";
            echo ("$message");
            break;
        } else {
            echo ("impossible");
            break;
        }
    }
}

rendreMonnaie(10); //affiche 1 x 10
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
