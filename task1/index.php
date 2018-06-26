<?php

/**
 * Создает матрицу размером n * n и заполняет ее по спирали
 *
 * @param int {Number} n - размерность матрицы
 * @returns array {Number[n][n]} - n * n - матрица, заполненная по спирали
 */
function fillSpiralMatrix($n)
{
    $matrix = [];
    // Ваш код
    $width = $n;
    $height = $n;
    $counter1 = 1;
    $counter2 = 1;
    $counter3 = 1;

    for ($y = 0; $y < $height; $y++) {
        $matrix[0][$y] = $counter1;
        $counter1++;
    }
    for ($x = 1; $x < $width; $x++) {
        $matrix[$x][$height - 1] = $counter1;
        $counter1++;
    }
    for ($y = $height - 2; $y >= 0; $y--) {
        $matrix[$height - 1][$y] = $counter1;
        $counter1++;
    }
    for ($x = $width - 2; $x > 0; $x--) {
        $matrix[$x][0] = $counter1;
        $counter1++;
    }

    while ($counter1 < $width * $height) {
        while (empty($matrix[$counter2][$counter3 + 1])) {
            $matrix[$counter2][$counter3] = $counter1;
            $counter1++;
            $counter3++;
        }
        while (empty($matrix[$counter2 + 1][$counter3])) {
            $matrix[$counter2][$counter3] = $counter1;
            $counter1++;
            $counter2++;
        }
        while (empty($matrix[$counter2][$counter3 - 1])) {
            $matrix[$counter2][$counter3] = $counter1;
            $counter1++;
            $counter3--;
        }
        while (empty($matrix[$counter2 - 1][$counter3])) {
            $matrix[$counter2][$counter3] = $counter1;
            $counter1++;
            $counter2--;
        }
    }
    for ($x = 0; $x < $width    ; $x++) {
        for ($y = 0; $y < $height; $y++) {
            if (empty($matrix[$x][$y])) {
                $matrix[$x][$y] = $counter1;
            }
        }
    }
    $newMtx = [];
    foreach ($matrix as $value)
    {
        ksort($value);
        $newMtx[] = $value;
    }

    return $newMtx;
}
