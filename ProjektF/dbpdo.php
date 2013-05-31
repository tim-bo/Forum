<?php
		#WHERE TblPerson.Vorname like "%'.$_SESSION["Benutzername"].'%"';
  
		# Zum debuggen einkommentieren
		#
		#echo "<pre>";
		#var_dump ($_SESSION); echo "</pre>";
  
try {   
    $dbserver   = 'localhost';
    $dbusername = 'forumuser';
    $dbpassword = '123456Hh';
    $dbname     = 'fknforumdb';
    
	$pdoDB = new PDO('mysql:host='.$dbserver.';dbname='.$dbname.'', $dbusername, $dbpassword);
	$pdoDB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
	
	catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}
?>
