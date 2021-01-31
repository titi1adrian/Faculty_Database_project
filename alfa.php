<?php

//Step1
$conn = mysqli_connect('localhost','root','','firmaConstuctiiBD')
 or die('Error connecting to MySQL server.');
 
	$result = mysqli_query($conn,"SELECT * FROM tblAngajati");


echo "\n";
echo "<html>\n";
echo "<head>\n";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "<style>\n";
echo ".button {\n";
echo "  background-color: ##032E7F;\n";
echo "  border: none;\n";
echo "  color: white;\n";
echo "  padding: 10px 12px;\n";
echo "  text-align: center;\n";
echo "  font-size: 16px;\n";
echo "  margin: 4px 2px;\n";
echo "  opacity: 0.6;\n";
echo "  transition: 0.3s;\n";
echo "  display: inline-block;\n";
echo "  text-decoration: none;\n";
echo "  cursor: pointer;\n";
echo "}\n";
echo "\n";
echo ".button:hover {opacity: 1}\n";
echo "</style>\n";
echo "</head>\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <title>Firma Constructii</title>\n";
echo "    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">\n";
echo "  </head>\n";
echo " <body style='font-family: Arial; background-color: #cde8f9; font-size: 14px;'>\n";
echo " <body>\n";
echo " <div class='d-flex justify-content-start'>\n";
echo "            <img src='logo.jpg' width=\"2000\" height=\"500\">	\n";
echo "			</div>\n";
echo "					\n";

echo "       	<div Meniu Site </div>\n";
echo "					<div class='d-flex justify-content-center'>\n";
echo "    	<button class=\"button\"><div class=\"link\"><a href=\"index.php\">Înapoi la Pagina Principală</a></div></button>	\n";
echo "				<button class=\"button\"><div class='px-5'><a href=\"proiecte.php\">Proiecte</a></button>\n";
echo "				<button class=\"button\"><div class='px-5'><a href=\"client.php\">Clienti</a></button>\n";
echo "						<button class=\"button\"><div class='px-5'><a href=\"materiale.php\">Materiale</a></button>\n";
echo "					<button class=\"button\"><div class='px-5'><a href=\"optiuni.php\">Optiuni</a></button>\n";
echo "					<button class=\"button\"><div class='px-5'><a href=\"cautari.php\">Cauta</a></button>\n";
echo "			</div>\n";
echo "\n";
if (!$result) {
    printf("Error: %sn", mysqli_error($conn));
    exit();
}
echo " <div class='d-flex justify-content-center'>\n";
echo "	  <h1> Angajati </h1>";
echo "					</div>\n";
echo " <div class='d-flex justify-content-center'>\n";
echo "<style> \n";
echo "        table.scrolldown { \n";
echo "            width: 100%; \n";
echo "              \n";
echo "            /* border-collapse: collapse; */ \n";
echo "            border-spacing: 0; \n";
echo "            border: 2px solid black; \n";
echo "        } \n";
echo "          \n";
echo "        /* To display the block as level element */ \n";
echo "        table.scrolldown tbody, table.scrolldown thead { \n";
echo "            display: block; \n";
echo "        }  \n";
echo "          \n";
echo "        thead tr th { \n";
echo "            height: 40px;  \n";
echo "            line-height: 40px; \n";
echo "        } \n";
echo "          \n";
echo "        table.scrolldown tbody { \n";
echo "              \n";
echo "            /* Set the height of table body */ \n";
echo "            height: 50px;  \n";
echo "              \n";
echo "            /* Set vertical scroll */ \n";
echo "            overflow-y: auto; \n";
echo "              \n";
echo "            /* Hide the horizontal scroll */ \n";
echo "            overflow-x: hidden;  \n";
echo "        } \n";
echo "          \n";
echo "        tbody {  \n";
echo "            border-top: 2px solid black; \n";
echo "        } \n";
echo "          \n";
echo "        tbody td, thead th { \n";
echo "            width : 200px; \n";
echo "            border-right: 2px solid black; \n";
echo "        } \n";
echo "        td { \n";
echo "            text-align:center; \n";
echo "        } \n";
echo "    </style> ";

echo "<table border='4'> ";

echo "  <thead>\n";
echo "    <tr>\n";
echo "<tr>\n";
echo " <div class='d-flex justify-content-center'>\n";
echo "<th>Nume angajat</th>\n";
echo "<th>CNP</th>\n";
echo "<th>Departament</th>\n";
echo "<th>Salariu</th>\n";
echo "<th>Specializare</th>\n";
echo "<th>Telefon angajat</th>\n";
echo "</div>";
echo "    </tr>\n";
echo "  </thead>\n";
echo "  <tbody>";




		while($row = mysqli_fetch_array($result))
	{
		
echo "<tr>";
echo "<td>" . $row['numeAngajat'] . "</td>";
echo"<td>" . $row['CNP'] . "</td>";
echo"<td>" . $row['departament'] . "</td>";
echo"<td>" . $row['salariuAngajat'] . "</td>";
echo"<td>" . $row['specializare'] . "</td>";
echo"<td>" . $row['telefonAngajat'] . "</td>";
echo"</tr>";
}

echo "</table>";
echo "</tr>\n";
mysqli_close($conn);
	echo "					</div>\n";
	
  ?>  
</div>
</body>
</html>
