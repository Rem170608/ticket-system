<?php
// Funktion zum Abrufen der Tickets (für AJAX und Initial-Lade)
function getTicketsHtml() {
    $servername = "localhost";
    $username = "noserq";
    $password = "fwbge8f0izb37";
    $dbname = "noserq";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM tickets ORDER BY id ASC");
        $stmt->execute();
        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ob_start();
        ?>
        <div class="ticket-list">
        <?php foreach ($tickets as $ticket): ?>
            <div class="ticket">
                <div class="id">ID: <?= htmlspecialchars($ticket['id']) ?></div>
                <div><strong>Name:</strong> <?= htmlspecialchars($ticket['name']) ?></div>
                <div><strong>Kategorie:</strong> <?= htmlspecialchars($ticket['reihe']) ?></div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    } catch(PDOException $e) {
        return "<div class='error'>Fehler beim Laden der Tickets: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Wenn AJAX-Request (reload)
if(isset($_GET['action']) && $_GET['action'] === 'reload') {
    echo getTicketsHtml();
    exit;
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Live Ticket Anzeige</title>
<style>
    *, *::before, *::after {
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #d6e4f0;
        margin: 0;
        padding: 20px;
        overflow-x: hidden;
        display: flex;
        justify-content: center;
    }
    .container {
        max-width: 1800px;
        width: 100%;
        background: #fff;
        padding: 40px 60px;
        border-radius: 16px;
        box-shadow: 0 14px 40px rgba(0,0,0,0.15);
        margin: 40px 0 80px 0;
        min-height: 300px;
        text-align: center;
    }
    .nav {
        display: block;
        margin-bottom: 40px; /* Creates space below the navigation bar */
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
    .header {
        margin-top: 60px;
        display: block;
        width: auto;
        height: auto;
    }
    .header h1 {
        text-aligne: center;
        margin-top: 30px;
        color: #0a61ca;
        margin-bottom: 50px;
        font-size: 56px;
        font-weight: 800;
    }
    .ticket-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Zentriert Tickets horizontal */
        gap: 50px 60px;
    }
    .ticket {
        background: #f9fbfe;
        border-radius: 16px;
        padding: 40px 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        width: 300px;
        font-size: 28px;
        line-height: 1.4;
        font-weight: 500;
        text-align: left;
    }
    .ticket strong {
        font-weight: 700;
    }
    .ticket .id {
        color: #0a61ca;
        font-weight: 800;
        margin-bottom: 20px;
        font-size: 36px;
    }
    .error {
        color: red;
        font-weight: bold;
    }
</style>
<script>
function reloadTickets() {
    fetch('live.php?action=reload')
    .then(response => response.text())
    .then(html => {
        document.getElementById('ticket-container').innerHTML = html;
    })
    .catch(err => console.error('Fehler beim Laden:', err));
}

// Alle 3 Sekunden neu laden
setInterval(reloadTickets, 3000);

window.onload = function() {
    reloadTickets(); // Direkt beim Laden erstmal Tickets laden
};
</script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="admin.php" class="home">Home</a>
            <a href="index.php" class="new-ticket">Neues Ticket</a>
        </div>
        <div class="header">
            <h1>Live Ticket Anzeige</h1>
        </div>
        <div id="ticket-container">
            <?php
            // Initiale Ausgabe (für den Fall, dass JavaScript deaktiviert ist)
            echo getTicketsHtml();
            ?>
        </div>
    </div>
</body>
</html>
