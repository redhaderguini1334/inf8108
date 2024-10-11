<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password']; // À ne pas stocker en clair
    $address = $_POST['address'];
    $cardNumber = $_POST['card-number']; // À ne pas stocker en clair

    // Ici, tu peux enregistrer les données dans une base de données
    // ou les traiter selon tes besoins.

    // Exemple de réponse
    echo "Données reçues : $firstName $lastName, $dob, $email, $address.";
} else {
    echo "Méthode non autorisée.";
}
?>
