<?php
session_start();

// Wenn Session admin nicht gesetzt, weiterleiten zum Login
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Verbindung zur DB herstellen
try {
    $pdo = new PDO('mysql:host=localhost;dbname=noserq;charset=utf8', 'noserq_user', 'fwbge8f0izb37');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tickets löschen
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $stmtDel = $pdo->prepare("DELETE FROM tickets WHERE id = :id");
        $stmtDel->execute(['id' => $_GET['id']]);
        header('Location: admin.php');
        exit();
    }

    // Alle Tickets abfragen
    $stmt = $pdo->query("SELECT id, name, reihe, created_at FROM tickets ORDER BY created_at DESC");
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Fehler: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<title>Admin Bereich - Tickets</title>
<meta http-equiv="refresh" content="3" />
<style>
body {
    font-family: Arial, sans-serif;
    background: #dbe9f4;
    margin: 0;
    padding: 20px;
}
.container {
    max-width: 900px;
    margin: 20px auto 100px;
    background: white;
    border-radius: 15px;
    padding: 25px 40px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    min-height: 500px;
}
h1 {
    text-align: center;
    color: #222;
    margin-bottom: 25px;
}
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
}
th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    text-align: center;
}
th {
    background-color: #0b5ed7;
    color: white;
}
tr:hover {
    background-color: #f1f7ff;
}
.btn-done {
    background-color: #dc3545;
    border: none;
    padding: 7px 14px;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
}
.nav {
    margin-bottom: 30px; /* Creates space below the navigation bar */
    width: 100%; /* Optional: makes the nav full width */
    text-align: center; /* Centers the nav buttons horizontally */
}
.nav a {
    float: left;
    font-weight: bold;
    color: white;
    background-color: #0b5ed7;
    border: 2px solid #0b5ed7;
    text-decoration: none;
    margin-bottom: 15px;
    margin-left: 10px;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}
.logo {
    margin-top: 40px; /* Adds space between the nav and logo */
}

.logo img {
    display: block;
    max-height: 140px;
    width: auto;
    height: auto;
}
.no-tickets {
    text-align: center;
    margin-top: 50px;
    color: #666;
    font-size: 1.2em;
}
</style>
</head>
<body>
<div class="container">
    <div class="nav">
        <a href="admin.php" class="home">Home</a>
        <a href="index.php" class="new-ticket">Neues Ticket</a>
        <a href="live.php" class="live">Live</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="logo">
        <img src="logo.png" alt="Logo" class="logo" />
    </div>
    <h1>Ticket Übersicht</h1>

    <?php if (count($tickets) > 0): ?>
    <table>
        <thead>
            <tr><th>ID</th><th>Name</th><th>Reihe</th><th>Zeit</th><th>Aktion</th></tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= htmlspecialchars($ticket['id']) ?></td>
                <td><?= htmlspecialchars($ticket['name']) ?></td>
                <td><?= htmlspecialchars($ticket['reihe']) ?></td>
                <td><?= htmlspecialchars($ticket['created_at']) ?></td>
                <td>
                    <a href="admin.php?action=delete&id=<?= urlencode($ticket['id']) ?>" class="btn-done" onclick="return confirm('Ticket wirklich löschen?');">Erledigt</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="no-tickets">Keine Tickets vorhanden.</p>
    <?php endif; ?>
</div>
</body>
</html>
