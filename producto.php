  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> <!-- CDN Jquery-->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/productos.css">
    <title>Producto</title>
  </head>
  <body>
    <header>
      <?php require_once('partials/header.php'); ?>
      </header>

    <body>
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
              <hr>
              <p class="descripcion">campera roja de algodón y detalles en los costados</p>
              <hr>
              <form class="datos-comprar" action="index.html" method="get ">
                <label class="dar-el-color">color</label>
                <select class="elegir-color" name="elegir-colores">
                  <option value="eleccion" class="eleccion-colores">Elegir una opción</option>
                  <option value="negro">Negro</option>
                  <option value="rojo">Rojo</option>
                  <option value="blanco">Blanco</option>
                </select>
              </form>
            <hr>
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
            <hr>
            <div>
              <button type="submit" name="comprar" class="boton-comprar">comprar</button>
            </div>
          </div>
        </div>
    </div>
    <?php require_once('partials/footer.php'); ?>

  </body>
</html>
