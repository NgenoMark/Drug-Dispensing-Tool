
  document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Simulate a successful registration
    // You can replace this with your actual registration logic
    // For this example, we'll display the message for 5 seconds
    displayFeedbackMessage('User successfully registered', 5000);
  });

  // Function to display a feedback message
  function displayFeedbackMessage(message, duration) {
    const feedbackDiv = document.createElement('div');
    feedbackDiv.textContent = message;
    feedbackDiv.classList.add('feedback-message');
    
    document.body.appendChild(feedbackDiv);

    // Hide the message after the specified duration
    setTimeout(function () {
      feedbackDiv.style.display = 'none';
    }, duration);
  }






       
