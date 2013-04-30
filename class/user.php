

<?php 

//classe utilisateur
class Users { 

	public $username = null;
	public $password = null;

	
	
	
	
	public function __construct( $data = array() ) {
		if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) ); 
			if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) ); 
			
} 



public function storeFormValues( $params ) {
	//store the parameters
		$this->__construct( $params );
		}
		

		public function userLogin() {
		
			//success variable will be used to return if the login was successful or not. 
			$success = false; 
				try{ 
				//create our pdo object
				$con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
				//set how pdo will handle errors
					$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					//this would be our query.
					$sql = "SELECT * FROM utilisateurs WHERE nomutilisateur = :username AND passutilisateur = :password LIMIT 1";
//prepare the statements
$stmt = $con->prepare( $sql );
//give value to named parameter :username
$stmt->bindValue( "username", $this->username, PDO::PARAM_STR ); 
//give value to named parameter :password
$stmt->bindValue( "password", hash("sha256", $this->password), PDO::PARAM_STR ); 
$stmt->execute();
$valid = $stmt->fetchColumn();
if( $valid ) {
$success = true;
 }
  $con = null;
  return $success;
  }catch (PDOException $e) {
  echo $e->getMessage();
   return $success;
    }
	
	}
	}
	
	