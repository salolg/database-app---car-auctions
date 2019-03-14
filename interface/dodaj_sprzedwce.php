<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <title>nowy sprzedawca</title>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
	<a href="main.html" class="btn btn-primary" role="button" aria-pressed="true">strona główna</a><br><br>
<?php
		
	$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");

	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$ulica = $_POST['ulica'];
	$miejsc = $_POST['miejscowosc'];
	$nrdom = $_POST['numer_domu'];
	$nrmiesz = $_POST['numer_mieszkania'];
	$kod = $_POST['kod_pocztowy'];
	$nrtel = $_POST['numer_telefonu'];
	$email = $_POST['email'];
	$pesel = $_POST['PESEL'];
	$nip = $_POST['NIP'];
	$nrkonta=$_POST['numer_konta'];
	$haslo=$_POST['haslo'];
   

    $queryy = "INSERT into sprzedawca(imie,nazwisko,ulica,miejscowosc,numer_domu ,numer_mieszkania ,kod_pocztowy ,numer_telefonu,adres_email,pesel,nip,numer_konta, password)VALUES ('$imie','$nazwisko','$ulica','$miejsc','$nrdom','$nrmiesz','$kod','$nrtel','$email','$pesel','$nip', '$nrkonta', '$haslo');";
		$result = pg_query($queryy); 

	if (!$result){
	    echo "Wystąpił błąd podczas dodawania nowego sprzedawcy.";
	    }
	else
	    {
	    echo "Dodano pomyślnie nowego sprzedawcę.";
	    } 

?>
  </body>
</html>


