<?php
global $base;

$dsn = "mysql:host=localhost;dbname=isabella;port=3306";
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$base = new PDO($dsn, 'root', '', $opt); //se conecta a la base de datos y me devuelve un objeto PDO que me sirve para correr consultas en esa base de datos
