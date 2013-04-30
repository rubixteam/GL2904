<?php
//Declaration des parametres
	$serveur = "localhost" ;
	$utilisateur = "root";
	$pwd = "root";
	$bd = "website2";
	
	//connexion au serveur BD
	$mysqli = new mysqli($serveur, $utilisateur, $pwd, $bd);
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}



//jquery
$verifParam = $_GET['verif'];



	if($verifParam == "true") {//verfification
	$loginParam = $_GET['login'];
	
	//definition des requetes mysql pour afficher la liste des responsables
$query = "select* from produit where titreproduit='$loginParam'";
//execution de requete
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='utf-8'?>\n";
echo "<logins>\n";
// récup des données
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<login>\n";
echo stripslashes($row['titreproduit']);	
echo "</login>\n";
}
echo "</logins>\n";
}
}


else
//Insertion
{
	$loginParam = $_GET['login'];
	//$pwdParam = $_GET['pwd'];
	$pwdParam =$_GET['pwd'];
	$versionParam=$_GET['ver'];
	$etatParam=$_GET['et'];
	$query= "insert into produit (titreproduit,clientproduit,versionproduit,etatproduit) VALUES ('$loginParam','$pwdParam','$versionParam','$etatParam')";
    //Execution
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='utf-8'?>\n";
	echo "<message>Produit ajouté avec succés</message>";
}
	


?>