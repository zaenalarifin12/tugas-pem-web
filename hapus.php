<?php
require_once('init/init.php');
$id = $_GET['id'];

deletePegawai($id);
header('Location: index.php ');

?>