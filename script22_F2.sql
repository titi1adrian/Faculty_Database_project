#source E:/Descarcari/script22_F2.sql;  
/*          Folositi pentru cale simbolul "/", NU "\"         */ 


/*#############################################################*/
/*        PARTEA 1 - STERGEREA SI RECREAREA BAZEI DE DATE      */

DROP DATABASE firmaConstuctiiBD;

CREATE DATABASE firmaConstuctiiBD;

USE firmaConstuctiiBD;

/*#############################################################*/




/*#############################################################*/
/*                  PARTEA 2 - CREAREA TABELELOR              */


CREATE TABLE tblAngajati(
	idAngajat INT(3) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
	numeAngajat VARCHAR(50) NOT NULL,
	CNP CHAR(13) UNIQUE NOT NULL,
	departament ENUM("Tehnic","Proiectare","Achizitii"),
	salariuAngajat INT DEFAULT 2000,
	specializare SET("beton","finisaj","zidarie","proiectare","tamplarie","apa","electricitate","gaze","achizitii"),
	telefonAngajat CHAR(10)

);

CREATE TABLE tblClienti(
	idClient INT(3) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
	numeClient VARCHAR(50) NOT NULL,
	adresaClient VARCHAR(100),
	tipClient ENUM("persoana fizica","persoana juridica"),
	telefonClient CHAR(10)
);


CREATE TABLE tblProiecte(
	idProiect INT(3) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
	adresaProiect VARCHAR(100),
	descriereProiect TEXT,
	costProiect INT NOT NULL,
	codAutorizatie CHAR(30) NOT NULL,
	dataIncepere DATE,
	dataFinalizare DATE,
	codClient INT(3) ZEROFILL,
	CONSTRAINT fk_client FOREIGN KEY(codClient)	
	REFERENCES tblClienti(idClient) ON DELETE CASCADE ON UPDATE CASCADE
	
);


CREATE TABLE tblMateriale(
	idMaterial INT(3) ZEROFILL PRIMARY KEY AUTO_INCREMENT,
	denumireMaterial VARCHAR(50) NOT NULL UNIQUE,
	pretMaterial INT,
	furnizorMaterial VARCHAR(50),
	stocMaterial INT
);

