<?php
$bad_words = [
    "трон","порт","краб","гипербола", "дебил","крутяк"
];

$not_bad_words = [
    "апорт","акрабат","патрон","пруток"
];

$text = "asd hello порт трон порт дурак дебил краб прут крутяк  апорт акрабат патрон пруток гипербола";

function cens( &$text, $bad_words, $not_bad_words) {
    $text = trim( $text );
    $text = explode(" ", $text);
       
    for ($i = 0; $i < count($text); $i++) {
        if (in_array($text[$i], $bad_words) and !(in_array($text[$i], $not_bad_words))) { 
             
            $text[$i] = str_repeat('*', mb_strlen($text[$i]));
        }
        echo $text[$i]." ";
    }
}

cens($text, $bad_words, $not_bad_words);
?>