<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>archiwum aukcji</title>
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
	<a href="main.html" class="btn btn-primary" role="button" aria-pressed="true">strona główna</a><br>
		 <div class="page-header clearfix">
           <h2 class="pull-left">Archiwum Twoich aukcji</h2>
                        
      </div>
<?php
	$id = $_GET['id'];


	                echo "<table class='table table-bordered table-striped'>";
					echo "<thead>";
                    echo "<tr>";
                  
					echo "<th >ID wygranego</th>";
					echo "<th >cena końcowa</th>";
					echo "<th >data zakonczenia</th>";                  
					echo "<th >numer oferty</th>";					
					echo "<th>szczegóły</th>";
					
				 	echo "</tr>";
			        echo "</thead>";
			        echo "<tbody>";
				
					$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
								$result = pg_query($db,"SELECT  l.kupujacy_id, l.obecna_cena, o.data_zakonczenia, o.oferta_sprzedazy_id from licytacja l
									join oferta_sprzedazy o  on(l.oferta_sprzedazy_id=o.oferta_sprzedazy_id)
									where kupujacy_id=$id and o.dostepnosc =0
					;");

					while($row=pg_fetch_assoc($result)){

		
				
					echo "<tr>";
					echo "<td >" . $row["kupujacy_id"] . "</td>";
					echo "<td >" . $row["obecna_cena"] . "</td>";
					echo "<td >" . $row["data_zakonczenia"] . "</td>";
					echo "<td >" . $row["oferta_sprzedazy_id"] . "</td>";
					
					echo "<td>";
	                echo "<a href='szczegoly.php?id=". $row['oferta_sprzedazy_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
	            	echo "</td>";
					echo "</tr>";


				}


?>
   </body>
</html>
