<?php
header('Content-Type: application/json; charset=utf-8');

// Datenbankverbindung
try {
    $db = new PDO('mysql:host=localhost;dbname=noserq;charset=utf8', 'noserq_user', 'fwbge8f0izb37');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Datenbank-Verbindungsfehler: ' . $e->getMessage()]);
    exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'getTickets') {
    // Alle Tickets abrufen
    try {
        $stmt = $db->query('SELECT id, name, reihe, created_at FROM tickets ORDER BY id ASC');
        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['tickets' => $tickets]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Fehler beim Abrufen der Tickets: ' . $e->getMessage()]);
    }
} elseif ($action === 'deleteTicket') {
    // Einzelnes Ticket löschen (id per POST)
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        echo json_encode(['error' => 'Ungültige Ticket-ID']);
        exit;
    }

    $id = (int)$_POST['id'];

    try {
        $stmt = $db->prepare('DELETE FROM tickets WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Fehler beim Löschen des Tickets: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Ungültige Aktion']);
}
