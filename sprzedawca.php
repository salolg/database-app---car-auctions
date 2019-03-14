<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <title>dane sprzedawcy</title>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<a href="main.html" class="btn btn-primary" role="button" aria-pressed="true">strona główna</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Dane sprzedawcy</h2>
                        
                    </div>
                    <?php
                    $id = $_GET['id'];
                    echo "<table class='table table-bordered table-striped'>";
					echo "<thead>";
                    echo "<tr>";          
					echo "<th >Imie</th>";
					echo "<th >Nazwisko</th>";
					echo "<th >Numer telefonu</th>";
					echo "<th >Adres email</th>";					
				 	echo "</tr>";
			        echo "</thead>";
			        echo "<tbody>";
				
					$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");
								$result = pg_query($db,"SELECT  * from sprzedawca where sprzedawca_id =$id;");
				
					while($row=pg_fetch_assoc($result)){

					echo "<tr>";
					echo "<td >" . $row["imie"] . "</td>";
					echo "<td >" . $row["nazwisko"] . "</td>";
					echo "<td >" . $row["numer_telefonu"] . "</td>";
					echo "<td >" . $row["adres_email"] . "</td>";
					echo "</tr>";


					}
					?> 


					</thead>
                </div>
            </div>        
        </div>
    </div>
  </body>
</html>




