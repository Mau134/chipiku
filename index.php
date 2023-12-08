<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="appleid-signin-client-id" content="your-apple-client-id">
  <script src="https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"></script>
  <title>Chipiku Stores login</title>
</head>
<body>
  <div class="container">
    <img src="./images/chipikulogo.jpg" alt="Logo" class="logo">
    <div class="login-form">
      <h2>Login</h2>
      <form id="loginForm" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="button" onclick="login()">Login</button>
      </form>
      <div class="external-signin">
      <img src="./images/google.jpeg" alt="Google" class="external-signin-icon">
      <img src="./images/Apple.jpeg" alt="Apple" class="external-signin-icon">
      </div>
      <div>
        <button>Sign in with Google</button>
        <button>Sign in with Apple</button>
      </div>
      <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
