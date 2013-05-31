<?php
error_reporting(Null);
ini_set(display_errors, "off");

session_start();

include ("db.php"); 
#echo $_POST["Login"];
#if(isset($_POST["Login"]))	{
	#echo "Text";
	$username = $_POST["Benutzername"];
	$passwort = md5($_POST["Passwort"]);
	
	# loginAbfrage an DB; Query gibt Benutzername, Passwort, id_zugangsdaten, idPerson von dem Benutzername der eingegeben wird (where)
	$loginQuery = "Select Benutzername, Passwort, idZugangsdaten, idPerson
					FROM 
					TblZugangsdaten 
					join TblPerson on idZugangsdaten = TblZugangsdaten_idZugangsdaten
					WHERE Benutzername LIKE '$username' LIMIT 1; "; 


	# Abfrageresultat				
	$queryresult = mysql_query($loginQuery); 
	$row = mysql_fetch_object($queryresult); 

				# Zum debuggen einkommentieren
				#echo "<pre>";
				#var_dump ($_SESSION); echo "</pre>";
		
		
	#if((!$row->Benutzername == "")&&(row->Passwort == $passwort)&&(isset($passwort))) 
	if(($row->Passwort == $passwort)&&(isset($passwort))) 
		{ 
		$_SESSION["userid"] = $row->idPerson; 
		$_SESSION["Benutzername"] = $username; 
		echo "Dein Login war erfolgreich...".header("refresh:8;url=forum.php"); 
		} 
	else 
		{ 
		echo "Falscher Benutzername oder Passwort...".header("refresh:8;url=login.html"); 
		} 

		# Conn beenden auch moeglich mit unset($db)
	$db = null;
	#}

	#else {
	#echo "Gib den scheiss ein....".header("refresh:8;url=login.html");
	#}
	?>

