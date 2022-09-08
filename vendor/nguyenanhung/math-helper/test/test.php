<?php
/**
 * Project math-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/21/2021
 * Time: 02:39
 */
require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\Math\Random;
use nguyenanhung\Libraries\Math\BigInteger;

$bytes = Random::getBytes(32);
printf("Random bytes (in Base64): %s\n", base64_encode($bytes));

$boolean = Random::getBoolean();
printf("Random boolean: %s\n", $boolean ? 'true' : 'false');

$integer = Random::getInteger(0, 1000);
printf("Random integer in [0-1000]: %d\n", $integer);

$float = Random::getFloat();
printf("Random float in [0-1): %f\n", $float);

$string = Random::getString(32, 'abcdefghijklmnopqrstuvwxyz');
printf("Random string in latin alphabet: %s\n", $string);

$bigInt = BigInteger::factory('bcmath');

$x = Random::getString(100, '0123456789');
$y = Random::getString(100, '0123456789');

$sum = $bigInt->add($x, $y);
$len = strlen($sum);

printf("%{$len}s +\n%{$len}s =\n%s\n%s\n", $x, $y, str_repeat('-', $len), $sum);


$digits = 100;
$x      = '-' . Random::getString($digits, '0123456789');

$byte = $bigInt->intToBin($x);

printf(
    "The binary representation of a big integer with %d digits:\n%s\nis (in Base64 format): %s\n",
    $digits,
    $x,
    base64_encode($byte)
);
printf("Length in bytes: %d\n", strlen($byte));

$byte = $bigInt->intToBin($x, true);

printf(
    "The two's complement binary representation of the big integer with %d digits:\n"
    . "%s\nis (in Base64 format): %s\n",
    $digits,
    $x,
    base64_encode($byte)
);
printf("Length in bytes: %d\n", strlen($byte));