<?php

const OCTAL_FORMAT = 8;
const FIRST_INDEX = 0;

function octal2decimal(string $octalNumber) : int
{
    $tempOctal = $octalNumber;

    // validation octal numbers
    for ($i = FIRST_INDEX; $i < strlen($tempOctal); $i++) {
        if ((bool)preg_match_all("/[0-7]/", $tempOctal[$i]) == false) {
            throw new Exception(message: "Error with input string. Check to ensure that the input contains valid octal numbers.");
        }
    }

    $decimal = null;
    $length = strlen($tempOctal);
    for ($i = FIRST_INDEX; $i < strlen($tempOctal); $i++) {
        $decimal += $tempOctal[$i] * (OCTAL_FORMAT ** --$length);
    }

    return $decimal;
}

// example implementations
try {
    // echo octal2decimal(octalNumber: "A") . PHP_EOL; ERROR
    echo octal2decimal(octalNumber: "2042") . PHP_EOL;
} catch(Exception $exception) {
    echo "Error : " . $exception->getMessage() . PHP_EOL;
}