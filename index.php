<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Optica</title>
      <link rel="icon" type="image/x-svg" href="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="css/toastr.css" rel="stylesheet">
      <script src="js/toastr.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" href="css/login.css">
   </head>
  <body>
   <div class="scroll-down">DESLIZAR HACIA ABAJO
      <i class="far fa-arrow-alt-circle-down animate__animated animate__bounceIn animate__repeat-3"></i>
   </div><!-- BLOQUE 1-->
   <div style=" height: 200vh; background: url('images/principal.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;"></div><!-- IMAGEN-->
    <div class="modal">
      <div class="modal-container">
         <div  id="result-hora"></div>
         <div class="modal-left">
            <h1 class="modal-title">INICIAR DE SESIÓN</h1>
            <p class="modal-desc">Bienvenido Usuario</p>
            <div class="input-block">
               <label  class="input-label">Usuario</label>
               <input type="text" name="usuario" id="usuario" placeholder="Ingrese Usuario">
            </div>
            <div class="input-block">
               <label class="input-label">Contraseña</label>
               <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese Contraseña">
            </div>
            <div class="modal-buttons">
               <button class="input-button" id="validaIngresar">INGRESAR</button>
            </div>
         </div>
         <div class="modal-right">
            <img  src="images/lente.jpg" alt="">
         </div>
         <button class="icon-button close-button">
         <i class="far fa-times-circle "></i>
         </button>
      </div>
      <button class="modal-button">Click Aquí Inicia Sesión</button>
    </div>
  </body>

  


   <script src="js/jquery-3.2.1.min.js"></script>
   <script src="https://kit.fontawesome.com/a1c839e625.js" crossorigin="anonymous"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/login.js"></script>
</html>