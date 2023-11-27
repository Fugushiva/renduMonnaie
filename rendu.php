<?php

function rendu(int $montantTotal, $billetsDisponibles = [2, 5, 10])
{
    // Tableau pour stocker les combinaisons possibles [nombre de billets, dénomination du billet]
    $combinaisonsPossibles = [];

    // Parcours des différents billets disponibles
    foreach ($billetsDisponibles as $billet) {
        // Initialisation de chaque montant possible avec un billet de la dénomination en cours
        $combinaisonsPossibles[$billet] = [1, $billet];

        // Boucle pour calculer le nombre minimum de billets pour chaque montant jusqu'au total
        for ($montant = $billet + 1; $montant <= $montantTotal; ++$montant) {
            // Vérification si le montant actuel peut être obtenu avec le billet en cours
            if (isset($combinaisonsPossibles[$montant - $billet])) {
                // Mise à jour si le nombre minimum de billets est trouvé
                $nombreBillets = 1 + $combinaisonsPossibles[$montant - $billet][0];
                $combinaisonsPossibles[$montant] = [$nombreBillets, $billet];
            }
        }
    }

    // Vérification si le montant total est possible avec les billets fournis
    if (!isset($combinaisonsPossibles[$montantTotal])) {
        throw new \Exception("$montantTotal n'est pas possible avec les billets disponibles " . implode(",", $billetsDisponibles));
    }

    // Reconstruction de la combinaison optimale de billets
    $billetsUtilises = [];
    while ($montantTotal > 0) {
        $billetsUtilises[] = $combinaisonsPossibles[$montantTotal][1];
        $montantTotal -= $combinaisonsPossibles[$montantTotal][1];
    }

    // Retourne la combinaison de billets sous forme de chaîne
    return implode(" + ", $billetsUtilises);
}

// Exemple d'utilisation avec le montant 31 et des billets de 2, 5, 10
echo rendu(31);