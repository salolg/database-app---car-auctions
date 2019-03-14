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
<?php
echo "<p><a href='main.html'>strona główna</a></p>";

                   $id = $_GET['id'];

$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");

    $result = pg_query($db, "update samochod set dostepnosc=1 where samochod_id=$id;");
    $result2 = pg_query($db, "update oferta_sprzedazy set dostepnosc=1 where oferta_sprzedazy_id=$id;");

    if (!$result){
        echo "Wystąpił błąd podczas aktualizacji danych.";
        }
    else
        {
        echo "Wprowadzono pomyślnie modyfikacje.";
        } 

        if (!$result2){
        echo "Wystąpił błąd podczas aktualizacji danych.";
        }
    else
        {
        echo "Wprowadzono pomyślnie modyfikacje.";
        } 

?>

</html>
