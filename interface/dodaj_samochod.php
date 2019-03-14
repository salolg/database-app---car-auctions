<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>dodaj nowy samochód.</title>
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

$id_modelu = $_POST['id_modelu'];
$wersja = $_POST['wersja'];
$rok_produkcji = $_POST['rok_produkcji'];
$przebieg =$_POST['przebieg'];
$id_typ_sil=$_POST['id_typ_sil'];
$pojemnosc_silnika=$_POST['pojemnosc_silnika'];
$skrzynia=$_POST['skrzynia'];
$moc=$_POST['moc'];
$bezwypadkowy=$_POST['bezwypadkowy'];
$kolor=$_POST['kolor'];
$cena=$_POST['cena'];
$data=$_POST['data'];
$idsprzed=$_POST['idsprzed'];

$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");

    $queryy = "INSERT into samochod(id_model_samochodu, wersja, rok_produkcji, przebieg, id_typ_silnika, pojemnosc_silnika, skrzynia_biegow, moc, bezwypadkowy, id_kolor, dostepnosc)VALUES ($id_modelu,'$wersja',$rok_produkcji,$przebieg,$id_typ_sil,$pojemnosc_silnika,'$skrzynia',$moc,'$bezwypadkowy',$kolor,1);";
        
   $result = pg_query($queryy); 
    
    $result1 = pg_query($db,"SELECT * FROM samochod                     
                where
                id_model_samochodu =$id_modelu AND
                wersja='$wersja' AND
                rok_produkcji=$rok_produkcji AND
                przebieg=$przebieg AND
                id_typ_silnika=$id_typ_sil AND
                pojemnosc_silnika =$pojemnosc_silnika AND
                skrzynia_biegow ='$skrzynia' AND
                moc = $moc AND
                bezwypadkowy = '$bezwypadkowy' AND
                id_kolor = $kolor
                ;");

    echo "<table>";
    global $a;
    while($row=pg_fetch_assoc($result1)){
        $a= $row["samochod_id"];
        }
   




 $query = "INSERT into oferta_sprzedazy(oferta_sprzedazy_id, cena_wywolawcza, data_dodania, data_zakonczenia, id_samochod, id_sprzedawcy, dostepnosc
)VALUES ('$a','$cena',CURRENT_DATE,'$data',$a,$idsprzed,1);";
 $result2 = pg_query($query); 
if (!$result2){
        echo "Wystąpił błąd podczas dodawania nowej oferty.";

        }
    else
        {
        echo "Dodano pomyślnie nową ofertę.";
        } 


?>
</body>
</html>

