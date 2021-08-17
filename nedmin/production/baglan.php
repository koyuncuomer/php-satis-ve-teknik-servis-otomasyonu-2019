<?php 
try{
	$db=new PDO("mysql:host=localhost;dbname=firma-takip;charset=utf8",'root','pass');  
}
catch(PDOExpception $e){
	echo $e->getMessage();
}

?>