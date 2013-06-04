<?php

error_reporting(Null);
ini_set(display_errors, "off");
# Initialisiert die Session
session_start();

# Connect to database
include ("db.php");

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


# Pruefe Nutzerdaten
if (($row->Passwort == $passwort) && (isset($passwort))) {
    $_SESSION["userid"] = $row->idPerson;
    $_SESSION["Benutzername"] = $username;
    echo "Dein Login war erfolgreich..." . header("refresh:1;url=forum.php");
} else {
    echo "Falscher Benutzername oder Passwort..." . header("refresh:2;url=login.html");
}

# Conn beenden auch moeglich mit unset($dblink)
$dblink = null;
?>

