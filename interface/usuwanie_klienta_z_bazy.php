<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
<?php
	$id = $_GET['id'];


	$db = pg_connect("host=localhost port=5432 dbname=u6salagacka  user=u6salagacka  password=6salagacka");

	$ret = pg_query($db, "DELETE from kupujacy where kupujacy_id=$id;");
	if(!$ret) {
	  // echo pg_last_error($db);
		echo "<h1>Coś poszło nie tak, będziesz musiał  z nami jeszcze zostać. Prawdopodobnie masz niezakończone tranzakcje w naszym sklepie. Zgłoś się do naszego sprzedawcy.\n</h1>";
	  exit;
	} else {
	  echo "Żegnaj!\n";
	}
?>
  </body>
</html>




