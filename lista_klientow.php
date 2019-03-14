<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista klientów.</title>
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
echo "<p><a href='main.html'>strona główna</a></p><br>";

echo("<table class='table table-bordered table-striped'>");
echo("<thead>");
echo("<tr>");
echo("<th >");
echo("ID");
echo("</th>");
echo("<th >");
echo("Imię");
echo("</th>");
echo("<th >");
echo("Nazwisko");
echo("</th>");
echo("<th >");
echo("Ulica");
echo("</th>");
echo("<th >");
echo("Numer domu");
echo("</th>");
echo("<th >");
echo("Numer mieszkania");
echo("</th>");
echo("<th >");
echo("Miejscowość");
echo("</th>");
echo("<th >");
echo("Kod pocztowy");
echo("</th>");
echo("<th >");
echo("Numer telefonu");
echo("</th>");
echo("<th >");
echo("Adres email");
echo("</th>");
echo("<th >");
echo("Pesel");
echo("</th>");
echo("<th >");
echo("NIP");
echo("</th>");
echo("<th >");
echo("numer konta");
echo("</th>");
echo("</tr>");
echo("</thead>");



$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
$result = pg_query($db,"SELECT * FROM kupujacy order by nazwisko;");
$result2 = pg_query($db,"select count(*) from kupujacy;");
while($row=pg_fetch_assoc($result2)){
    echo "Liczba wszystkich klientów:";
    echo($row["count"]);
}


echo("<tbody>");
while($row=pg_fetch_assoc($result)){




echo("<tr>");
echo("<td>");
echo($row["kupujacy_id"]);
echo("</td>");
echo("<td>");
echo($row["imie"]);
echo("</td>");
echo("<td>");
echo($row["nazwisko"]);
echo("</td>");
echo("<td>");
echo($row["ulica"]);
echo("</td>");
echo("<td>");
echo($row["numer_domu"]);
echo("</td>");
echo("<td>");
echo($row["numer_mieszkania"]);
echo("</td>");
echo("<td>");
echo($row["miejscowosc"]);
echo("</td>");
echo("<td>");
echo($row["kod_pocztowy"]);
echo("</td>");
echo("<td>");
echo($row["numer_telefonu"]);
echo("</td>");
echo("<td>");
echo($row["adres_email"]);
echo("</td>");
echo("<td>");
echo($row["pesel"]);
echo("</td>");
echo("<td>");
echo($row["nip"]);
echo("</td>");
echo("<td>");
echo($row["numer_konta"]);
echo("</td>");
echo("</tr>");


}
echo("</tbody>");
echo("</table>");
?>

</html>