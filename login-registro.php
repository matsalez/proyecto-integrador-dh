<?php

// Incluimos el controlador del registro-login
// De esta manera tengo el scope a la funciones que necesito
  require_once 'register-login-controller.php';

	$pageTitle = 'Registro';
	require_once 'partials/head.php';

  $countries = [
      'ar' => 'Argentina',
      'br' => 'Brasil',
      'pr' => 'Perú',
      'bl' => 'Bolivia',
      'mx' => 'México',
      'ch' => 'Chile',
      'pa' => 'Paraguay',
      'ur' => 'Uruguay',
  ];

  $errorsInRegister = [];

  // Variables para persitir

  $user = '';
  $name = '';
  $email = '';
  $countryFromPost = '';

  if ($_POST) {

    $user = trim($_POST['user']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $countryFromPost = $_POST['country'];

  $errorsInRegister = registerValidate();

  if ( !$errorsInRegister ) {

    $imgName = saveImage();

    $_POST['avatar'] = $imgName;

    $theUser = saveUser();

    setcookie('userLoged', $theUser['email'], time() + 3000);

    login($theUser);
  }
}

?>

<div class="fondo">
    <div class="row">
        <div class="col-lg-8 col-md-12">


            <div class="formulario-registro">
                <form class="login"  method="post" enctype="multipart/form-data">
                    <img class="logoform"src="images/logo.png" alt="logo-isabella">

                    <br>
                    <label for=""> Usuario: <span class="invalid-feedback"><?= isset($errorsInRegister['user']) ? $errorsInRegister['user'] : null; ?> </span> </label>
                    <br>
                    <input
                    type="text"
                    name="user"
                    value="<?= $user; ?>">
                    <br>

                    <label for=""> Nombre Completo: <span class="invalid-feedback"><?= isset($errorsInRegister['name']) ? $errorsInRegister['name'] : null; ?> </span> </label>
                    <br>
                    <input
                    type="text"
                    name="name"
                    value="<?= $name; ?>">
                    <br>
                    <label> Pais de Nacimiento:</label>
                    <br>
                    <select name="country">
                        <option value="">Elegí un país</option>
                        <?php foreach ($countries as $code => $country): ?>
                          <option value="<?= $code ?>"
                            <?= $code == $countryFromPost ? 'selected' : null; ?>>
                            <?= $country ?>
                          </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= isset($errorsInRegister['country']) ? $errorsInRegister['country'] : null; ?>
                      </div>

                    <hr>
                    <br>
                    <label for=""> Email: <span class="invalid-feedback"><?= isset($errorsInRegister['email']) ? $errorsInRegister['email'] : null; ?> </span></label>
                    <br>
                    <input
                    type="email"
                    name="email"
                    value="<?= $email; ?>">
                    <br>
                    <label for=""> Confirmación de Email:<span class="invalid-feedback"><?= isset($errorsInRegister['emailConfirmation']) ? $errorsInRegister['emailConfirmation'] : null; ?> </span> </label>
                    <br>
                    <input
                    type="email"
                    name="emailConfirmation"
                    value="">
                    <br>
                    <label for=""> Contraseña:<span class="invalid-feedback"><?= isset($errorsInRegister['password']) ? $errorsInRegister['password'] : null; ?> </span> </label>
                    <br>
                    <input
                    type="password"
                    name="password"
                    value="">
                    <br>
                    <label for=""> Confirmacion de Contraseña:<span class="invalid-feedback"><?= isset($errorsInRegister['rePassword']) ? $errorsInRegister['rePassword'] : null; ?> </span> </label>
                    <br>
                    <input
                    type="password"
                    name="rePassword"
                    value="">
                    <br>
                    <br>
                    <label>Subí tu imagen de perfil <span class="invalid-feedback"><?= isset($errorsInRegister['avatar']) ? $errorsInRegister['avatar'] : null; ?></span> </label>
                    <br>
                    <input
                    class"examinar"
                    type="file"
                    name="avatar" >
                    <br>
                    <hr>
                    <button
                    type="submit"
                    class="btn btn-success">Registrate</button>
                    <br>

                    <a class="volver" href="index.php"> <span><< Home</span> </a>

              </form>
            </div>
          </div>
          <div class="col-4 ">
                  <img class="imagen-registro" src="images/imagen-registro-02.jpg" alt="">
          </div>
      </div>
    </div>
  <?php require_once 'partials/footer.php'; ?>
