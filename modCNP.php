<html> 
 

<center> 
	<head>
		<style>
			.button {
				box-shadow: 3px 4px 0px 0px #8a2a21;
				background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
				background-color:#c62d1f;
				border-radius:18px;
				border:2px solid #d02718;
				display:inline-block;
				cursor:pointer;
				color:#ffffff;
				font-family:Arial;
				font-size:17px;
				padding:25px 25px;
				text-decoration:none;
				text-shadow:0px 1px 0px #810e05;
				}

			.button:hover {
			background-color: green;
			}
			.button:active {
			position:relative;
			top:1px;
			}
		</style>
	<title>Modificare dupa CNP</title>
	</head>
	

	
	<body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>
	<body>
		<div class='d-flex justify-content-center'>
				<button class="button"> <a href="index.php">Acasa</a></button>
				<br>
				</div>
				

	</body>
	
	<br>Introduceti CNP-ul angajatului ce va fi modificat. 
<form action="modCNP.php" method="post">
    CNP:  <input type="text" name="cnp" /><br />
	
	<br>Alegeti atributul ce va fi modificat:
	Nume atribut: <br>
	<input type="radio" name="atr_name" value="numeAngajat" checked> numeAngajat<br>
	<input type="radio" name="atr_name" value="CNP"> CNP<br>
	<input type="radio" name="atr_name" value="departament"> departament ("Tehnic","Proiectare","Achizitii") <br>
	<input type="radio" name="atr_name" value="salariuAngajat"> salariuAngajat<br>
	<input type="radio" name="atr_name" value="specializare">  specializare ("beton","finisaj","zidarie","proiectare","tamplarie","apa","electricitate","gaze","achizitii") <br>
	<input type="radio" name="atr_name" value="telefonAngajat"> telefonAngajat<br>
	
	
	Valoare noua atribut:  <input type="text" name="new_val" /><br />
    <input type="submit" name="submit" value="Submit me!" />
</form>



<?php
		$db=mysqli_connect('localhost','root','','firmaConstructiiBD')or die('Error connecting to MySQL server.');

		//afisare completa   	echo  $row['numeAngajat']. '\t|\t' .$row['CNP'].'<br/>';
		$query = "UPDATE  tblAngajati SET " . $_POST["atr_name"] . " = '" . $_POST["new_val"] . "' WHERE CNP= '" . $_POST["cnp"] . "'" ;
		$result= mysqli_query($db,$query) or die('Error querying for tblAngajati mod' . mysql_error());
		if ($result)
			echo "Comanda executata cu succes!"	;
		
		mysqli_close($db);
			
		?>
		
		<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
		<br>Daca doriti sa verificati stergerea apasati aici: 
				<button class="button"> <a href="afisare_completa.php">Verificare</a></button>

</center>


</html>