<?php

// Display space
function printSpaces($size)
{
    for ($i = 0; $i < $size; $i++) {
        echo "&nbsp;";
    }
}

function printZigZag($text, $line)
{
    $textLength = strlen($text);
    if ($line <= 0 ||  $textLength == 0) {
        return;
    } elseif ($line == 1) {
        echo "</br>&nbsp; " . $text;
    } elseif ($line >= $textLength) {
        for ($i = 0; $i < $textLength; $i++) {
            printSpaces($i);
            echo "&nbsp;" . $text[$i] . "</br>";
        }
    } else {
        // Direction indicator Up or down
        $direction = true;
        $point = 0;

        // Set default value
        for ($i = 0; $i < $line; $i++) {
            for ($j = 0; $j < $textLength; $j++) {
                $record[$i][$j] = "&nbsp; ";
            }
        }

        for ($i = 0; $i < $textLength; $i++) {
            $record[$point][$i] = $text[$i];
            if ($point == 0) {
                // Down move
                $direction = true;
            } elseif ($point == $line - 1) {
                // Up move
                $direction = false;
            }
            if ($direction == true) {
                // Increase row point
                $point++;
            } else {
                // Decrease the row point
                $point--;
            }
        }

        // Display calculated result
        for ($i = 0; $i < $line; $i++) {
            for ($j = 0; $j < $textLength; $j++) {
                echo $record[$i][$j];
            }

            echo "</br>";
        }
    }
}

$text = "thisisazigzag";
$line = 4;

// Test Cases
printZigZag($text, $line);

?>
