document.addEventListener("DOMContentLoaded", function() {
  // Get the element to display the welcome message
  var welcomeMessage = document.getElementById("welcomeMessage");

  // Check if the welcome message element exists
  if (welcomeMessage) {
    // Make an AJAX request to get the user's information
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../includes/get_user_info.php", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.firstName) {
          // Display the welcome message with the user's first name
          welcomeMessage.textContent = "Welcome, " + response.firstName + "!";
        } else {
          // Handle error if user information not available
          welcomeMessage.textContent = "Welcome!";
        }
      } else {
        // Handle error if AJAX request fails
        welcomeMessage.textContent = "Welcome!";
      }
    };
    xhr.onerror = function() {
      // Handle error if AJAX request fails
      welcomeMessage.textContent = "Welcome!";
    };
    xhr.send();
  }
});
