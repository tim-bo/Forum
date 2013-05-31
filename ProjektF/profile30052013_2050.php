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
<?php# Connect to database
#include ("dbpdo.php");


####################################################
if (!isset($_GET['pid'])) $_GET['pid'] = '';
?>
<?php
# Initialisiert die Session - session_start() gibt true or false zurück
session_start();
# If Session Nicht gesetzt
if(!isset($_SESSION["Benutzername"])) 
	{
	echo "Please login <a href=\"login.html\">first...</a>";
	}
# If Session gesetzt	
if(isset($_SESSION["Benutzername"]) )
	{
	?>
	<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td><?php echo "Hallo <strong>".$_SESSION["Benutzername"]."</strong>, du bekommst alle Daten die wir ueber Dich gespeichert haben angezeigt"; ?></td>
	  <br>
	  <td><?php echo "Deine UserID ist die <strong>".$_SESSION["userid"]."</strong>, "; ?></td>
	  
	  <!--START des FORMULARES-->
	  <form action="aendern.php" method="post">  <!-- Hier beginnt der Anmeldeblock-->
		<p align="center">Dein Vorname:<br>             <!-- Hier wird mit center der Block in die Mitte der Seite gesetzt-->
		<input type="text" size="24" maxlength="50"
		name="Vorname" value="<?php echo $vorname; ?>"><br>
  
		<p align="center">Dein Nachname:<br>             <!-- Hier wird mit center der Block in die Mitte der Seite gesetzt-->
		<input type="text" size="24" maxlength="50"
		name="Nachname" value="<?php echo $nachname; ?>"><br>
  
		<p align="center">Dein Passwort:<br>
		<input type="password" size="24" maxlength="50"
		name="Passwort"><br>
  
		Passwort wiederholen:<br>
		<input type="password" size="24" maxlength="50"
		name="Passwort2"><br><br><br>
  
		<input type="submit" value="Eintragen!" name="aendern">
	  </form><!--ENDE des FORMULARES-->
	  
      <!--<td align = "right"><a href="logout.php"><font size="4px" color="##999999"><strong>Logout</strong></font></a></td>-->
	  <!--<td align = "right"><a href="profile.php"><font size="5px" color="#6F0DD1"><strong>View Profile</strong></font></a></td>-->
	</tr>
	</table>

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
   
   $idZugangsdaten = $_SESSION['userid'];
   #$idZugangsdaten2 = $_SESSION['userid'];
   #echo "ahhhh <strong>".$_SESSION["userid"]."</strong>, was steht denn drin";
   
   # foreach ($conn->query($sql) as $row) {
   #    print $row['name'] . "\t";
   #    print $row['color'] . "\t";
   #    print $row['calories'] . "\n";
   #}
   $query_1='SELECT Vorname, Nachname
			 FROM TblPerson
			 WHERE TblZugangsdaten_idZugangsdaten LIKE "'.$idZugangsdaten.'"';
   $query_2='SELECT Benutzername 
			 FROM TblZugangsdaten
			 WHERE TblZugangsdaten.idZugangsdaten LIKE "'.$idZugangsdaten.'"';
			 
       
   #echo "Q1 zum debuggen: " . $query_1 . "<br>";
   #echo "Q2 zum debuggen: " . $query_2 . "<br>";
       
   #echo "<h1>Query 1</h1><br>";
		##foreach( $pdoDB->query($query_1) as $zeile ){
		foreach ($pdoDB->query($query_1)->fetchAll() as $zeile) {
		#echo str_pad($zeile['email'], 30,".")." " . $zeile['title'].'<br>';
		#echo str_pad($zeile['Vorname'], 30,".")." " . $zeile['Nachname'].'<br>';
		#echo "Vorname & Nachname: " .$zeile['Vorname'] . " \t\t\t\t".$zeile['Nachname'].'<br>';
		print $zeile['Vorname'] . "\t";
		print $zeile['Nachname'] . "\n";
		#print $zeile['Vorname'] . "\n";
		}   
		#echo "<br><h1>Query 2</h1><br>";
		
		
		foreach( $pdoDB->query($query_2) as $zeile ){
		#echo "Benutzername & ID: " .$zeile['Benutzername'] . " \t\t\t\t".$zeile['idZugangsdaten'].'<br><br>';
		print "Benutzername & ID: " .$zeile[1] .'<br><br>';
		}
} 
	
catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}



?>

  <!-- weiter if eingeloggt....

  
  <?php
	}
	?>
</div>



<p align="justify">
<!--||| Hier Überschrift und gewünschten Text einfügen. |||-->
<span class="lesen">{<b>Hinweis!!</b>} Das Forum befindet sich noch im Aufbau und bietet noch nicht alle Funktionen. Wir erledigen das sobald der Tag mehr als 24h hat! :-)
<!--||| Ende Text |||--></span>
</p>
<br>
<!--</td> -->
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
