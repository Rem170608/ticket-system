<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ticket ziehen - Next @ Noser</title>
<!-- FontAwesome für das weiße Ticket-Icon -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>
<style>
  body {
    background-color: #d5e1ee;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .container {
    background: white;
    padding: 40px 50px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    width: 320px;
    text-align: center;
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
    max-width: 200px;
    margin-bottom: 0px;
  }
  input[type="text"] {
    width: 100%;
    padding: 14px 12px;
    margin: 10px 0 20px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
  }
  button {
    background-color: #1e40af;
    color: white;
    font-weight: bold;
    font-size: 18px;
    padding: 14px;
    border: none;
    border-radius: 10px;
    width: 100%;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #3749d6;
  }
  .kategorie {
    width: 100%;
    padding: 14px 12px;
    margin: 10px 0 20px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
  }
</style>
</head>
<body>
  <div class="container">
    <div class="nav">
        <a href="admin.php" class="home">Home</a>
        <a href="live.php" class="live">Live</a>
    </div>
    <img src="logo.png" alt="Next @ Noser Logo" class="logo" />
    <form action="submit.php" method="post">
      <input type="text" name="name" placeholder="Name" required />
      <select name="kategorie" id="option" class="kategorie">
        <option value="Frage">Frage</option>
        <option value="Problem">Problem</option>
        <option value="Korrektur">Korrektur</option>

      </select>
      <button type="submit">
        <i class="fa-solid fa-ticket"></i> Ticket ziehen
      </button>
    </form>
  </div>
</body>
</html>
