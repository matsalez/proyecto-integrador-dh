    <header class="main-header">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu" class="fas fa-bars boton-menu"> </label>
        <a href="index.php">
          <img class="logo-menu" src="images/logo.png" alt="logo-brake">
          </a>
        <ul class="iconos-menu">
          <aside class="cambios">
          CAMBIOS Y DEVOLUCIONES EN TODOS NUESTROS LOCALES
          </aside>
          <li><form class="formulario" method="get" action="procesar.php">
          		<input type="text" name="termino_busqueda"> </li>
              <button class="submit-search" type="submit" name="button"> <i class="fas fa-search"></i></button>

          <li><a href=#shop><span>Tu Carrito</span>  <i class="fas fa-shopping-cart"></i></a></li>
          <?php if ( !isLogged() ) : ?>
          <li><a href=login-registro.php> <span>Registrate</span><i class="fas fa-user-plus"></i></a></li>
          <li><a href=login.php> <span>ingresá</span><i class="fas fa-user"></i></a></li>
          <?php else: ?>
          <li><a href=profile.php> <span>Mi Perfil</span><i class="fas fa-user-circle"></i></a></li>
          <?php endif ?>
        </ul>
      <nav class="menu">
    		<ul >
    			<li><a href="#newarrivals">New arrivals</a></li>
    			<li class="submenu"><a href="#coleccion">Colección  <i class="fas fa-angle-down"></i></a>
    				 <ul>
    					<li><a href="#pantalones">Pantalones</a></li>
    					<li><a href="#remeras">Remeras</a></li>
    					<li><a href="#faldas">Faldas - Shorts</a></li>
    					<li><a href="#camperas">Camperas</a></li>
              <li><a href="#camisas-vestidos">Camisas - Vestidos</a></li>
    					<li><a href="#buzos-Sweaters">Buzos - Sweaters</a></li>
    					<li><a href="#jardineros-monos">Jardineros - Monos</a></li>
    					<li><a href="#sale">Sale</a></li>
    				</ul>
    			</li>
    			<li><a href="#accesorios">Accesorios</a></li>
    			<li><a href="#sprin-summer">Spring/Summer</a></li>
          <li><a href="#lookbook">Lookbook</a></li>
          <li><a href="#contacto">Contacto</a></li>
          <div class="redes-nav">
            <li><a href='http://www.twitter.com'><i class="fab fa-twitter"></i></a> </li>
            <li><a href='http://www.facebook.com/brakeupoficial'><i class="fab fa-facebook"></i></a></li>
            <li><a href='http://www.instagram.com/brakeupoficial'><i class="fab fa-instagram"></i></a></li>
          </div>
    		</ul>
    	</nav>


    </header>
