<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <title>aktualizacja danych</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php
	echo"<a href='main.html' >strona główna</a><br><br>";
	    $db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
	$id = $_POST['id'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$ulica = $_POST['ulica'];
	$miejsc = $_POST['miejscowosc'];
	$nrdom = $_POST['numer_domu'];
	$nrmiesz = $_POST['numer_mieszkania'];
	$kod = $_POST['kod_pocztowy'];
	$nrtel = $_POST['numer_telefonu'];
	$email = $_POST['adres_email'];
	$pesel = $_POST['pesel'];
	$nip = $_POST['nip'];
	$nrkonta=$_POST['konto'];



	$result = pg_query($db, "update kupujacy set imie='$imie', nazwisko='$nazwisko' ,
		ulica='$ulica' ,
		miejscowosc='$miejsc' ,
		numer_domu='$nrdom' ,
		numer_mieszkania='$nrmiesz' ,
		kod_pocztowy='$kod',
		numer_telefonu ='$nrtel' ,
		adres_email='$email',
		pesel='$pesel',
		nip='$nip',
		numer_konta='$nrkonta' where kupujacy_id=$id;"
		);
	if (!$result){
	    echo "Wystąpił błąd podczas aktualizacji danych.";
	    }
	else
	    {
	    echo "Zaktualizowano pomyślnie dane.";
	    } 


	?>
</body>
</html>
