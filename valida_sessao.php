<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['cpfUsuario'])) {
		die("<script>alert('Você não tem permissão para acessar esta página!'); window.location='index.php';</script>");

	}
?>
