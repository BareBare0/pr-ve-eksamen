<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="title" >Ticket System</h1>

<div class="login-container">


<form method="post" autocomplete="off">
<label for="Epost">Epost:</label>
<input class="input-field" type="text" name="Epost"><br>

<label for="Tittel">Tittel:</label>
<input class="input-field" type="text" name="Tittel"> <br>

<label for="Henvedelse">Henvedelse:</label>
<input class="inputH" type="text" name="HenvedelseInput"> <br>

<input type="submit" class="submit" value="Submit" name="submit">
</form>

</div>

<?php
// Koden inne i denne blokken vil kjøre hvis skjemaet ble sendt (submit) via POST.
// Du kan her håndtere skjemadata, validere det, lagre ydet i en database, osv.
if(isset($_POST['submit'])){
//dette gjør om data som er skrevet inn i tekstfeltene til variabler
$Tittel = $_POST['Tittel'];
$Epost = $_POST['Epost'];
$Henvedelse = $_POST['HenvedelseInput'];
//denne linjen med kode lager en variabel og connecter den
//til databasen
$database = mysqli_connect('localhost', 'root', 'Admin', 'henvedelse')
or die('Error connecting to MySQL server.');
$query = "INSERT INTO HenvedelseP (Tittel, HenvedelseInput, Epost) VALUES ('$Henvedelse', '$Tittel', '$Epost')";
$result = mysqli_query($database, $query)
or die('error querying database');
if ($result) {
// Check if any rows were affected by the INSERT query
if (mysqli_affected_rows($database) > 0) {
// User created
echo "<div class='sign-message'>Henvedelse ble sendt in!</div>";
} else {
// No rows were affected, which means the user wasn't created
echo "kunne ikke sende in Henvendelse. prøv igjen.";
}
} else {
// Query execution failed
echo "noe gikk galt. prøv igjen.";
}
mysqli_close($database);
}
?>

</body>
</html>



