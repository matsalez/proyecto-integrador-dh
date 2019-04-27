
<div class="descripcion-producto">
<div class="container">
  <div class="row">
    <div class="col-12 col-md-9">
      <div class="unproductoimagen">
        <img src="images/producto.jpg" class="img-responsive" alt="Responsive image">
      </div>
    </div>
    <div class="col-12 col-md-3">
      <section class="detalle-producto">
        <h3 class="titulo-producto">Campera Aria</h3>
        <hr>
        <p class="precio-producto">$2000</p>
        <p class="descripcion">campera roja de algodón y detalles en los costados</p>
        <form class="datos-comprar" action="index.html" method="get ">
          <label class="dar-el-color">color</label>
          <select class="elegir-color" name="elegir-colores">
            <option value="eleccion" class="eleccion-colores">Elegir una opción</option>
            <option value="negro">Negro</option>
            <option value="rojo">Rojo</option>
            <option value="blanco">Blanco</option>
          </select>
        </form>
    <br>
        <form class="datos-talles" action="index.html" method="post">
          <label class="dar-el-talle">talles</label>
          <select class="elegir-talle" name="elegir-talles">
            <option value="eleccion-talles" class="eleccion-talles">Elegir una opción</option>
              <option value="S">SMALL</option>
              <option value="M">MEDIUM</option>
            <option value="L">LARGE</option>
          </select>
        </form>
      </section>
      <br>
      <div>
        <button type="submit" name="comprar" class="boton-comprar">comprar</button>
      </div>
    </div>
  </div>
</div>
</div>
