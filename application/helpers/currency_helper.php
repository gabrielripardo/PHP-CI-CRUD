<?php
function reais($numero){
    return "R$ " . number_format($numero, decimals: 2, dec_point: ",", thousands_sep: ".");
}