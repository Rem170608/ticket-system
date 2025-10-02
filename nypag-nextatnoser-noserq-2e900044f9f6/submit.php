<?php
// MySQL-Verbindung
$host = "localhost";
$user = "noserq_user";
$pass = "password123456";
$db = "ticketsys";

// Verbindung aufbauen
$conn = new mysqli($host, $user, $pass, $db);

// Fehlerbehandlung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// POST-Daten überprüfen
if (isset($_POST['name']) && isset($_POST['reihe'])) {          // Reihe = Kategorie
    $name = trim($_POST['name']);
    $reihe = trim($_POST['reihe']);

    // Useless
    if ($name == "" || $reihe == "") {
        echo "Name und Reihe dürfen nicht leer sein.";
        exit;
    } elseif (strlen($reihe) > 2) {
        echo "Die Reihe darf nicht länger als 2 Zeichen sein.";
        exit;
    }

    // Datensatz einfügen
    $stmt = $conn->prepare("INSERT INTO tickets (name, seat) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $reihe);
    $stmt->execute();

    // Eigene Ticket-ID ermitteln (Auto-Increment)
    $ticket_id = $conn->insert_id;

    // Ausgabe in schöner Form
    echo "
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Ticket gezogen</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #d5e1ee;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .ticket-box {
                background: white;
                padding: 40px 50px;
                border-radius: 12px;
                text-align: center;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }
            .ticket-box h1 {
                font-size: 26px;
                margin-bottom: 10px;
            }
            .ticket-box p {
                font-size: 18px;
                margin-top: 0;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                text-decoration: none;
                color: #1e40af;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class='ticket-box'>
            <h1>Ticket erfolgreich gezogen!</h1>
            <p>Du bist die Nummer <strong>$ticket_id</strong> in der Warteschlange.</p>
            <a href='index.php'>Zurück zur Startseite</a>
        </div>
    </body>
    </html>
    ";

    $stmt->close();
    $conn->close();
} else {
    echo "Name und Reihe müssen ausgefüllt sein.";
}
?>
