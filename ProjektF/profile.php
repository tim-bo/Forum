<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Ninja Forum -Dein Profil-</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<meta name="description"     content="Hier beschreiben Sie mit ein, zwei Sätzen den Inhalt dieser Datei.">
<!-- Zeitstempel Beispiel: 31.12.2001, 08:00 Uhr, +1 Std. zu Greenwich -->
<meta name="DC.Language"     content="de"> <!-- de = deutschsprachig -->
</head>

<!--Laufschrift (thx @vuchel)-->
<script type="text/javascript">
scroller = function() {
  var text = "Welcome to Ninja Forum...   ->       _GET Ninja.Skillz n0w for FREE!!!   ->  We also supporting Hero Turtles!!!                    ";
  var width = 100;

  if (!this.pos) this.pos = 0;
  window.document.title =
  text.concat(text).substring( this.pos, this.pos + width );
  if( this.pos++ >= text.length ) this.pos -= text.length;
  window.setTimeout( "scroller()", 100 );
}

window.onload = scroller;
</script>
<!--Laufschrift ENDE (thx @vuchel)-->

<body bgcolor="#ffffff" alink="#FF9933" background="img/bg.jpg" class="sb">
<div style="position:absolute; top:0px; left:0px;">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left">
<a href="index.htm"><img src="img/ecke.jpg" width="38" height="56" border="0" alt="Home"></a>
</td>
<td valign="top" align="left">
<br>
<span class="head">

<!--||| Hier den Namen der Homepage eintragen. |||-->
<a href="index.php">home</a> &middot; Dein Ninja-Forum Profil
</span>
</td>
</tr>
</table>

<!--||| Anfang Tabelle mit Inhalt |||-->
<table border="0" cellspacing="0" cellpadding="15">
<tr>
<td valign="top" width="160" nowrap="nowrap">
<br>
<!--||| Anfang Menüpunkte, hier die Namen und Links anpassen |||-->

<ul>
<li type="square"><span class="text"><a href="forum.php">Forum</a>
  <!--||| Anfang Submenue zu Menüpunkt 1, falls kein Bedarf besteht, die folgenden 3 Zeilen einfach löschen, ansonsten Namen anpassen und verlinken. |||-->
<li type="square"><span class="text"><a href="reg.html">Registrieren</a></span></li>
<li type="square"><span class="text"><a href="login.html">Login</a></span></li>
<li type="square"><span class="text"><a href="logout.php">Logout</a></span></li>
<li type="square"><span class="text"><a href="profile.php">Dein Profil</a></span></li>

<!--||| Ende Menüpunkte, hier ist Platz für weitere Links oder Grafiken, die aber nicht breiter als 130 Pixel sein dürfen. |||-->
</ul>
<p> Partner </p>
<li type="square"><span class="text"><a href="http://www.cloud.zanagemo.de">ZaNaGeMo-Cloud</a></span></li>
<li type="square"><span class="text"><a href="http://www.painttology.de">Painttology</a></span></li>
<li type="square"><span class="text"><a href="http://www.itz.tim-bo.de">ITZ09 Forum</a></span></li>
</td>

<!--||| Anfang  Textspalte |||-->
<td valign="top" width="400">
<br>

<p align="justify">
<!--||| Hier Überschrift und gewünschten Text einfügen. |||-->
<span class="lesen">{<b>Ninja-Forum -Dein Profil-</b>} Hier kannst du alle Informationen sehen die wir ueber Dich gespeichert haben. Dein Passwort kannst du Dir aus Sicherheitsgruenden hier nicht anzeigen lassen!
<!--||| Ende Text |||--></span>
</p>


<div align="center">
<!-- ######################################################################## -->
<?php# Connect to database mit PDO | _GET pid fuer Login-Pruefung
# Initialisiert die Session - session_start() gibt true or false zurück

#include ("dbpdo.php");
if (!isset($_GET['pid'])) $_GET['pid'] = '';
?>

<?php

