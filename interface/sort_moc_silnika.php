<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <title>dostepne samochody</title>
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
<a href="main.html" class="btn btn-primary" role="button" aria-pressed="true" >strona główna</a>
<a href="sort_rok_produkcji.php" class="btn btn-primary" role="button" aria-pressed="true">Posortuj po roku produkcji</a>
<a href="sort_przebieg.php" class="btn btn-primary" role="button" aria-pressed="true">Posortuj po przebiegu</a>
<a href="sort_pojemnosc_silnika.php" class="btn btn-primary" role="button" aria-pressed="true">Posortuj po pojemności silnika</a>
<a href="sort_moc_silnika.php" class="btn btn-primary" role="button" aria-pressed="true">Posortuj po mocy silnika</a>

    <div >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Dostępne samochody</h2>
                        
                    </div>
                    <?php
                    echo "<table class='table table-bordered table-striped'>";
					echo "<thead>";
                    echo "<tr>";
                  
					echo "<th >Numer oferty</th>";
					echo "<th >Marka samochodu</th>";
					echo "<th >Model samochodu</th>";
					echo "<th >Wersja</th>";
					echo "<th >Rok produkcji</th>";
					echo "<th >Przebieg</th>";
					echo "<th >Typ silnika</th>";
					echo "<th >Pojemność silnika</th>";
					echo "<th >Skrzynia biegów</th>";
					echo "<th >Moc</th>";
					echo "<th >Bezwypadkowy</th>";
					echo "<th >Kolor</th>";
					echo "<th>Szczegóły</th>";
					
				 	echo "</tr>";
			        echo "</thead>";
			        echo "<tbody>";
				
					$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
								$result = pg_query($db,"SELECT  p.samochod_id , m.marka_samochodu,c.model, p.wersja,p.rok_produkcji,p.przebieg,t.typ_silnika_w_samochodzie ,p.pojemnosc_silnika ,p.skrzynia_biegow ,p.moc,p.bezwypadkowy ,k.kolor  
					FROM samochod p 
					left outer join model_samochodu c on (p.id_model_samochodu=c.model_samochodu_id)
					inner join marka m on (m.marka_id=c.id_marka)
					inner join kolor k on (p.id_kolor=k.kolor_id)
					inner join typ_silnika t on (p.id_typ_silnika=t.typ_silnika_id) where p.dostepnosc=1
					order by p.moc;");
				
					while($row=pg_fetch_assoc($result)){

					echo "<tr>";
					echo "<td >" . $row["samochod_id"] . "</td>";
					echo "<td >" . $row["marka_samochodu"] . "</td>";
					echo "<td >" . $row["model"] . "</td>";
					echo "<td >" . $row["wersja"] . "</td>";
					echo "<td >" . $row["rok_produkcji"] . "</td>";
					echo "<td >" . $row["przebieg"] . "</td>";
					echo "<td >" . $row["typ_silnika_w_samochodzie"] . "</td>";
					echo "<td >" . $row["pojemnosc_silnika"] . "</td>";
					echo "<td >" . $row["skrzynia_biegow"] . "</td>";
					echo "<td >" . $row["moc"] . "</td>";
					echo "<td >" . $row["bezwypadkowy"] . "</td>";
					echo "<td >" . $row["kolor"] . "</td>";
					echo "<td>";
	                echo "<a href='read.php?id=". $row['samochod_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
	            	echo "</td>";
					echo "</tr>";


				}
				?> 


					</thead>
                </div>
            </div>        
        </div>
    </div>

</html>




