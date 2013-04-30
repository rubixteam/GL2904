
<?php include_once("config.php"); ?> 
<?php if( !(isset( $_POST['submit'] ) ) ) { ?> 
<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
	<title>Authentification</title>
	<link href="style.css" rel="stylesheet" type="text/css"  />

</header> 

<body>
  
  <div id="container" >
  <h1>Authentification</h1>
<form method="post" action="">
	<fieldset>
		<label>Identifiant:</label>
			<input type="text" name="username"  />
		<label>Mot de Passe:</label>
			<input type="password" name="password"  />
			<input type="submit" value="Authentification" name="submit" class="submit" />
			<p><a href="changermpass.php"><span id="register">Changer le mot de passe?</span></a></p> 
<fieldset>
</form>	
</div>
</body>
</html>

 <?php //else look at the database and see if he entered the correct details
 } else { 
 $usr = new Users; 
 $usr->storeFormValues( $_POST ); 
 //if our function userLogin() returns true then the user is valid, display welcome else say it's incorrect. 
 if( $usr->userLogin() ) {
 echo "Welcome"; 
 } else { 
 echo "Incorrect Username/Password"; 
 } 
 } 
 ?>