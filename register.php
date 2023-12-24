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
      <form id="registerForm" action="signup.php" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="picture">Profile Picture:</label>
        <input type="file" id="picture" name="picture" accept="image/*" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" required>

        <button type="submit">Register</button>
      </form>
      <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
