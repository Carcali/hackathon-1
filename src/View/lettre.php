<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
       <div class="lettre">
            <form action="/form.php" method="POST">
                <div class="formulairelettre">
                    <div class="formulairelabel">
                        <label for="nom">Nom:</label>
                        <label for="prenom">Prénom:</label>
                        <label for="city">Ville:</label>
                        <label for="courriel">Courriel:</label>
                        <label for="age">Âge:</label>
                        <label for="message">Message:</label>
                    </div>
                    <div class="formulaireinput">
                        <input type="text" id="nom" name="user_firstname">
                        <input type="text" id="prenom" name="user_lastname">
                        <input type="text" id="city" name="user_city">
                        <input type="email" id="courriel" name="user_email">
                        <input type="age" id="age" name="user_age">
                        <textarea id="message" name="user_message" cols="58" rows="22"></textarea>
                    </div>
                </div>
                <button class="formulairebutton">
                    <img src="letterbox.png" alt="envoyer"/>
                </button>
            </form>
        </div>
</body>
</html>