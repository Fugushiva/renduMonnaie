<?php

function rendreMonnaie(int $montant)
{
    $listeBillets = [10, 5, 2];


    $nbEntree = 0;
    $message = "";


    //on parcourt le tableau de billets
    for ($iBillet = 0; $iBillet < count($listeBillets); $iBillet) {
        //on teste si le montant est un multiple du billet de 10
        if ($montant % $listeBillets[0] === 0) {
            $nbEntree = intdiv($montant, $listeBillets[0]);
            $message = "$nbEntree x {$listeBillets[0]}";
            echo ($message);
            break;
            //on teste si le montant est un multiple du billet de 5
        } else if ($montant % $listeBillets[1] === 0) {
            //on retire 5 au montant pour savoir combien de fois 10 entre dedans
            $nbEntree = $montant - $listeBillets[1];
            $nbEntree = intdiv($montant, $listeBillets[0]);
            $message = "$nbEntree x {$listeBillets[0]} + 1 x {$listeBillets[1]}";
            echo ($message);
            break;
            //on teste si le montant est un multiple du billet de 2 et si il est plus petit que 10
        } else if ($montant < $listeBillets[0] && $montant % 2 === 0) {
            $nbEntree = intdiv($montant, $listeBillets[2]);
            $message = "$nbEntree x {$listeBillets[2]}";
            echo ($message);
            break;
            // on vériifie si le montant est plus grand que 15
        } elseif ($montant > 15 && $montant <= 20) {

            $result = $montant % $listeBillets[0]; // on récupère le reste de la division du montant par 10
            $nbEntree = intdiv($montant, $listeBillets[0]); // on récupère le nombre de fois que 10 entre dans le montant
            $message = "$nbEntree x {$listeBillets[0]} ";
            // on teste si le reste de la division du montant par 10 est un multiple de 5 ou de 2
            if ($result %  $listeBillets[1] === 0 || $result %  $listeBillets[2] === 0) {
                $nbEntree = intdiv($result, $listeBillets[2]); // on récupère le nombre de fois que 2 entre dans le reste de la division du montant par 10
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
            } else {
                $nbEntree = intdiv($result, $listeBillets[1]); // on récupère le nombre de fois que 5 entre dans le reste de la division du montant par 10
                $result %= $listeBillets[1]; // on récupère le reste de la division du montant par 5
                $message .= "$nbEntree x {$listeBillets[1]} ";
                $nbEntree = intdiv($result, $listeBillets[2]);  // on récupère le nombre de fois que 2 entre dans le reste de la division du montant par 5
                $result %= $listeBillets[2];
                $message .= "$nbEntree x {$listeBillets[2]} ";
                echo ("$message");
                break;
            }
            // on teste si le montant est plus petit que 15 et qu'il n'est pas un multiple de 2
        } else if ($montant < 15) {
            if ($montant % 2 == 0) {
                $result = $montant % $listeBillets[0]; // on récupère le reste de la division du montant par 10
                $nbEntree = intdiv($montant, $listeBillets[0]); // on récupère le nombre de fois que 10 entre dans le montant
                $message = "$nbEntree x {$listeBillets[0]} ";
                $nbEntree = intdiv($result, $listeBillets[2]); // on récupère le nombre de fois que 2 entre dans le reste de la division du montant par 10
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
        } else {
            $result = $montant % $listeBillets[0];
            $nbEntree = intdiv($montant, $listeBillets[0]);
            $message = "$nbEntree x {$listeBillets[0]} + ";
            $result %= $listeBillets[1];
            $result += $listeBillets[1];
            $nbEntree = intdiv($result, $listeBillets[1]);
            $message .= "$nbEntree x {$listeBillets[1]} + ";
            $nbEntree = intdiv($result, $listeBillets[2]);
            $message .= "$nbEntree x {$listeBillets[2]} ";
            echo ("$message");
            break;
        }
    }
}

rendreMonnaie(10);
echo ("<br>");
rendreMonnaie(11);
echo ("<br>");
rendreMonnaie(21);
echo ("<br>");
rendreMonnaie(23);
echo ("<br>");
rendreMonnaie(31);
echo ("<br>");
rendreMonnaie(16);
echo ("<br>");
rendreMonnaie(15);
echo ("<br>");
rendreMonnaie(13);
echo ("<br>");
rendreMonnaie(189);
