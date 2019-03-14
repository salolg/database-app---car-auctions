<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel sprzedawcy.</title>
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
echo "<p><a href='main.html'>strona główna</a></p>";

$id = $_POST['idw'];
$haslo = $_POST['haslo'];
$nazwisko = $_POST['nazwisko'];




$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
$result = pg_query($db,"SELECT * FROM sprzedawca where sprzedawca_id=$id");



if (pg_num_rows($result)==0) { echo"nie ma Cię w naszej bazie "; }
while($row=pg_fetch_assoc($result)){

if($id==$row["sprzedawca_id"] and $haslo==$row["password"] and $nazwisko==$row["nazwisko"]){



echo "<p><a href='archiwizacja_aukcji.php'>Archiwizuj aukcje.</a></p>";
echo "<p><a href='zarchiwizowane_aukcje.php'>Archiwum aukcji.</a></p>";
echo "<p><a href='dodaj_samochod.html'>Dodaj samochód do ofert.</a></p>";
echo "<p><a href='nowy_sprzedawca.html'>Dodaj nowego sprzedawce.</a></p>";
echo "<p><a href='lista_klientow.php'>Lista klientów.</a></p>";
}
else{
echo"niepoprawne dane";
}
}

?>
</body>
</html>