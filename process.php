<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password']; // À ne pas stocker en clair
    $address = $_POST['address'];
    $cardNumber = $_POST['card-number']; // À ne pas stocker en clair

    // Créer un tableau avec les données
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dob' => $dob,
        'email' => $email,
        'address' => $address,
        'password' => $password,
        'vardNumber' => $cardNumber
    ];

    // Chemin vers le fichier JSON
    $filePath = 'data.json'; 
    $currentData = [];

    // Vérifier si le fichier existe
    if (file_exists($filePath)) {
        $currentData = json_decode(file_get_contents($filePath), true);
    }

    // Ajouter les nouvelles données
    $currentData[] = $data;

    // Enregistrer les données dans le fichier JSON
    if (file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT)) === false) {
        echo "Erreur lors de l'écriture dans le fichier.";
    } else {
        // Log pour vérifier
        file_put_contents('log.txt', "Données enregistrées : " . json_encode($data) . "\n", FILE_APPEND);
        echo "Données reçues : $firstName $lastName, $dob, $email, $address.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