CREATE TABLE tblLucreaza(
	codAngajat INT(3) ZEROFILL ,
	codProiect INT(3) ZEROFILL ,
	numarOre INT(3),
	CONSTRAINT fk_angajat FOREIGN KEY(codAngajat)	
	REFERENCES tblAngajati(idAngajat) ON DELETE CASCADE ON UPDATE CASCADE,
 	
	CONSTRAINT fk_proiect FOREIGN KEY(codProiect)	
	REFERENCES tblProiecte(idProiect) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tblUtilizeaza(
	codProiect INT(3) ZEROFILL,
	codMaterial INT(3) ZEROFILL,
	cantitateMaterial INT,
 	
	CONSTRAINT fk_proiecte FOREIGN KEY(codProiect)	
	REFERENCES tblProiecte(idProiect) ON DELETE CASCADE ON UPDATE CASCADE,

	CONSTRAINT fk_cod FOREIGN KEY(codMaterial)	
	REFERENCES tblMateriale(idMaterial) ON DELETE CASCADE ON UPDATE CASCADE
);	



/*#############################################################*/




/*#############################################################*/
/*         PARTEA 3 - INSERAREA INREGISTRARILOR IN TABELE      */

INSERT INTO tblAngajati (numeAngajat,CNP,departament,salariuAngajat,specializare,telefonAngajat) VALUES
	("Popescu Marcel","1680518450022","Tehnic",2500,"beton","0756369201"),
	("Mirica Dan","1690520420125","Proiectare",3600,"beton","0756245195"),
	("Ionescu Petrica","1751223152145","Achizitii",DEFAULT,"achizitii","0732650259"),
	("Titi Adrian","1980107190236","Proiectare",4500,"finisaj","0751865086"),
	("Stoenescu Ionel","1690523025123","Tehnic",2680,"zidarie","0766895620"),
	("Iordachescu Mihail","1800626169852","Achizitii",DEFAULT,"tamplarie","0796589652"),
	("Petrescu Sorin","1850625402500","Tehnic",4580,"apa","0745265365"),
	("Mazilu Cornel","1890424240056","Proiectare",2650,"electricitate","0725658965"),
	("Popescu Irinel","1750625205802","Achizitii",3564,"gaze","0745025632"),
	("Popescu Oana","2850725410056","Proiectare",6589,"proiectare","0756996352");

INSERT INTO tblClienti (numeClient,adresaClient,tipClient,telefonClient) 
VALUES
	("Teodorescu Gabriel","Strada Lanariei 4, Bucuresti","persoana fizica","0722563689"),
	("Delta Glass","Strada Jilavei 20, Bucuresti","persoana juridica","0745256148"),
	("Papion SRL","Strada Bucuresti 10, Buftea","persoana juridica","0723345815"),
	("The DEM Clothes","Strada Emil Racovita 23, Bucuresti","persoana juridica","0213562562"),
	("Theodor Babos","Strada Drumul Fermei 12, Popesti Leordeni","persoana fizica","0746104627"),
	("Ionut Girla","Strada Matei Basarab 120, Horezu","persoana fizica","0749543056"),
	("Ioana Maiovschi","Strada Gradinarilor 33, Bucuresti","persoana fizica","0732275190"),
	("Ion Popescu","Stada Privighetorilor 10, Otopeni","persoana fizica","0725695852"),
	("SC NAVAM SRL","B-dul Banu Manta 120,Bucuresti","persoana juridica","0318014277"),
	("LUX OFFICE SRL","B-dul Mamamia 10,Constanta","persoana juridica","0756987569");

INSERT INTO tblProiecte(adresaProiect,DescriereProiect,costProiect,codAutorizatie,dataIncepere,dataFinalizare,codClient)
VALUES 
	("Strada Poieni 30","bloc P+3+M, 80mp","350000","152/14 din 03.10.2019","2019.11.01","2021.02.01",001),
	("Bulevardul Berceni 120,Bucuresti","hala depozitare, 300mp","100000","120/10 din 01.05.2018","2018.08.10","2018.12.20",009),
	("Strada Leordeni 12,Popesti Leordeni","casa P+1+M,200mp","560000","10/25 din 15.01.2018","2018.02.25","2020.05.21",007),
	("Strada Merisani 30,Popesti Leordeni","magazie, 30mp","15000","25/26 din 20.02.2019","2019.03.11","2019.04.25",008), 
	("Strada Luptatori 23,Constanta","bloc P+10, 400mp","1500000","12/20 din 20.03.2019","2019.05.20","2021.06.25",010),
	("Strada Crisului 10,Constanta","casa P+1, 100mp","300000","60/150 din 12.05.2018","2018.07.01","2020.02.10",006),
	("Bulevardul Alexandru Lapusneanu 120,Constanta","magazin, 1000mp","500000","41/169 din 12.09.2018","2018.11.01","2020.05.05",004),
	("Strada Belgrade 12,Otopeni","bloc birouri P+4, 200mp","600000","65/190 din 20.06.2019","2019.10.10","2023.06.20",003),
	("Strada Sofia 23,Otopeni","extindere casa P+2, 150mp","90000","56/190 din 20.02.2019","2019.03.15","2019.11.20",008),
	("Strada Pietei 20,Horezu","casa P+2, 250mp","320000","65/120 din 15.06.2019","2019.07.10","2021.05.25",010),
	("Calea Vacaresti 120,Bucuresti","casa P+1, 150mp","160000","25/69 din 20.12.2018","2019.02.01","2020.05.20",007),
	("Bulevardul 1 Mai 112,Bucuresti","magazie ,120mo","15000","74/90 din 15.02.2019","2019.05.20","2019.08.19",008),
	("Calea Serban Voda 10,Bucuresti","casa P, 100mp","60000","36/80 din 15.02.2018","2018.07.01","2019.10.11",006),
	("Bulevardul Aviatorilor 20,Bucuresti","bloc P+15, 250mp","2000000","15/25 din 11.10.2019","2020.04.01","2022.06.01",010),
	("Strada Straja 12,Bucuesti","magazie, 250mp","125000","65/525 din 12.06.2018","2018.08.10","2020.05.01",009);


INSERT INTO tblMateriale
(denumireMaterial,pretMaterial,furnizorMaterial,stocMaterial) 
VALUES
	("nisip",2,"Dedeman",100000),
	("beton",10,"Arcom",1500000),
	("caramida",150,"Dedeman",295200),
	("tevi",20,"Hornbach",456952),
	("conducte",32,"Dedeman",152000),
	("termopan",200,"Qfort",600),
	("cabluri",12,"Dedeman",168000),
	("usi",150,"Usi Expert SRL",250),
	("lavabila",47,"Dedeman",2500),
	("lemn",39,"Hornbach",365000),
	("tabla",25,"Dedeman",25000),
	("fier beton",100,"Hornbach",450000);

INSERT INTO tblLucreaza VALUES
(001,005,4),(001,009,10),(002,005,10),(003,009,12),(003,002,2),(004,006,10),(005,005,10),(006,010,12),(007,002,6),(008,008,10),(009,001,4),(010,003,5);

INSERT INTO tblUtilizeaza VALUES
(001,001,2500),(001,006,6000),(001,008,10),(001,002,5000),(001,012,2000),(001,003,500),(001,009,60),(001,010,30),
(002,001,1300),(002,002,1000),(002,004,600),(002,007,500),(002,008,5),(002,010,500),(002,011,600),(002,012,300),
(003,001,1000),(003,002,350),(003,003,500),(003,004,100),(003,005,70),(003,006,50),(003,008,7),(003,010,30),
(004,002,50),(004,010,100),(004,001,100),(004,011,900),(004,008,2),(004,012,40),
(005,002,15000),(005,008,100),(005,012,15000),(005,008,100),
(006,001,800),(006,002,300),(006,003,200),(006,010,200),
(007,002,1050),(007,011,500),(007,004,60),(007,006,15),
(008,001,20000),(008,010,1000),(008,012,15000),(008,002,10000),
(009,002,1000),(009,003,3000),
(010,010,300),(010,012,100),(010,002,300),
(011,010,500),(011,008,10),(011,006,30),
(012,011,520),(012,004,35),
(013,002,200),(013,003,1000),
(014,002,15000),(014,003,15000),(014,008,100),
(015,011,1500),(015,004,300);


/*#############################################################*/



/*#############################################################*/
/*  PARTEA 4 - VIZUALIZAREA STUCTURII BD SI A INREGISTRARILOR  */
DESCRIBE tblAngajati;
DESCRIBE tblClienti;
DESCRIBE tblProiecte;
DESCRIBE tblMateriale;
DESCRIBE tblLucreaza;
DESCRIBE tblUtilizeaza;

SELECT * FROM tblAngajati;
SELECT * FROM tblClienti;
SELECT * FROM tblProiecte;
SELECT * FROM tblMateriale;
SELECT * FROM tblLucreaza;
SELECT * FROM tblUtilizeaza;

/*#############################################################*/




#######################################################################################################################
#Comentarii FAZA1 - Echipa 22 - Feedback 1

#OK

#Rezolvati comentariile de mai sus si trimiteti-mi o noua versiune. Numele fisierului nu se va schimba.
#Aceasta zona de comentarii nu se va sterge
#######################################################################################################################
#######################################################################################################################
#Exercitii FAZA2 - Echipa 22

#1. Afisati toate informatiile despre angajatii care lucreaza in Proiectare si castiga mai mult de 3000Ron.
	
 SELECT *FROM tblAngajati WHERE departament="Proiectare" AND salariuAngajat>3000;

#2. Afisati numarul de proiecte incepute in fiecare an.
	 SELECT YEAR(dataIncepere) AS An_Incepere,COUNT(*) AS numarProiecte FROM tblProiecte GROUP BY YEAR(dataIncepere);

#3. Pentru fiecare proiect afisati adresaProiect-ului, numele clientului si numarul de telefon.
	SELECT adresaProiect,numeClient,telefonClient FROM tblProiecte,tblClienti WHERE codClient=idClient;

#4. Stabiliti suma totala castigata de fiecare furnizor in urma distribuirii materialelor existente in stoc.
	SELECT furnizorMaterial,SUM(pretMaterial*stocMaterial) sumaCastigata FROM tblMateriale GROUP BY furnizorMaterial;

#5. Afisati toate informatiile despre proiecte + suma totala cheltuita pe materiale in cadrul fiecarui proiect

	SELECT tblProiecte.idProiect,tblProiecte.adresaProiect,tblProiecte.descriereProiect,tblProiecte.costProiect,tblProiecte.codAutorizatie,tblProiecte.dataIncepere,tblProiecte.dataFinalizare,tblProiecte.codClient, SUM(tblMateriale.pretMaterial*tblUtilizeaza.cantitateMaterial)  AS costMaterial 
	FROM tblMateriale,tblUtilizeaza,tblProiecte
	WHERE tblProiecte.idProiect = tblUtilizeaza.codProiect  AND codMaterial=idMaterial GROUP BY codProiect;

	
		
		
		

#6. Considerand valoarea atributului stocMaterial ca fiind stocul existent inainte de inceperea tuturor proiectelor, calculati stocul care ar ramane disponibil dupa finalizarea acestor proiecte (presupunem ca nu se realizeaza alte achizitii intre timp).
	SELECT denumireMaterial,stocMaterial,SUM(tblUtilizeaza.cantitateMaterial)AS MaterialFolosit,(stocMaterial-SUM(tblUtilizeaza.cantitateMaterial)) AS StocRamas FROM tblMateriale,tblUtilizeaza WHERE codMaterial=idMaterial GROUP BY idMaterial;
#7. Pentru fiecare angajat calculati suma de bani pe care o va castiga daca duce la bun sfarsit toate proiectele in care este implicat.(Presupunem -> Bani castigati pe zi = salariuAngajat/30).

	SELECT idAngajat,numeAngajat,SUM(DATEDIFF(tblProiecte.dataFinalizare,tblProiecte.dataIncepere)) AS zile,(salariuAngajat/30) AS Salariu,(salariuAngajat/30)* SUM(DATEDIFF(tblProiecte.dataFinalizare,tblProiecte.dataIncepere)) as Castig_Angajat FROM tblAngajati,tblProiecte,tblLucreaza WHERE tblAngajati.idAngajat=tblLucreaza.codAngajat AND tblLucreaza.codProiect=tblProiecte.idProiect GROUP BY idAngajat;

#NU SE VA MODIFICA NIMIC DIN CEEA CE SCRIE DEJA IN ACEST DOCUMENT!!!
#Dupa fiecare enunt se va scrie interogarea (UNA SINGURA) care sa raspunda la exercitiu.
#Se vor scrie interogarile doar acolo unde acestea raspund corect la problema din enunt. 
#Nu scrieti "INCERCARI" de rezolvare! Acestea vor fi punctate cu minus un punct (Puteti verifica vizual daca rezultatele interogarii sunt corecte).
#Nu folositi decat informatiile din enunt!  
#######################################################################################################################

