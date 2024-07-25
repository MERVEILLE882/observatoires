<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
            margin: 0 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); }
            to { transform: translateY(0); }
        }

        form {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            flex-grow: 1;
            margin-right: 10px;
            transition: border-color 0.3s;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #3a57af;
            outline: none;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3a57af;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2e478e;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            form {
                flex-direction: column;
                align-items: stretch;
            }

            input[type="text"] {
                margin: 0 0 10px 0;
                width: 100%;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Chatbot</h1>
    <form method="POST" action="../metier/chat.php">
        <input type="text" name="message" placeholder="Posez une question..." required>
        <input type="submit" name="ok" value="Envoyer">
    </form>
</div>

</body>
</html>