# declare st
if (!isset($_POST['profile'])) $_POST['profile']='';
##if(!isset($_SESSION["Benutzername"])) 
##	{
##	echo "Please login <a href=\"login.html\">first...</a>";
##	}
# If Session gesetzt	
##if(isset($_SESSION["Benutzername"]) )
##	{
	?>
	<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
	<br>
	  
	<?php
	session_start();
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
	
	
   $idZugangsdaten = $_SESSION['userid'];
   $query_1='SELECT Vorname, Nachname
			 FROM TblPerson
			 WHERE TblZugangsdaten_idZugangsdaten LIKE "'.$idZugangsdaten.'"';
   $query_2='SELECT Benutzername 
			 FROM TblZugangsdaten
			 WHERE TblZugangsdaten.idZugangsdaten LIKE "'.$idZugangsdaten.'"';
			 
      
		foreach ($pdoDB->query($query_1)->fetchAll() as $ninja_row)	{
		#print $ninja_row['Vorname'] . "\t";
		#print $ninja_row['Nachname'] . "\n";
		}
		#array 2 variable
		$vorname = $ninja_row["Vorname"];
		$nachname = $ninja_row["Nachname"];
		
		#debug
		#echo ".$vorname";
		#echo $nachname;
		
		###foreach( $pdoDB->query($query_2) as $ninja_row2 )	{
		###print "Benutzername & ID: " .$ninja_row2[1] .'<br><br>';
		###}
		foreach ($pdoDB->query($query_2)->fetchAll() as $ninja_row2)	{
		echo "Hallo ";
		print $ninja_row2['Benutzername'] . "\t";
		echo "! Folgende Profildaten haben wir ueber Dich in unserer Datenbank hinterlegt:";
		}
		#array 2 variable
		$benutzername = $ninja_row2["Benutzername"];
		
		#array to variable
		###$benutzername = $ninja_row2["Benutzername"];
		#$passwort = $_POST["Passwort"];
		#$passwort2 = $_POST["Passwort2"];
	##} #if Session gesetzt ENDE
	?>
	  
	  
	  <!--Update der Daten in DB START-->
	  <?php
		if ($_POST['profile'])	{
		$nachname = $_POST["Nachname"];
		$vorname = $_POST["Vorname"];
		$passwort = $_POST["Passwort"];
		$passwort2 = $_POST["Passwort2"];
			# Sind Pws gleich OR Nachname leer OR Vorname leer OR Username leer OR Passwort leer -->Gib Meldung zum ausfuellen aller Felder
			if(($passwort != $passwort2) OR ($nachname == "")OR ($vorname == "")OR ($username == "") OR ($passwort == ""))	{
			echo "<font color='red'>Eingabefehler. Bitte alle Felder korekt ausfüllen.</font> ".header("refresh:2;url=profile.php");    
			}
			else	{
			$passwort = md5($passwort);
			$query =  sprintf("UPDATE Person Set Nachname = '%s',Vorname = '%s' where idPerson = '".$_SESSION['userid']."'",$nachname, $vorname );
			$result = mysql_query($query)or(print "<br /><strong><font color='red'>".mysql_error()."</font></strong>"); 
				if ($result)	{
				$query =  sprintf("UPDATE zugangsdaten Set Passwort = '%s' where Benutzername = '".$_SESSION['Benutzername']."'",$passwort);
				$result = mysql_query($query)or(print "<br /><strong><font color='red'>".mysql_error()."</font></strong>");  
				if ($result)echo "<font color='green'>Personendaten und Passwort erfolgreich geändert</font>".header("refresh:2;url=profile.php");       
				}        
			}      
		}
	$db = null;
?><!--Update der Daten in DB START-->
	  	  
	  <!--START des FORMULARES-->
	  <form action="profile.php" method="post">  <!-- Hier beginnt der Anmeldeblock-->
		<p align="center">Dein Vorname:<br>             <!-- Hier wird mit center der Block in die Mitte der Seite gesetzt-->
		<input type="text" size="24" maxlength="50"
		name="Vorname" value="<?php echo $vorname; ?>"><br>
  
		<p align="center">Dein Nachname:<br>             <!-- Hier wird mit center der Block in die Mitte der Seite gesetzt-->
		<input type="text" size="24" maxlength="50"
		name="Nachname" value="<?php echo $nachname; ?>"><br>
		
		<p align="center">Dein Benutzername:<br>             <!-- Hier wird mit center der Block in die Mitte der Seite gesetzt-->
		<input type="text" size="24" maxlength="50"
		name="Benutzername" value="<?php echo $benutzername; ?>"><br>
  
		<p align="center">Dein Passwort:<br>
		<input type="password" size="24" maxlength="50"
		name="Passwort"><br>
  
		Passwort wiederholen:<br>
		<input type="password" size="24" maxlength="50"
		name="Passwort2"><br><br><br>
  
		<input type="submit" value="Datensatz aendern!" name="profile">
	  </form><!--ENDE des FORMULARES-->
	</tr>
	</table>
	
</div>

<p align="justify">
<!--||| Hier Überschrift und gewünschten Text einfügen. |||-->
<span class="lesen">{<b>Hinweis!!</b>} Das Forum befindet sich noch im Aufbau und bietet noch nicht alle Funktionen. Wir erledigen das sobald der Tag mehr als 24h hat! :-)
<!--||| Ende Text |||--></span>
</p>
<br>
</td>
<!--||| Ende  Textspalte |||-->

</tr>
</table><!--||| Ende Tabelle mit Inhalt |||-->

<!--||| Anfang Tabelle mit Footer |||-->
<table border="0" cellspacing="0" cellpadding="15">
<tr>
<td valign="top" width="160" nowrap="nowrap">&nbsp;</td>
<td align="center" width="400">
<span class="text">
&copy; 2013 &middot; ZaNaGeMo &middot; <a href="mailto:mail@tim-bo.de"><img src="img/email.jpg" width="34" height="28" border="0" alt="E-Mail">Adminteam email senden</a>
</span>
</td>
</tr>
</table>
<!--||| Ende Tabelle mit Footer |||-->

</div>
</body>
</html>
