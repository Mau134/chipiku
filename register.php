<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Chipiku Stores Register</title>
</head>
<body>
  <div class="container">
    <img src="./images/chipikulogo.jpg" alt="Logo" class="logo">
    <div class="register-form">
      <h2>Register</h2>
      <form id="registerForm">
        <label for="firstName">First Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="LastName">Last Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="password">Confirm Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="button" onclick="register()">Register</button>
      </form>
      <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
