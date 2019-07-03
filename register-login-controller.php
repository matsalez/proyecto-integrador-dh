<?php

	require_once 'conexion.php';

	// Inicio la sesión
	session_start();

	// Definimos las constantes que necesitamos en nuestro proyecto
	define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']); //Imagenes permitidas
	define('IMAGE_PATH', dirname(__FILE__) . '/data/avatars/'); //ruta donde va a guardar las imagenes
	define('USERS_JSON_PATH', dirname(__FILE__) . '/data/users.json'); //ruta donde va a guardar en el archivo json.

	//Función para Validar el registro

	function registerValidate(){
		$errors = [];

		$user = trim($_POST['user']);
		$name = trim($_POST['name']);
		$country = $_POST['country'];
		$email = trim($_POST['email']);
    $emailConfirmation = trim($_POST['emailConfirmation']);
		$password = trim($_POST['password']);
		$rePassword = trim($_POST['rePassword']);
		$avatar = $_FILES['avatar'];

		if ( empty($user) ) {
			$errors['user'] = 'El campo usuario no puede estar vacío';
		} elseif ( userExist($user) ) { // Si no existe el user
			 $errors['user'] = 'Este usuario está registrado en nuestra base de datos';
		}

		if ( empty($name) ) {
			$errors['name'] = 'El campo nombre no puede estar vacío';
		} //Si el nombre esta vacio en la posicion 'name' del array vacio error va a ejecutar la frase que pongamos
		if ( empty($country) ) {
				 $errors['country'] = 'Elegí un país';
			 }
		if ( empty($email) ) {
			$errors['email'] = 'El campo email es obligatorio';
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$errors['email'] = 'Introducí un formato de email válido';
		} elseif ( emailExist($email) ) { // Si no existe el email
			 $errors['email'] = 'Ese correo está registrado en nuestra base de datos';
		}
    if ( empty($emailConfirmation) ) {
      $errors['emailConfirmation'] = 'El campo confirmar email es obligatorio';
    } elseif ( !filter_var($emailConfirmation, FILTER_VALIDATE_EMAIL) ) {
      $errors['emailConfirmation'] = 'Introducí un formato de email válido';
    } elseif ($email != $emailConfirmation) {
    	$errors['emailConfirmation'] = 'Los emails no coinciden';
    }

		if(empty($password)){
	    $errors['password']='El campo de contraseña no puede estar vacio';
	  } elseif (!strlen($password)>5) {
	    $errors['password']='La contraseña debe tener mas de 5 caracteres';
	  } elseif ( strpos($password, "DH") === false || strpos($password, "DH") < 0) {
	    $errors['password']='la contraseña debe tener las letras DH';
	  }

		if ( empty($rePassword) ) {
			$errors['rePassword'] = 'El campo repetir contraseña es obligatorio';
		} elseif ($password != $rePassword) {
			$errors['rePassword'] = 'Las contraseñas no coinciden';
		}

		// if ( $avatar['error'] != UPLOAD_ERR_OK ) { //si avatar que es un array en la posicion 'error' es distinto a error ok. Es decir, hay error.
		// 	$errors['avatar'] = 'Subí una imagen';
		// } else {
		// 	$ext = pathinfo($avatar['name'], PATHINFO_EXTENSION); //sacamos la extensión del archivo
		//
		// 	if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) { //en el array no esta la extensión permitida
		// 		$errors['avatar'] = 'Los formatos permitidos son JPG, PNG y GIF';
		// 	}
		// }

		return $errors;
	}
	// Función para guardar la imagen
	/*
		No le pasamos parámetros, pues $_FILES es una variable global
	*/
	function saveImage() {
		// Obtengo la extensión del archivo
		$ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

		// Obtengo el archivo temporal
		$tempFile = $_FILES['avatar']['tmp_name'];

		// Armo el nombre de la imagen
		$finalName = uniqid('img_') . '.' . $ext;

		// Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
		$finalPath = IMAGE_PATH . $finalName;

		// Guardamos la imagen en nuestra carpeta
		move_uploaded_file($tempFile, $finalPath);
		// Retorno el nombre de la imagen para poder guardar el mismo en el JSON
		return $finalName;
	}

	function getAllUsers() {
		global $base;

		$consulta = $base->query("SELECT * from allusers");
		$allUsers = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $allUsers;
	}

	// Función para guardar al usuario
	function saveUser($file) {
	//	Trimeamos los valores que vinieron por $_POST

		$user = trim($_POST['user']);
		$name = trim($_POST['name']);
		$country = trim($_POST['country']);
		$email = trim($_POST['email']);
		$avatar = $file;
		$img = saveImage();
		//Hasheo el password del usuario
		$password = $_POST['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

		try {
			global $base;

			$consulta = $base->prepare("insert into allusers (user, name, country, email, password, avatar) values ('$user', '$name', '$country', '$email', '$password','$avatar')");
			$consulta->execute([$user, $name, $country, $email, $password, $avatar]);
		} catch(PDOException $error) {
			die('Error de base de datos en el guardado');
		}


}
	function login($user) {
		// Del usuario que recibo saco la posición "password" pues no me interesa tenerla en sesión
		unset($user['password']);

		// Guardo en sesión al usuario que recibo por parámetro
		$_SESSION['userLoged'] = $user;

		// Redirecciono al perfil del usuario
		header('location: profile.php');
		exit; // Siempre, después de una redirección se recomienda hacer un exit.
	}


	// Función para saber si está logueado la/el usuaria/o
	function isLogged() {
		// El return devuelve true o false, según lo que retorne la función isset()
		return isset($_SESSION['userLoged']);
	}


	function emailExist($email) {
		// Traigo a todos los usuarios
		$allUsers = getAllUsers();

		// Recorro el array de usuarios
		foreach ($allUsers as $oneUser) {
			// Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
			if ($oneUser['email'] == $email) {
				return true;
			}
		}
		// Si termino de recorrer el array y no se encontró al email que pasé como parámetro
		return false;
	}

	function userExist($user) {
		// Traigo a todos los usuarios
		$allUsers = getAllUsers();

		// Recorro el array de usuarios
		foreach ($allUsers as $oneUser) {

			// Si la posición "user" del usuario en la iteración coincide con el email que pasé como parámetro
			if ($oneUser['user'] == $user) {
				return true;
			}
		}
		// Si termino de recorrer el array y no se encontró al email que pasé como parámetro
		return false;
	}

	function loginValidate() {
		// Genero el array local de errores que retornaré al final
		$errors = [];

		// Trimeo los campos que recibo por $_POST
		$user = trim($_POST['user']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if ( empty($user) ) {
			$errors['user'] = 'El campo usuario no puede estar vacío';
		} elseif ( !userExist($user) ) { // Si no existe el user
			 $errors['user'] = 'Este usuario no está registrado en nuestra base de datos';
		}

		if ( empty($email) ) {
			$errors['email'] = 'El campo email es obligatorio';
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email no es un email válido
			$errors['email'] = 'Introducí un formato de email válido';
		} elseif ( !emailExist($email) ) { // Si no existe el email
			 $errors['email'] = 'Ese correo no está registrado en nuestra base de datos';

		} else {
			// Si pasamos las 3 validaciones anteriores, busco y  obtengo al usuario con el email que llegó por $_POST
			$oneUser = getUserByEmail($email);

			// Si el password que recibí por $_POST NO coincide con el password hasheado que está guardado en el usuario
			if ( !password_verify($password, $oneUser['password']) ) {
				$errors['password'] = 'Las credenciales no coinciden';
			}
		}
		// Si está vacío el campo: $password
		if ( empty($password) ) {
			$errors['password'] = 'El campo password es obligatorio';
		}

		// Retorno el array de errores con los mensajes de error
		return $errors;
	}
	// Función para traer a 1 usuario por email
	/*
		Recibe como parámetro el email que quiero buscar
	*/
	function getUserByEmail($email){
		// Obtengo a todos los usuarios
		$allUsers = getAllUsers();

		// Recorro el array de usuarios
		foreach ($allUsers as $oneUser) {
			// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
			if ($oneUser['email'] == $email) {
				// Retorno al usuario encontrado
				return $oneUser;
			}
		}
	}

  // Función par hacer debug
	function debug($dato) {
		echo "<pre>";
		var_dump($dato);
		echo "</pre>";
		exit;
	}

 ?>
