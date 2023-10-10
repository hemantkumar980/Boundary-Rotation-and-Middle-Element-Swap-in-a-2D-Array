<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boundary Rotation and Element Swap in a 2D Array</title>
</head>
<body>

<?php


function rotateBoundaryAndSwap($array) {
    $n = count($array);
    $result = array();

    // Initialize the result array with zeros
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $result[$i][$j] = 0;
        }
    }

    // Rotate the boundary elements anticlockwise
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i == 0 || $i == $n - 1 || $j == 0 || $j == $n - 1) {
                $newI = $n - 1 - $j;
                $newJ = $i;
                $result[$newI][$newJ] = $array[$i][$j];
            }
            else{
                $result[$i][$j] = $array[$i][$j];
            }
        }
    }

    // Swap specific elements within the matrix
    $result[($n/2)-1][($n/2)-1] = $array[($n/2)][($n/2)-1];
    $result[($n/2)][($n/2)-1] = $array[($n/2)][($n/2)];
    $result[($n/2)][($n/2)] = $array[($n/2)-1][($n/2)];
    $result[($n/2)-1][($n/2)] = $array[($n/2)-1][($n/2)-1];

    return $result;
}

function generate2DArray($n) {
    $array = array();
    $value = 1;

    for ($i = 0; $i < $n; $i++) {
        $row = array();
        for ($j = 0; $j < $n; $j++) {
            $row[] = $value;
            $value++;
        }
        $array[] = $row;
    }

    return $array;
}

// Generate a nxn array
$inputArray = generate2DArray(16);

// Print the generated array
echo "<h3>Input Array:</h3>";
foreach ($inputArray as $row) {
    foreach ($row as $value) {
        echo $value . "\t";
    }
    echo "<br>";
}


// Rotate the input array and swap elements
$outputArray = rotateBoundaryAndSwap($inputArray);

// Print the result
echo "<h3>Output Array:</h3>";
foreach ($outputArray as $row) {
    foreach ($row as $value) {
        echo $value . "\t";
    }
    echo  "<br>";
}



?>

    
</body>
</html>
