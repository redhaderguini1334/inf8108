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
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dob' => $dob,
        'email' => $email,
        'address' => $address,
        'password' => $password,
        'vardNumber' => $cardNumber
    ];
    // Ici, tu peux enregistrer les données dans une base de données
    // ou les traiter selon tes besoins.
    // Chemin vers le fichier JSON
    $filePath = 'data.json'; 
    $currentData = [];

    // Vérifier si le fichier existe
    if (file_exists($filePath)) {
        $currentData = json_decode(file_get_contents($filePath), true);
    } else {
        // Si le fichier n'existe pas, créer un tableau vide
        $currentData = [];
    }

    // Ajouter les nouvelles données
    $currentData[] = $data;

    // Enregistrer les données dans le fichier JSON
    file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT))
?>
