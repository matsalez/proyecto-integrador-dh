<?php

	require_once 'register-login-controller.php';

	// Si está logueda la persona la redirijo al profile
	if ( isLogged() ) {
		header('location: profile.php');
		exit;
	}

	$pageTitle = 'Login';
	require_once 'partials/head.php';

	$errorsInLogin = [];

	$email = '';
	$user = '';

	if ($_POST) {

		$user = trim($_POST['user']);
		$email = trim($_POST['email']);

		$errorsInLogin = loginValidate();

		if ( !$errorsInLogin ) {

			$userToLogin = getUserByEmail($email);

			if ( isset($_POST['rememberUser']) ) {
				setcookie('userLoged', $email, time() + 3000);
			}

			login($userToLogin);
		}
	}


?>

  <div class="formulario-login">

    <form class="login" method="post">
      <img class="logoform"src="images/brakeup-logo.png" alt="">
      <br>
      <br>
      <label for=""> Usuario: <span class="invalid-feedback"><?= isset($errorsInLogin['user']) ? $errorsInLogin['user'] : null; ?> </span> </label>
      <br>
      <input
			type="text"
			name="user"
			value="<?= $user; ?>">
      <br>
      <label for=""> Email: <span class="invalid-feedback"><?= isset($errorsInLogin['email']) ? $errorsInLogin['email'] : null; ?> </span> </label>
      <br>
      <input
			type="text"
			name="email"
			value="<?= $email; ?>">
      <br>
      <label for=""> Contraseña: <span class="invalid-feedback"><?= isset($errorsInLogin['password']) ? $errorsInLogin['password'] : null; ?> </span></label>
      <br>
      <input
			type="password"
			name="password"
			value="">
      <hr>
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" name="rememberUser">
				Recordarme
			</label>
      <br>
      <button type="submit" class="btn btn-success"><b>Ingresar</b></button>
      <br>
      <br>
      <a href="login-registro.php" class="registro"> Si no estas regritado, creá un usuario aquí </a>
      <br>
      <br>
			<a class="volver" href="index.php"> <span><< Home</span> </a>
    </form>

      </div>
      </div>

      <?php require_once 'partials/footer.php'; ?>
