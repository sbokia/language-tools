<?php

$greek_to_german_iso843 = array (
    
    "Α" => "A",
    "Ά" => "Á",
    "Β" => "V",
    "Γ" => "G",
    "Δ" => "D",
    "Ε" => "E",
    "Έ" => "É",
    "Ζ" => "Z",
    "Ι" => "I",
    "Ί" => "Í",
    "Ϊ" => "Ï",
    "Θ" => "Th",
    "Η" => "Í",
    "Ή" => "Ī́",
    "Κ" => "K",
    "Λ" => "L",
    "Μ" => "M",
    "Ν" => "N",
    "Ξ" => "X",
    "Ο" => "O",
    "Ό" => "Ó",
    "Π" => "P",
    "Ρ" => "R",
    "Σ" => "S",
    "Τ" => "T",
    "Υ" => "Y",
    "Ύ" => "Ý",
    "Ϋ" => "Ÿ",
    "Φ" => "F",
    "Χ" => "Ch",
    "Ψ" => "Ps",
    "Ω" => "Ō",
    "Ώ" => "Ṓ",
    "ά" => "á",
    "έ" => "é",
    "ί" => "í",
    "ή" => "ī́",
    "ύ" => "í",
    "α" => "a",
    "β" => "v",
    "γ" => "g",
    "δ" => "d",
    "ε" => "e",
    "ζ" => "z",
    "ι" => "i",
    "θ" => "th",
    "η" => "ī",
    "κ" => "k",
    "λ" => "l",
    "μ" => "m",
    "ν" => "n",
    "ξ" => "x",
    "ο" => "o",
    "π" => "p",
    "ρ" => "r",
    "σ" => "s",
    "ς" => "s",
    "τ" => "t",
    "υ" => "y",
    "φ" => "f",
    "χ" => "ch",
    "ψ" => "ps",
    "ω" => "ō",
    "ϊ" => "ï",
    "ϋ" => "ÿ",
    "ΐ" => "ḯ",
    "ΰ" => "ÿ́",
    "ό" => "ó",
    "ύ" => "ý",
    "ώ" => "ṓ"
);

// Checks if a character is a valid letter in the alphabet
function is_letter($character){

global $alfabet;
$is_letter = false;

for ($i = 0; $i < count($alfabet); $i++) {
    if ($character == $alfabet[$i]){
			$is_letter = true;
		}
}
	return $is_letter;
}

//Transliteration from Greek to ISO 843
function to_latin_iso($greek_word) {
    
    $latin_iso = "";
    global $greek_to_german_iso843;
    
    $i = 0;
    $laststring = " ";
    $beforelaststring = " ";
    
    while ($i < mb_strlen($greek_word, "UTF-8")) {
        
        $current_letter = mb_substr($greek_word, $i, 1,"UTF-8");
        
        if (is_letter($current_letter)){
            
            if ($current_letter == "υ" || $current_letter == "ύ") {
                
                if (substr($latin_iso, -1) == "a" || substr($latin_iso, -1) == "A" || substr($latin_iso, -1) == "e" || substr($latin_iso, -1) == "E" || substr($latin_iso, -1) == "o" || substr($latin_iso, -1) == "O") {
                    
                   $latin_iso = $latin_iso . "u";  
                    
                } else {
                    $latin_iso = $latin_iso . $greek_to_german_iso843[$current_letter];
                }
                
            } else {
                            
              $latin_iso = $latin_iso . $greek_to_german_iso843[$current_letter];
           }
                        
            }  else {
            $latin_iso = $latin_iso.$current_letter;
        }
        
        $i++;
        $beforelaststring = $laststring;
        $laststring = $current_letter;
    }
    
    return $latin_iso;
}

// Example call
echo "The greek word σπίτι in ISO 843 transliteration is ".to_latin_iso(σπίτι);
?>
