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


    
    $id = $_GET['id'];

    $db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
    $result = pg_query($db,"SELECT * FROM kupujacy where Kupujacy_id=$id");
    $row = pg_fetch_assoc($result);

    echo "<div class='container'>";
    echo "<form name='update' action='aktualizuj.php' method='POST'";
    echo " <li><input type='hidden' id='id' name='id' value='$id' /></li>";
    echo "<div class='form-group'>";
    echo " Imie:";
    echo " <input type='text' class='form-control' name='imie' value='$row[imie]' />";
    echo("</div>");
    echo "<div class='form-group'>";
    echo " Nazwisko:";
    echo " <input type='text' class='form-control' name='nazwisko' value='$row[nazwisko]' />";
    echo("</div>");
    echo "<div class='form-group'>";

    echo " Ulica:";
    echo " <input type='text' class='form-control' name='ulica' value='$row[ulica]' />";

    echo("</div>");
    echo "<div class='form-group'>";
    echo " Miejscowość:";
    echo " <input type='text' class='form-control' name='miejscowosc' value='$row[miejscowosc]' />";

    echo("</div>");
    echo "<div class='form-group'>";
    echo " Numer domu:";
    echo " <input type='text' class='form-control' name='numer_domu' value='$row[numer_domu]' />";

    echo("</div>");
    echo "<div class='form-group'>";
    echo " Numer mieszkania:";
    echo " <input type='text' class='form-control' name='numer_mieszkania' value='$row[numer_mieszkania]' />";
    echo("</div>");
    echo "<div class='form-group'>";
    echo " Kod pocztowy:";
    echo " <input type='text' class='form-control' name='kod_pocztowy' value='$row[kod_pocztowy]' />";
    echo("</div>");
    echo "<div class='form-group'>";  

    echo " Numer telefonu:";
    echo " <input type='text' class='form-control' name='numer_telefonu' value='$row[numer_telefonu]' />";
    echo("</div>");
    echo "<div class='form-group'>";

    echo " Adres email:";
    echo " <input type='text' class='form-control' name='adres_email' value='$row[adres_email]' />";
    echo("</div>");
    echo "<div class='form-group'>"; 

    echo " Pesel:";
    echo " <input type='text' class='form-control' name='pesel' value='$row[pesel]' />";
    echo("</div>");
    echo "<div class='form-group'>"; 

    echo " Nip:";
    echo " <input type='text' class='form-control' name='nip' value='$row[nip]' />";
    echo("</div>");
    echo "<div class='form-group'>";

    echo " Numer konta:";
    echo " <input type='text' class='form-control' name='numer_konta' value='$row[numer_konta]' />";
    echo("</div>");

    echo("<button type='submit' class='btn btn-default'>Submit</button>");
    echo("</form>");
    echo("</div>");



  
?>

</body>
</html>
