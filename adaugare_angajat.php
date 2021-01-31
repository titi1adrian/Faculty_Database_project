
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
	<title>Adaugare angajat nou:</title>
	</head>
	
	
	<body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>
	<body>
		<div class='d-flex justify-content-center'>
				<button class="button"> <a href="index.php">Acasa</a></button>
				<br>
				</div>
				
	

<form action="add_ang.php" method="post">
    Nume Angajat:  <input type="text" name="nume" /><br />
	Cnp Angajat:  <input type="text" name="cnp" /><br />
	Departament:<br>
	<input type="radio" name="dep" value="Proiectare" checked> Proiectare<br>
	<input type="radio" name="dep" value="Tehnic"> Tehnic<br>
	<input type="radio" name="dep" value="Achizitii"> Achizitii<br>
	Salariu Angajat:  <input type="text" name="salariu" /><br />
	Specializare Angajat: <br>
	<input type="radio" name="spec" value="beton" checked> beton<br>
	<input type="radio" name="spec" value="finisaj"> finisaj<br>
	<input type="radio" name="spec" value="zidarie"> zidarie<br>
	<input type="radio" name="spec" value="proiectare" > proiectare<br>
	<input type="radio" name="spec" value="tamplarie"> tamplarie<br>
	<input type="radio" name="spec" value="apa"> apa<br>
	<input type="radio" name="spec" value="electricitate" > electricitate<br>
	<input type="radio" name="spec" value="gaze"> gaze<br>
	<input type="radio" name="spec" value="achizitii"> achizitii<br>
	Numar Telefon Angajat:  <input type="text" name="nr_tel" /><br />
    <input type="submit" name="submit" value="Submit me!" />
</form>


	</body>
	

</center>


</html>