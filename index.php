<?php

function validerMotDePasse($motDePasse) {
    // Vérifie si le mot de passe a entre 6 et 10 caractères//
    if (strlen($motDePasse) >= 6 || strlen($motDePasse) <= 10) {
        return "Erreur : Le mot de passe doit avoir entre 6 et 10 caractères.";
    }

    // Chaîne de caractères du salt//
    $salt = "ABC1234@";

    // Concatène le salt avec le mot de passe//
    $motDePasseAvecSalt = $motDePasse . $salt;

    // Chiffre (hash) le mot de passe avec l'algorithme de hachage SHA-256//
    $motDePasseChiffre = hash('sha256', $motDePasseAvecSalt);

    // Affiche un message avec la valeur du salt et le mot de passe chiffré//
    echo "Salt : " . $salt . "<br>";
    echo "Mot de passe chiffré : " . $motDePasseChiffre . "<br>";

    // Vérifie si le mot de passe chiffré correspond à une valeur prédéfinie (à des fins de démonstration)//
    $motDePasseValide = ($motDePasseChiffre === "ExempleMotDePasseChiffre");

    // Affiche un message en fonction de la validité du mot de passe//
    if ($motDePasseValide) {
        return "Mot de passe correct ! Bienvenue !";
    } else {
        return "Erreur : Mot de passe incorrect. Veuillez réessayer.";
    }
}

// Utilisation de la fonction//
$motDePasse = "qwerty10";
$resultat = validerMotDePasse($motDePasse);
echo $resultat;

?>
