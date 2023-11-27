<?php

function getCoins(int $totalAmount, $denominations = [2, 5, 10])
{
    $amtPossible = [];
    foreach ($denominations as $d) {
        $amtPossible[$d] = [1, $d];
        for ($i = $d + 1; $i <= $totalAmount; ++$i) {
            if (isset($amtPossible[$i - $d])) {
                if (!isset($amtPossible[$i]) || $amtPossible[$i][0] > 1 + $amtPossible[$i - $d][0]) {
                    $amtPossible[$i][0] = 1 + $amtPossible[$i - $d][0];
                    $amtPossible[$i][1] = $d;
                }
            }
        }
    }

    if (!isset($amtPossible[$totalAmount])) {
        throw new \Exception("$totalAmount is not possible with the denominations " . implode(",", $denominations));
    }

    $coins = [];
    while ($totalAmount > 0) {
        $coins[] = $amtPossible[$totalAmount][1];
        $totalAmount -= $amtPossible[$totalAmount][1];
    }

    return implode(" + ", $coins);
}

print_r(getCoins(1));
