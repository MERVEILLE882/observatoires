<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'Envoi de Newsletter</title>
    <!-- Inclure le CSS pour le style -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #3a57af, aqua);
            font-family: "Sansita Swashed", cursive;
        }
        .center {
            position: relative;
            padding: 50px 50px;
            background: #fff;
            border-radius: 10px;
        }
        .center h1 {
            font-size: 2em;
            border-left: 5px solid dodgerblue;
            padding: 10px;
            color: #000;
            letter-spacing: 5px;
            margin-bottom: 60px;
            font-weight: bold;
            padding-left: 10px;
        }
        .center .inputbox {
            position: relative;
            width: 300px;
            height: 50px;
            margin-bottom: 50px;
        }
        .center .inputbox input, .center .inputbox textarea {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            border: 2px solid #000;
            outline: none;
            background: none;
            padding: 10px;
            border-radius: 10px;
            font-size: 1.2em;
        }
        .center .inputbox textarea {
            height: 150px; /* Ajuster la hauteur du textarea */
            resize: vertical; /* Permettre le redimensionnement vertical */
        }
        .center .inputbox span {
            position: absolute;
            top: 14px;
            left: 20px;
            font-size: 1em;
            transition: 0.6s;
            font-family: sans-serif;
        }
        .center .inputbox input:focus ~ span,
        .center .inputbox input:valid ~ span,
        .center .inputbox textarea:focus ~ span,
        .center .inputbox textarea:valid ~ span {
            transform: translateX(-13px) translateY(-35px);
            font-size: 1em;
        }
        .center .inputbox [type="submit"] {
            width: 100%;
            background: dodgerblue;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 15px 20px;
            border-radius: 5px;
            font-size: 1.2em;
            transition: background 0.3s ease;
            margin-top: 79px;
        }
        .center .inputbox [type="submit"]:hover {
            background: linear-gradient(45deg, #3a57af, dodgerblue);
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Formulaire d'Envoi de Newsletter</h1>
        <form action="../metier/send_newsletters.php" method="post">
            <div class="inputbox">
                <input type="text" id="subject" name="subject" required>
                <span>Sujet de la Newsletter</span>
            </div>
            <div class="inputbox">
                <textarea id="content" name="content" rows="5" required></textarea>
                <span>Contenu de la Newsletter</span>
            </div>
            <div class="inputbox">
                <input type="submit" value="Envoyer la Newsletter">
            </div>
        </form>
    </div>
</body>
</html>
