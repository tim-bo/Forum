<?php
include ("db.php");  
$nachname = $_POST["Nachname"];
$vorname = $_POST["Vorname"];
$username = $_POST["Benutzername"];
$passwort = $_POST["Passwort"];
$passwort2 = $_POST["Passwort2"];

if(($passwort != $passwort2) OR ($username == "") OR ($passwort == ""))
    {
    echo "Eingabefehler. Bitte alle Felder korekt ausfüllen. ".header("refresh:3;url=reg.html");    
    exit;
    }
$passwort = md5($passwort);

$result = mysql_query("SELECT idZugangsdaten FROM TblZugangsdaten WHERE Benutzername LIKE '$username'");
$menge = mysql_num_rows($result);

if($menge == 0)
    {
    $eintrag = "INSERT INTO TblZugangsdaten (Benutzername, Passwort) VALUES ('$username', '$passwort')";
    $eintragen = mysql_query($eintrag);

    if($eintragen == true)
        {
    $query = "SELECT idZugangsdaten FROM TblZugangsdaten WHERE Benutzername LIKE '$username'";
    $erg = mysql_fetch_row(mysql_query($query)); 
    $_SESSION['idZugangsdaten'] = $erg[0];
    $_SESSION['idZugangsdaten'];
	# $eintrag = "INSERT INTO TblPerson (Nachname, Vorname, TblZugangsdaten_idZugangsdaten,titel_idtitel)
	# VALUES ('$nachname', '$vorname','".$_SESSION['idZugangsdaten']."', '5')";
    $eintrag = "INSERT INTO TblPerson (Nachname, Vorname, TblZugangsdaten_idZugangsdaten) 
                VALUES ('$nachname', '$vorname','".$_SESSION['idZugangsdaten']."')";
    $eintragen = mysql_query($eintrag);

    if($eintragen == true)
        {
        echo "Benutzername <b>$username</b> wurde erstellt. ".header("refresh:3;url=login.html");
        }
    else
        {
        echo "Fehler beim Speichern der Person. ".header("refresh:3;url=reg.html");
        }
        }
    else
        {
        echo "Fehler beim Speichern des Benutzernamens. ".header("refresh:3;url=reg.html");
        }



    }

else
    {
    echo "Benutzername schon vorhanden. <a href=\"reg.html\">Zurück</a>";
    }
    $db = null;
?>
