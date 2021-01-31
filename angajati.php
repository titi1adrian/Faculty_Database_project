<?php 
     //Conectare la baza de date firmaConstructiidb 
$db=mysqli_connect('localhost','root','','firmaConstructiiBD')or die('Error connecting to MySQL server.');

 ?> 
 <html> 
 

<center> 
	<head>
		<style>
			.button {
				box-shadow: 3px 4px 0px 0px #8a2a21;
				background:linear-gradient(to bottom, #cde8f9 5%, #f24437 100%);
				background-color:#cde8f9;
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
	<title>Angajati</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	
	
	<body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>
	
	<body>  
	<div id="bg-test">
	</div>
	<div class='d-flex justify-content-center'>
				<button class="button"> <a href="index.php">Acasa</a></button>
				<button class="button"> <a href="afisare_completa.php">Afisare Completa</a></button>
				<button class="button"> <a href="cautare_dupa_departament.php">Cautare dupa departament</a></button>
				<button class="button"> <a href="cautare_dupa_cnp.php">Cautare dupa CNP</a></button>
				<button class="button"> <a href="adaugare_angajat.php">Adaugare</a></button>
				<button class="button"> <a href="stergere_dupa_cnp.php">STERGERE dupa CNP</a></button>
				<button class="button"> <a href="modificare_dupa_cnp.php">Modificare dupa CNP</a></button>
	
				</div>
			</div>
		</div>
</body>  
</center>


</html>