<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Chipiku Stores login</title>
</head>
<body>
  <div class="container">
    <img src="./images/chipikulogo.jpg" alt="Logo" class="logo">
    <div class="login-form">
      <h2>Login</h2>
      <form id="loginForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="button" onclick="login()">Login</button>
      </form>
      <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
