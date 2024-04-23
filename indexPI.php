
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encanto Textil</title>
  <link rel="stylesheet" href="styles2.css">
</head>
<body>
  <header class="header">
    <div class="menu container">
      <a href="#" class="logo">Encanto Textil</a>
      <input type="checkbox" id="menu"/>
      <label for="menu">
        <img src="img/menu.png" class="menu-icono" alt="menu">
      </label>
      
      <nav class="navbar">
        <ul>
          <li><a href="#">Hombre</a></li>
          <li><a href="#">Mujer</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Sobre nosotros</a></li>
        </ul>
      </nav>
      
      <?php
      session_start();
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Si el usuario está logueado, mostrar opciones de usuario autenticado
        echo '
        <div>
          <ul>
            <li class="submenu">
              <img src="img/user.svg" id="img-user" alt="user">
              <div id="user">
                <a href="perfil.php" id="ver-perfil" class="btn-2">Ver perfil</a>
                <a href="logout.php" id="cerrar-sesion" class="btn-2">Cerrar sesión</a>
              </div>
            </li>
          </ul>
        </div>';
      } else {
        // Si el usuario no está logueado, mostrar opciones de ingreso y registro
        echo '
        <div>
          <ul>
            <li class="submenu">
              <img src="img/user.svg" id="img-user" alt="user">
              <div id="user">
                <a href="indexinicio.php" id="ingresio-user" class="btn-2">Ingreso</a>
                <a href="index.php" id="registrar-user" class="btn-2">Registrar</a>
              </div>
            </li>
          </ul>
        </div>';
      }
      ?>
      <div>
        <ul>
          <li class="submenu">
            <img src="img/car.svg" id="img-carrito" alt="carrito">
            <div id="carrito">
              <table id="lista-carrito">
                <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <a href="#" id="vaciar-carrito" class="btn-2">Vaciar carrito</a>
            </div>
          </li>
        </ul>
      </div>
    </div> 
    <div class="header-content container">
      <div class="header-img">
        <img src="img/right.png" alt="">
      </div>
      <div class="header-txt">
        <h1>Oferta de Temporada</h1>
        <p>Las mejores ofertas para el momento indicado</p>
        <a href="#" class="btn-1">Ver</a>
      </div>
    </div>
  </header>

  <section class="ofert container">
    <div class="ofert-1">
      <div class="ofert-img">
        <img src="img/f1.png" alt="">
      </div>
      <div class="ofert-txt">
        <h3>Accesorios</h3>
        <a href="#" class="btn-2">Ver Productos</a>
      </div>
    </div>

    <div class="ofert-1">
      <div class="ofert-img">
        <img src="img/f2.png" alt="">
      </div>
      <div class="ofert-txt">
        <h3>Zapatillas</h3>
        <a href="#" class="btn-2">Ver Productos</a>
      </div>
    </div>
    
    <div class="ofert-1">
      <div class="ofert-img">
        <img src="img/f3.png" alt="">
      </div>
      <div class="ofert-txt">
        <h3>Bolsas</h3>
        <a href="#" class="btn-2">Ver Productos</a>
      </div>
    </div>
  </section>

  <main class="products container" id="lista-1">
    <h2>productos Destacados</h2>
    <div class="product-content">
      <div class="product">
        <img src="img/1.png" alt="producto1">
        <div class="product-txt">
          <h3>Camisa Negra</h3>
          <p>Camisa negra varon de algodon.</p>
          <p class="precio">$15.000</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="1">agregar al carrito</a>
        </div>
      </div>

      <div class="product">
        <img src="img/2.png" alt="producto1">
        <div class="product-txt">
          <h3>Chaqueta Impermeable</h3>
          <p>Chaqueta impermeable, con acolchado interior.</p>
          <p class="precio">$25.000</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="2">agregar al carrito</a>
        </div>
      </div>
      
      <div class="product">
        <img src="img/3.png" alt="producto1">
        <div class="product-txt">
          <h3>Chaqueta Mujer</h3>
          <p>Chaqueta impermeable, algodon y forrado interior.</p>
          <p class="precio">$25.000</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="3">agregar al carrito</a>
        </div>
      </div>
      
      <div class="product">
        <img src="img/4.png" alt="producto1">
        <div class="product-txt">
          <h3>Camisa de vestir azul</h3>
          <p>Camisa de vestir, con tela de alta calidad.</p>
          <p class="precio">$18.990</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="4">agregar al carrito</a>
        </div>
      </div>
      
      <div class="product">
        <img src="img/5.png" alt="producto1">
        <div class="product-txt">
          <h3>Camisa de vestir negra</h3>
          <p>Camisa de vestir, con tela de alta calidad.</p>
          <p class="precio">$18.990</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="5">agregar al carrito</a>
        </div>
      </div>
      
      <div class="product">
        <img src="img/6.png" alt="producto1">
        <div class="product-txt">
          <h3>Polar acolchado</h3>
          <p>Polar largo acolchado.</p>
          <p class="precio">$18.000</p>
          <a href="#" class="agregar_Carrito btn-2" data-id="6">agregar al carrito</a>
        </div>
      </div>     
    </div>

  </main> 
  
  <footer class="footer">
    <div class="footer-content container">
      <div class="link">
        <h3>Informaciones</h3>
        <ul>
          <li><a href="#"> Preguntas Frecuentes</a></li>
          <li><a href="#"> ¿Comó se compra?</a></li>
          <li><a href="#"> ¿Cambios y devoluciones?</a></li>
          <li><a href="#"> Garantia Legal</a></li>
        </ul>
      </div>

      <div class="link">
        <h3>Legales</h3>
        <ul>
          <li><a href="#"> Terminos y Condiciones</a></li>
          <li><a href="#"> Politica de Privacidad y Proteccion de datos</a></li>
          <li><a href="#"> Concursos y Bases legales</a></li>
        </ul>
      </div>

      <div class="link">
        <h3>Nosostros</h3>
        <ul>
          <li><a href="#"> Institucional</a></li>
          <li><a href="#"> Sobre Encanto Textil</a></li>
          <li><a href="#"> Contacto</a></li>
          <li><a href="#"> Mapa del sitio</a></li>
        </ul>
      </div>
  </footer>

  <script src="jsPagPrincipal.js"></script>


</body>
</html>
