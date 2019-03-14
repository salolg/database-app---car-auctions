<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <title>licytacja</title>
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
<a href="main.html" class="btn btn-primary" role="button" aria-pressed="true">strona główna</a>
<a href="lista_samochodow.php" class="btn btn-primary" role="button" aria-pressed="true">wszystkie dostepne samochody</a>
<?php
		$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
		$oferta_id=$_POST['id'];
		$cena = $_POST['cena'];
		$idklienta = $_POST['idklienta'];
		$imieklienta = $_POST['imieklienta'];
		$nazwiskoklienta = $_POST['nazwiskoklienta'];
		$data = $_POST['data_zakonczenia'];


	$result = pg_query($db,"SELECT * FROM kupujacy where kupujacy_id=$idklienta");
echo "<a href='read.php?id=". $oferta_id ."' class='btn btn-primary' role='button' aria-pressed='true'>powrót do oferty</a><br><br>";
//echo "<a href='read.php?id=". $oferta_id ."' >Powrót do oferty.</a>";

	if (pg_num_rows($result)==0) { echo"nie ma Cię w naszej bazie "; }
	while($row=pg_fetch_assoc($result)){

	if($id==$row["idklienta"] and $imie==$row["imieklienta"] and $nazwisko==$row["nazwiskoklienta"]){

		$result2 = pg_query($db,"SELECT current_date");
		while($row=pg_fetch_assoc($result2)){
	   
		     if($row["date"]>$data){
			    echo("Przepraszamy, aukcja została zakończona, nie ma możliwości licytacji.");
			    exit;
		     
		     }
		     
		}

		
		
			
						$resultt = pg_query($db, "update licytacja set kupujacy_id=$idklienta, obecna_cena='$cena' where oferta_sprzedazy_id=$oferta_id
					;"
					);
						if(!$resultt){
							  
							 $error = pg_last_error($db);
							
							 if (preg_match('/sprawdzanie_ceny_fun()/i', $error))
							  {
							    echo "Podaj cenę wyższa od obecnej, aby podbić aukcję.";

							  }
							  

							  else
							  {
							    echo("Nie udało się podbić aukcji.");
							  }

	  							exit;
						}
					if (pg_affected_rows($resultt)==0){
				    echo "Cena musi być wyższa od aktualnej.";
				    }
				else
				    {
				    echo "Pomyślnie udało Ci się podbić aukcję.";
				    } 
			//}
				    


	}
	else{
	echo"Niepoprawne dane.";

	}

	}
	

?>
</body>
</html>
