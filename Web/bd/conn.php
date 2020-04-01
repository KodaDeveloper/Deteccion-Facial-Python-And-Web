<?php

	$conecta = mysqli_connect("localhost","root","","opencv");
	if (mysqli_connect_errno()) {
		die("Conexão Falhou " . mysqli_connect_errno());
		
	};

 ?>