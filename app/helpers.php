<?php

function formatPrice($number) {
if ($number >= 1000000000000000) {
    return number_format($number / 1000000000000000) . "Qa";
} else if ($number >= 1000000000000) {
    return number_format($number / 1000000000000) . "T";
} else if ($number >= 1000000000) {
    return number_format($number / 1000000000) . "B";
} else if ($number >= 1000000) {
    return number_format($number / 1000000) . "M";
} else if ($number >= 1000) {
    return number_format($number / 1000) . "k";
} else {
    return strval($number);
}
}