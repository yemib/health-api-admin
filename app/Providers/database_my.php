<?php 

class   database_my  {
	
public  $hostname_datanetwork ;
public $database_datanetwork ;
public  $username_datanetwork ;
public  $password_datanetwork ;
public 	$datanetwork;

	
	function __construct($hostname="localhost" ,   $database_datanetwork="buki" , $username_datanetwork="root" ,   $password_datanetwork="" ) {
		
 $this->hostname_datanetwork =$hostname;
 $this->database_datanetwork = $database_datanetwork;
 $this->username_datanetwork = $username_datanetwork;
 $this->password_datanetwork = $password_datanetwork;
		
		
		
		$this->datanetwork = mysqli_connect($hostname, $username_datanetwork,$password_datanetwork,$database_datanetwork)or trigger_error(mysqli_error(),E_USER_ERROR) ; 
		
	}
	
	
	
	
	
	
	
	
	
	function insert($query){
	$runquery =	mysqli_query($this->datanetwork  , $query);
	$row_affected  =mysqli_insert_id($this->datanetwork );
		
		
		
		
		
	if($runquery){
		// id insert
		
	return $row_affected;
		
	}else{
		
		return('bad');
	}		
	
    }
		
		
		
	
	function update(){
		
		
	}
	
	
	function test_username($table,  $username){
		
	$query = sprintf("SELECT * FROM %s  WHERE email = %s",$table ,database::GetSQLValueString($username,'text') );
		
	  $run =	mysqli_query($this->datanetwork  , $query);
		
	  $count  =   mysqli_num_rows($run);
		
		return($count);
		
	}
	
	function delete(){
		
		
	}
	
	
	
	
	
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
	 $datanetwork  = $this->datanetwork;
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($datanetwork , $theValue) : mysqli_escape_string( $datanetwork , $theValue);

  switch ($theType) {
		  
	  case "image":
	$theValue = ($theValue != "") ? "'" .$theValue . "'" : "NULL";
      break;
		  
    case "text":
       $theValue = ($theValue != "") ? "'" . htmlentities($theValue) . "'" : "NULL";
      break;
	     
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
		
		

	
	
}


?>