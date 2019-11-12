<?php 

	$connect = mysqli_connect("localhost","root","","kinoteatr_db");
	if (!$connect) {
			echo exit("ERROR"). "Не смог подключиться к базе данных";
	}
	
	

 ?>