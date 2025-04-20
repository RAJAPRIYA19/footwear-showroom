// Function to append user and bot messages to the chat box
function appendMessage(message, sender) {
    let chatBox = document.getElementById('chatBox');
    let messageDiv = document.createElement('div');
    messageDiv.classList.add('message');
    messageDiv.classList.add(sender); // Add sender class for styling

    messageDiv.innerHTML = message;
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;  // Ensure the chat box scrolls to the latest message
}

// Function to send a message
function sendMessage() {
    let userInput = document.getElementById('userInput');
    let message = userInput.value.trim();
    if (message === "") return;

    // Append the user's message
    appendMessage(message, 'user');
    userInput.value = "";  // Clear the input field

    // Use AJAX to get the response from the server
    getBotResponseFromAPI(message);
}

// Function to make an AJAX request to get the bot's response
function getBotResponseFromAPI(userMessage) {
    // Preventing duplicate requests by disabling the send button during AJAX request
    let sendButton = document.querySelector("button");
    sendButton.disabled = true;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "chatbot-response.php", true);  // Replace with your API endpoint
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        sendButton.disabled = false; // Re-enable the send button after receiving the response

        if (xhr.status === 200) {
            let response = xhr.responseText.trim(); // Get the response from the server
            if (response) {
                // Append the bot's response after the user's message
                appendMessage(response, 'bot');
            }
        } else {
            // Handle error if the request fails
            let response = "Sorry, I couldn't understand that. Please try again.";
            appendMessage(response, 'bot');  // Append error message
        }
    };
    xhr.send("message=" + encodeURIComponent(userMessage)); // Send the message to the server
}

// Optional: Handle the Enter key to send a message
document.getElementById("userInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
});
