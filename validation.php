<!DOCTYPE html>
<html lang="it">
  <head> 
    <meta charset="UTF-8">
    <title>Bubble Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <div class="container-form">
        <form action="validation.php" method="post">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="input-email">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="input-password">
          <input type="submit" class="input-submit"value="Submit">
        </form>
        <div class="container-form-message">  
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $email = $_POST['email'];
              $password = $_POST['password'];

              $errors = [];

              if (!preg_match('[@]', $email)) {
                $errors[]= "Email non valida.";
              }

              if (strlen($password) < 8) {
                $errors[] = "La password deve contenere almeno 8 caratteri.";
              }
              if (!preg_match('/[A-Z]/', $password)) {
                $errors[] = "La password deve contenere almeno una lettera maiuscola.";
              }
              if (!preg_match('/[a-z]/', $password)) {
                $errors[] = "La password deve contenere almeno una lettera minuscola.";
              }
              if (!preg_match('/\d/', $password)) {
                $errors[] = "La password deve contenere almeno un numero.";
              }

              if (!preg_match('/[^a-zA-Z\d]/', $password)) {
                $errors[] = "La password deve contenere almeno un carattere speciale.";
              }

              if (count($errors) > 0) {
                // Mostra messaggi di errore
                foreach ($errors as $error) {
                  echo "<div class='error-message'>$error</div>";
                }
              } else {
                // Mostra messaggio di successo
                echo "<div class='success-message'>La password è valida.</div>";
              }
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
