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
	<title>Afisare Proiecte in fiecare an</title>
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
	
		<th> AN </th>
		<th>Numar Proiecte</th>

</div>
</tr>
</tr>
</thead>
 <tbody>


	<?php
		//afisare completa   	echo  $row['numeAngajat']. '\t|\t' .$row['CNP'].'<br/>';
        $query = " SELECT YEAR(dataIncepere) AS An_Incepere,COUNT(*) AS numarProiecte FROM tblProiecte GROUP BY YEAR(dataIncepere)";
		$result= mysqli_query($db,$query) or die('Error querying for whole tblAngajati');
		while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['An_Incepere'] . "</td>";
			echo"<td>" . $row['numarProiecte'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</tr>\n";
		mysqli_close($db);
			
		?>
	</body>
	

</center>


</html>