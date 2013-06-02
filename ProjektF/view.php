<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Ninja Forum -Deine Beitraege-</title>
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
<!--Body START-->
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
				<!--||| Namen der Homepage, Ruecksprung to Index |||-->
				<a href="index.php">home</a> &middot; Deine Beitraege
				</span>
				</td>
				</tr>
			</table>

	<!--||| Anfang Tabelle mit Inhalt |||-->
			<table border="0" cellspacing="0" cellpadding="15">
				<tr>
				<td valign="top" width="160" nowrap="nowrap"> <!--nowrap weil XHTML konform-->
				<br>
				<!--||| Anfang Menüpunkte |||-->
					<ul>
					<li type="square"><span class="text"><a href="forum.php">Forum</a>
					<!--||| Anfang Submenue zu Menüpunkt 1, falls kein Bedarf besteht, die folgenden 3 Zeilen einfach löschen, ansonsten Namen anpassen und verlinken. |||-->
					<li type="square"><span class="text"><a href="reg.html">Registrieren</a></span></li>
					<li type="square"><span class="text"><a href="login.html">Login</a></span></li>
					<li type="square"><span class="text"><a href="logout.php">Logout</a></span></li>
					<li type="square"><span class="text"><a href="profile.php">Dein Profil</a></span></li>
					<li type="square"><span class="text"><a href="view.php">Meine Beitraege</a></span></li>
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
			<!--1.Ueberschrift / 1.Text Hauptteil-->
			<span class="lesen">{<b>Ninja-Forum -Deine Beitraege-</b>} Hier siehst du alle deine Beitraege die du im Ninja-Forum erstellt hast. 
			<!--||| Ende Text |||--></span></p>
		<!-- START Div1 -->	
		<div align="center">
					
	<?php
	# Initialisiert die Session
	session_start();

	if(!isset($_SESSION["Benutzername"]))	{
		echo "Please login <a href=\"login.html\">first...</a>";
	}
	
	if(isset($_SESSION["Benutzername"]) )
		{
	?>
		<!-- wenn eingeloggt -->
		<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
			<td><?php echo "Welcome <strong>".$_SESSION["Benutzername"]."</strong>"; ?></td>  
			</tr>
		</table>
		<?php
		#}
		# Connect to database
		include ("db.php");

		?>

		<!-- #Menue darstellen -->
		<hr><!--Trennlinie setzen-->            
			<table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" >
				<tr>
					<td width="10%">&nbsp;</td>
					<td align="center"><font size="4px"><a href="erstellen.php">Create a Post</a></font></td>
					<td width="5%">&nbsp;</td>
					<td align="center"><font size="4px"><a href="forum.php">Overview Forum</a></font></td>
					<td width="10%">&nbsp;</td>
				</tr>
			</table>
		<hr><!--Trennlinie setzen-->


<?php

/* Abfrageskript view_beitrag zur Ermittlung der eigenen Beitra */
    { 
	$query = "Select * from view_beitrag WHERE Benutzername = '".$_SESSION['Benutzername']."'";
    } 

		# Abfrage an Datenbank senden
		$sqlquery = mysql_query($query);     

		/* Resultate empfangen und ausgeben*/
		while( $result = mysql_fetch_object($sqlquery) )
		{
	?>
		<table width="760" align="center" border="1" cellspacing="0" cellpadding="7" style="border-collapse: collapse">
			<tr>
			<td valign="top" rowspan="2" width="150">
				<?php echo "<div align='center'><font size='4px' color='#99999'><strong>".$result->Thema."</strong></font></div>"; ?>
			</td>
			<td valign="top" width="400">
				<?php echo "<div align='center'><font size='5px' color='#99999'><strong>".$result->Titel."</strong></font></div>"; ?>
			</td>
			<td valign="top" width="100">
				<?php echo "Author<strong>  ".$result->Benutzername."</strong>"; ?>
			</td>
			</tr>
			<tr>
			<td colspan="2" valign="top">
				<?php echo str_replace("\n","<br />",$result->Text); ?>
			</td>
			</tr>
		</table>        
		<?php
		} 
		?>
		<?php
		} #close fuer schleife session id
		?>
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

	<table border="0" cellspacing="0" cellpadding="15"><!--||| Anfang Tabelle mit Footer |||-->
		<tr>
			<td valign="top" width="160" nowrap="nowrap">&nbsp;</td>
			<td align="center" width="400">
			<span class="text">
			<!--||| Hier die eigene E-Mailadresse einfügen. |||-->
			No &copy; 2013 &middot; ZaNaGeMo &middot; <a href="mailto:mail@tim-bo.de"><img src="img/email.jpg" width="34" height="28" border="0" alt="E-Mail">Adminteam email senden</a>

			</span>
			</td>
		</tr>
	</table><!--||| Ende Tabelle mit Footer |||-->

	</div>
</body><!--Body Ende-->
</html>
