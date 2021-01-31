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
	<title>Afisare Completa Clienti</title>
	</head>
	
	
	<body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>
	<body>
		<div class='d-flex justify-content-center'>
				<button class="button"> <a href="index.php">Acasa</a></button>
				<br>
				</div>
				
				<br><br><br><br><br>
<table border='4'>
 <thead>
 <tr>
	<tr>
	
		<th>Nume Client</th>
		<th>Adresa Client</th>
		<th>Tip Client</th>
		<th>Telefon Client</th>
		<th>Adresa Proiect</th>
		<th>Descriere Proiect</th>
		<th>Data Finalizare</th>

</div>
</tr>
</tr>
</thead>
 <tbody>



	<?php
		//afisare completa   	echo  $row['numeAngajat']. '\t|\t' .$row['CNP'].'<br/>';
        $query = "SELECT tblClienti.numeClient, tblClienti.adresaClient, tblClienti.tipClient, tblClienti.telefonClient, tblProiecte.adresaProiect, tblProiecte.descriereProiect, tblProiecte.dataFinalizare  FROM tblClienti,tblProiecte WHERE idClient=codClient ORDER BY tblClienti.numeClient ";
		$result= mysqli_query($db,$query) or die('Error querying for whole tblAngajati');
		while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['numeClient'] . "</td>";
			echo"<td>" . $row['adresaClient'] . "</td>";
			echo"<td>" . $row['tipClient'] . "</td>";
			echo"<td>" . $row['telefonClient'] . "</td>";
			echo"<td>" . $row['adresaProiect'] . "</td>";
			echo"<td>" . $row['descriereProiect'] . "</td>";
			echo"<td>" . $row['dataFinalizare'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</tr>\n";
		mysqli_close($db);
			
		?>
	</body>
	

</center>


</html>