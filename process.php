<?php
/**
 * Script de traitement du widget WhatsApp
 * Ce script reçoit le message, peut l'enregistrer dans une base de données,
 * puis redirige l'utilisateur vers l'API WhatsApp.
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Récupération et nettoyage du message
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // 2. Paramètres WhatsApp
    $phoneNumber = " 00243978497929"; // Remplacez par votre numéro (ex: 33 pour la France)
    
    if (!empty($message)) {
        // Optionnel : Enregistrer le message dans un fichier log ou BDD
        // file_put_contents('messages.log', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);

        // 3. Construction de l'URL WhatsApp
        $encodedMessage = urlencode($message);
        $whatsappUrl = "https://wa.me/message/7F42HYVGRNKXG1{$phoneNumber}?text={$encodedMessage}";

        // 4. Redirection vers WhatsApp
        header("Location: " . $whatsappUrl);
        exit();
    } else {
        // Si le message est vide, on retourne à l'index
        header("Location: index.php");
        exit();
    }
} else {
    // Accès direct interdit
    header("Location: index.php");
    exit();
}
?>
