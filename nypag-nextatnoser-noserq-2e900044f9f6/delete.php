<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ticket_id'])) {
    $host = 'localhost';
    $db = 'noserq';
    $user = 'noserq_user';
    $pass = 'fwbge8f0izb37';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        $stmt = $pdo->prepare("DELETE FROM tickets WHERE id = ?");
        $stmt->execute([$_POST['ticket_id']]);
    } catch (PDOException $e) {
        die("Fehler beim Löschen: " . $e->getMessage());
    }
}

header('Location: admin.php');
exit();
