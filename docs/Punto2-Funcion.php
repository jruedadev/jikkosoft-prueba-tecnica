<?php

function twoSum($nums, $target) {
    $map = [];
    $n = count($nums);
    for ($i = 0; $i < $n; $i++) {
        $complement = $target - $nums[$i];
        if (isset($map[$complement])) {
            return [$map[$complement], $i];
        }
        $map[$nums[$i]] = $i;
    }
    return [];
}

// Ejemplo de uso:
$numeros = [2, 7, 11, 15];
$objetivo = 9;
$resultado = twoSum($numeros, $objetivo);
echo "<pre>" . PHP_EOL;
var_dump($resultado);
echo "</pre>" . PHP_EOL;
