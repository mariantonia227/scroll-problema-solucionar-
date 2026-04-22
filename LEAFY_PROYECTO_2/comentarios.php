<?php
session_start(); // Para poder leer si hay sesión activa
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="css/comentarios.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <section>
      <header>
    <div class="barra-menu">
        <a href="principal.php"><img src="assets/IMG-20251024-WA0034-removebg-preview.png" alt=""></a>
        <nav>
          <div class="buscador-menu">
                    <input type="text" placeholder="Buscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li><a href="product.php">Productos</a></li>
                <li><a href="contact.php">Contactanos</a></li>
    <!-- Control de sesión -->
    <?php if (isset($_SESSION['nombre'])): ?>
    <li class="user-menu">
        <button class="user-btn">
            <?php echo $_SESSION['nombre']; ?> <i class="fa-solid fa-caret-down"></i>
        </button>

        <ul class="dropdown">
            <li><a href="perfil.php">Mi perfil</a></li>
            <li><a href="php/logout.php">Cerrar sesión</a></li>
        </ul>
    </li>
<?php else: ?>
    <li><a href="login.php" class="btn-login">Iniciar sesión</a></li>
<?php endif; ?>
                <a href="carrito.php" class="btn-carrito">Carrito</a>
              </ul>
            </nav>
          </div>
      </header>
</section>
    <br>
<br>
<br>

<section>
<div class="barra-comentarios">
    <div class="comentarios-header">
   <h3>Comentarios</h3>
   <div class="filtro">
    <button class="btn-filtrar">Mas reciente</button>
  </div>
    </div>
   <hr>
  </div>
  <section class="comentarios-contenedor">
    <div class="comentario">
            <div class="comentario-header">
                <img src="https://via.placeholder.com/50" class="avatar">
                <div class="usuario-info">
                    <h4>Usuario Anónimo</h4>
                    <span class="fecha">Hace 2 horas</span>
                </div>
            </div>

            <p class="comentario-texto">
                La calidad de la ropa es excelente, me encantó.
            </p>

    <div class="acciones-comentario">
        <button class="btn-reportar">
          <span class="icono-alerta">!</span>
          Reportar
        </button>

        <div class="reacciones">
            <button class="like">👍</button>
            <button class="dislike">👎</button>
        </div>
    </div>
    </div>

    <div class="comentario">
            <div class="comentario-header">
                <img src="https://via.placeholder.com/50" class="avatar">
                <div class="usuario-info">
                    <h4>Usuario Anónimo</h4>
                    <span class="fecha">Hace 1 semana</span>
                </div>
            </div>

            <p class="comentario-texto">
                Me encanta esta pagina.
            </p>

    <div class="acciones-comentario">
        <button class="btn-reportar">
          <span class="icono-alerta">!</span>
          Reportar
        </button>

        <div class="reacciones">
            <button class="like">👍</button>
            <button class="dislike">👎</button>
        </div>
    </div>
    </div>


        <!-- Caja para publicar comentario -->
        <div class="publicar">
            <h3>Publicar comentario</h3>
            <textarea placeholder="Escribe tu opinión aquí..."></textarea>
            <button>Publicar</button>
        </div>
  </section>

</section>
<br>
<br>
    <section>
      <footer>
        <div class="parte-abajo">
          <h4>Ayuda e Información</h4>
          <ul>
          <li><a href="contact.php">Contactanos</a></li>
            <li><a href="politica_envios.php">Politica de Envios</a></li>
            <li><a href="terminos_ventas.php">Terminos y Condiciones de ventas</a></li>
            <li><a href="terminos.php">Términos y condiciones</a></li>
          </ul>
        </div>
    
        <div class="parte-abajo">
          <h4>Sobre nosotros</h4>
          <ul>
            <li><a href="principal.php#info-texto">Quiénes somos</a></li>
            <li><a href="principal.php#proyecto">Sobre el proyecto</a></li>
          </ul>
        </div>

                <div class="redes">
          <h4>Donde encontrarnos</h4>
          <ul>
            <li><a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-square-facebook"></i></a></li>
            <li><a href="https://www.tiktok.com" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
          </ul>
        </div>
    
        <div class="slogan">
          <div class="imagen-sloga">
        <img src="assets/Rectangle 26.png" alt="imagen del slogan"  width="600" height="300">
    </div>
          <br>
          <p><span>Leafy</span><br>¡Ropa <br> sostenible <br> para todo el <br> mundo!</p>
        </div>
      </footer>
    </section>
    <script src="js/script.js"></script>
</body>
</html>