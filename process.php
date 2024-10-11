<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupère les données
    $firstName = $_GET['first-name'] ?? null;
    $lastName = $_GET['last-name'] ?? null;
    $dob = $_GET['dob'] ?? null;
    $email = $_GET['email'] ?? null;
    $password = $_GET['password'] ?? null;
    $address = $_GET['address'] ?? null;
    $cardNumber = $_GET['card-number'] ?? null;

    // Créer un tableau avec les données
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dob' => $dob,
        'email' => $email,
        'address' => $address,
        'password' => $password,
        'cardNumber' => $cardNumber
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
        echo "Données reçues : " . json_encode($data);
    }
} else {
    echo "Méthode non autorisée.";
}
?>
