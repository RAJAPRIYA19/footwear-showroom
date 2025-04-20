<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>StepIn Style Chatbot</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f0f0;
      padding: 40px;
    }

    .chat-container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .chat-box {
      height: 400px;
      overflow-y: auto;
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 6px;
      background: #fafafa;
    }

    .message {
      margin-bottom: 10px;
    }

    .user {
      text-align: right;
      color: #007bff;
    }

    .bot {
      text-align: left;
      color: #444;
    }

    input[type="text"] {
      width: 75%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      padding: 10px 15px;
      background: #333;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background: #555;
    }
  </style>
</head>
<body>

  <div class="chat-container">
    <h2>StepIn Style Chatbot</h2>
    <div class="chat-box" id="chatBox"></div>
    <input type="text" id="userInput" placeholder="Type your message...">
    <button onclick="sendMessage()">Send</button>
  </div>

  <script src="script.js"></script>

</body>
</html>
