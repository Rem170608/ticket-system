<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'fwbge8f0izb37') {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $error = "Falscher Benutzername oder Passwort.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<title>Admin Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #dbe9f4;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}
.login-container {
    background: white;
    padding: 40px 50px;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    width: 350px;
    text-align: center;
}
.login-container img {
    max-height: 130px; /* Größeres Logo */
    margin-bottom: 30px;
}
input {
    width: 100%;
    padding: 14px 12px; /* Gleich große Felder */
    margin: 12px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
}
button {
    width: 100%;
    background: #0b5ed7;
    color: white;
    padding: 14px 0; /* Gleiche Höhe wie Input */
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 18px;
    cursor: pointer;
    margin-top: 15px;
}
.error {
    color: red;
    margin: 10px 0 15px 0;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-container">
    <img src="logo.png" alt="Logo" />
    <h2>Admin Login</h2>
    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Benutzername" required />
        <input type="password" name="password" placeholder="Passwort" required />
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
