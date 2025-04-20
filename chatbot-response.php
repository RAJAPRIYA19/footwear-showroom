<?php
// This file will receive the user input, process it, and return a response.

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['message'])) {
    // Get the user's message from the POST request
    $userMessage = strtolower(trim($_POST['message']));
    $response = "";

    // Logic to generate a bot response based on the user's message
    if (strpos($userMessage, "hello") !== false || strpos($userMessage, "hi") !== false) {
        $response = "Hello there! How can I assist you with your footwear needs?";
    } elseif (strpos($userMessage, "shoes") !== false || strpos($userMessage, "products") !== false) {
        $response = "We offer a wide range of stylish shoes for Men, Women, and Kids.";
    } elseif (strpos($userMessage, "cart") !== false || strpos($userMessage, "order") !== false) {
        $response = "You can view or manage your cart from the Cart page.";
    } elseif (strpos($userMessage, "bye") !== false) {
        $response = "Goodbye! Hope to see you again soon 👋";
    } else {
        $response = "I'm not sure I understand. Try asking about shoes, cart, or orders.";
    }

    // Return the response to the client
    echo $response;
}
?>
