// Add this in your script.js

// Google Sign-In Logic
function googleSignIn() {
  // Use the Google Sign-In API to authenticate the user
  gapi.auth2.getAuthInstance().signIn().then(onGoogleSignInSuccess).catch(onGoogleSignInFailure);
}

// Callback function for successful Google Sign-In
function onGoogleSignInSuccess(googleUser) {
  // Retrieve user details
  var profile = googleUser.getBasicProfile();
  
  // You can now use 'profile' to get user information
  console.log('Google User ID: ' + profile.getId());
  console.log('Google User Name: ' + profile.getName());
  console.log('Google User Email: ' + profile.getEmail());

  // Add additional logic or send data to your server as needed
}

// Callback function for failed Google Sign-In
function onGoogleSignInFailure(error) {
  console.error('Google Sign-In Failed:', error);
}

// Apple Sign-In Logic
function appleSignIn() {
  // Use the Apple Sign-In API to authenticate the user
  var appleIDAuthRequest = new AppleIDAuthRequest();
  appleIDAuthRequest.requestOptions = {
    requestedScopes: ["email", "name"],
  };

  appleIDAuthRequest.performRequest().then(onAppleSignInSuccess).catch(onAppleSignInFailure);
}

// Callback function for successful Apple Sign-In
function onAppleSignInSuccess(response) {
  // Retrieve user details
  var user = response.user;

  // You can now use 'user' to get user information
  console.log('Apple User ID: ' + user);

  // Add additional logic or send data to your server as needed
}

// Callback function for failed Apple Sign-In
function onAppleSignInFailure(error) {
  console.error('Apple Sign-In Failed:', error);
}
