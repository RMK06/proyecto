<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Login</title>
</head>
<body>
      <div class="login-container">
          <div class="login-info-container">
            <h1 class="title">Log in with</h1>

                 <form class="inputs-container" action="php/login.php" method="POST">
                <input class="input" type="text" placeholder="Username" name="usuario">
                <input class="input" type="text" placeholder="Password" name="contrasena">
                <p>Forgot password? <span class="span">Click here</span></p>
                <input class="btn" type="submit" name="ingresar" value="Ingresar">
               
                <p>Don't have an account? <span class="span">Sign Up</span></p>
                <a href="index2.php">ingresar</a>
                
            </form>
          </div>
            <img class="image-container" src="images/login.svg" alt="">
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>