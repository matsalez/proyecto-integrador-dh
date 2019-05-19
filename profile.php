<?php

	require_once 'register-login-controller.php';

	if ( !isLogged() ) {
		header('location: login.php');
		exit;
	}

	$pageTitle = 'Perfil';
	require_once 'partials/head.php';

	$theUser = $_SESSION['userLoged'];
?>
	<?php require_once 'partials/nav-bar.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<br>
				<h2>Hi <?= $theUser['name']; ?></h2>
				<img src="data/avatars/<?= $theUser['avatar']; ?>" alt="imagen usuario">
				<br><br>
				<a href="#" class="btn btn-info"><?= $theUser['email']; ?></a>
        <hr>
        <a class="btn-success" href="log-out.php">Cerrar Sesión</a>
			</div>
		</div>
	</div>

<?php require_once 'partials/footer.php'; ?>
