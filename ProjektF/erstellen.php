<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Ninja Forum -Create a Post-</title>
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
<a href="index.php">home</a> &middot; Create a Post
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
<span class="lesen">{<b>Ninja-Forum -Create a Post-</b>} Hier kannst du neue Threads erstellen und Beitraege posten.
<!--||| Ende Text |||--></span>
</p>
<div align="center">
<!--<img src="img/absatz.jpg" width="370" height="315" alt="0">-->
<!-- ######################################################################## -->

<?php
session_start();
if(!isset($_SESSION["Benutzername"])) 
{
  echo "Please login <a href=\"login.html\">first...</a>";
}
if(isset($_SESSION["Benutzername"]) )
{
#-------------------------------------------------------------------------------
#                 Verbindung zu Datenbank aufbauen 
#-------------------------------------------------------------------------------
  include ("db.php");

#-------------------------------------------------------------------------------
#                 Deklarationen 
#-------------------------------------------------------------------------------
  if (!isset($_SESSION['idBereich'])) $_SESSION['idBereich'] = '';
  if (!isset($_SESSION['idThread'])) $_SESSION['idThread'] = '';
  if (!isset($_POST['strBereich'])) $_POST['strBereich'] = '';
  if (!isset($_POST['strThread'])) $_POST['strThread'] = '';
  if (!isset($_POST['strBeitrag'])) $_POST['strBeitrag'] = '';
  if (!isset($_POST['ATblBereich'])) $_POST['ATblBereich'] = '';
  if (!isset($_POST['ATblThread'])) $_POST['ATblThread'] = '';
  if ($_SESSION['idBereich'] == "Keine Auswahl") $_SESSION['idThread'] = 0;
  if ($_SESSION['idThread'] == "Keine Auswahl") $_SESSION['idThread'] = 0;
  $_SESSION['strBereich'] = $_POST['strBereich'];
  $_SESSION['strThread'] = $_POST['strThread'];
  $_SESSION['strBeitrag'] = $_POST['strBeitrag'];
  $_SESSION['idBereich'] = $_POST['ATblBereich'];
  $_SESSION['idThread'] = $_POST['ATblThread'];
?>
<!-- ------------------------------------------------------------------------ -->
<!--                           Menue darstellen                               -->
<!-- ------------------------------------------------------------------------ -->
  <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td><?php echo "Hallo <strong>".$_SESSION["Benutzername"]."</strong>"; ?></td>
      <td align = "right"><a href="logout.php"><font size="5px" color="#71b337"><strong>logout</strong></font></a></td>
    </tr>
  </table>
  <hr>            
  <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%" >
    <tr>
      <td width="10%">&nbsp;</td>
      <td align="center"><font size="4px"><a href="erstellen.php">Create a Post</a></font></td>
      <td width="5%">&nbsp;</td>
      <td align="center"><font size="4px"><a href="forum.php">Overview Forum</a></font></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
<!-- ------------------------------------------------------------------------ -->
<!--                 Daten prüfen und eintragen                               -->
<!-- ------------------------------------------------------------------------ -->
<?php
# Debug....
#echo "<pre>";
#var_dump ($_SESSION); echo "</pre>";
if (isset($_POST['abschicken']))
{
  if (($_SESSION['strThread']!='')&&($_SESSION['strBeitrag']!='')&&($_SESSION['strBereich']!=''))
  {
    if ($_SESSION['idThread']=="Keine Auswahl")
    {
      $query =  sprintf("INSERT INTO TblThread (Titel, TblBereich_idBereich, Person_idPerson) VALUES ( '%s','%s','%s')",
				$_SESSION['strThread'],                   
				$_SESSION['idBereich'],
				$_SESSION['userid']);
				   echo $query;
      $result = mysql_query($query); 
      if(!$result) 
      {
         echo "<strong>Datenbankfehler:". mysql_error()."</strong>";
      }
      else
      {
        echo "<strong>Thread erfolgreich erstellt</strong>";
      }
      $query = "Select idThread from TblThread where TblBereich_idBereich = '".$_SESSION['idBereich']."' and Titel = '".$_SESSION['strThread']."' ";
      $erg = mysql_fetch_row(mysql_query($query)); 
      $_SESSION['idThread'] = $erg[0];
    }
    $query =  sprintf("INSERT INTO TblBeitrag (Text, Person_idPerson, TblThread_idThread, TblThread_TblBereich_idBereich ) VALUES ( '%s','%s','%s', '%s')",
                $_SESSION['strBeitrag'],                   
                $_SESSION['userid'],
                $_SESSION['idThread'],
				$_SESSION['idBereich']);
				echo $query;
    $result = mysql_query($query); 
    if(!$result) 
    {
      echo "<strong>Datenbankfehler:". mysql_error()."</strong>";
    }
    else
    {
      echo "<strong>Daten erfolgreich eingetragen</strong>";
      $_SESSION['idBereich'] = '';
      $_SESSION['idThread'] = '';
      $_SESSION['strBereich'] = '';
      $_SESSION['strThread'] = '';
      $_SESSION['strBeitrag'] = '';
    }
  }
  else
  {
    echo "<strong>The information are not completed</strong>";
  }
}
?> 
<hr>            
<!-- ------------------------------------------------------------------------ -->
<!--                           DropDown Boxen                                 -->
<!-- ------------------------------------------------------------------------ -->
  <form action="erstellen.php?pid=Bereich" method="post" enctype="multipart/form-data">                   <!-- Beginn Formularfeld -->
    <table border="0" cellspacing="0" cellpadding="0" width="50%" align="center" >
      <tr>
        <td width="40%"  align="center">
        <font color="#99999" size="4px"><strong>Select Topic </strong></font>
          <?php $abfragestring = "SELECT idBereich, Thema FROM TblBereich order by idBereich ASC"; ?>        <!-- SQL-Abfragestring für Drop Down Menü -->
        <select name="ATblBereich" id="ATblBereich" 
<?php     if (($_SESSION['idBereich'])&&($_SESSION['idBereich']!="Keine Auswahl")) echo 'style="background-color: #A6D92F";' ?> onchange="submit()">                         
          <option>Keine Auswahl</option>                                                                  <!-- Erster Eintrag des Menüs -->
<?php     $sqlErgebnis = mysql_query($abfragestring);                                                     // Abfrage aus DB mit übermitteltem SQL-String
          while($inh = mysql_fetch_row($sqlErgebnis))                                                     // Solange Werte kommen....
          { 
            if ($_SESSION['idBereich'] == $inh[0])
            {
              echo "<option selected value='".$inh[0]."'>".$inh[1]."</option>";                           // Zeile weiss ausgeben
              $_SESSION['strBereich'] = $inh[1];
            }
            else
            {
              echo "<option value='".$inh[0]."' style='background-color: #FFFFFF';>".$inh[1]."</option>"; // Zeile weiss ausgeben
            }
          } 
?>                                        <!-- Inhalt der Box füllen -->
        </select>                                                                                         <!-- Ende der Box -->
      </td>                                                                                               
      <td  width="40%" align="center">                                                                    <!-- Spalte beginnen -->
        <font color="#99999" size="4px"><strong>Select Thread</strong></font>
<?php     $abfragestring = "SELECT idThread, Titel FROM TblThread WHERE TblBereich_idBereich = ".$_SESSION['idBereich']." order by Titel ASC"; ?>  <!-- SQL-Abfragestring für Drop Down Menü -->
        <select name="ATblThread" id="ATblThread" 
<?php     if (($_SESSION['idThread'])&&($_SESSION['idThread']!="Keine Auswahl")) echo 'style="background-color: #A6D92F";' ?> onchange="submit()">                         
          <option>Keine Auswahl</option>                                                                  <!-- Erster Eintrag des Menüs -->
<?php     $sqlErgebnis = mysql_query($abfragestring);                                                     // Abfrage aus DB mit übermitteltem SQL-String
          while($inh = mysql_fetch_row($sqlErgebnis))                                                     // Solange Werte kommen....
          { 
            if ($_SESSION['idThread'] == $inh[0])
            {
              echo "<option selected value='".$inh[0]."'>".$inh[1]."</option>";                           // Zeile weiss ausgeben
              $_SESSION['strThread'] = $inh[1];
            }
            else
            {
              echo "<option value='".$inh[0]."' style='background-color: #FFFFFF';>".$inh[1]."</option>"; // Zeile weiss ausgeben
            }
          } 
?>                                        
        </select>                                                                                         <!-- Ende der Box -->
      </td>                                                                                               <!-- Ende Spalte -->
    </tr>                                                                                                 <!-- Ende Zeile -->
  </table>                                                                                                <!-- Ende Tabelle -->
</form>                                                                                                   <!-- Ende des Formulars -->
<hr>                                                                             <!-- Horizontale Linie -->

<!-- ------------------------------------------------------------------------ -->
<!--                           Eingabefelder                                  -->
<!-- ------------------------------------------------------------------------ -->
<form action="erstellen.php" method="post" enctype="multipart/form-data">                                 <!-- Beginn Formularfeld -->
  <table border="0" cellpadding="0" cellspacing="2">                                                      <!-- Beginn Tabelle -->
    <tr>                                                                                                  <!-- Beginn Spalte -->
      <td width="30px"><p><font color="#99999" size="4px">Topic</font></p></td>          <!-- Spalte mit Text -->
      <td>&nbsp;</td>                                                                                     <!-- Leere Spalte -->
      <td>                                                                                                <!-- Beginn Spalte -->
        <input style='background-color: #E5E5E5'; readonly maxlength="20" type="text" size="30" name="strBereich"  value= "<?php echo $_SESSION['strBereich']; ?>">  <!-- Eingabefeld mit Variabler Textausgabe -->
        <font color="#99999" size="4px"><?php if ($_SESSION['strBereich']!='') {echo "";} else {echo "Select a Topic";} ?> </font>
      </td>                                                                                               <!-- Ende Spalte -->    
    </tr>                                                                                                 <!-- Ende Zeile -->
    <tr>                                                                                                  <!-- Beginn Spalte -->
      <td width="30px"><p><font color="#99999" size="4px">Thread</font></p></td>           <!-- Spalte mit Text -->
      <td>&nbsp;</td>                                                                                     <!-- Leere Spalte -->
      <td>                                                                                                <!-- Beginn Spalte -->
        <input <?php if ($_SESSION['strThread']!='') echo "readonly style='background-color: #E5E5E5';"; ?> maxlength="50" type="text" size="30" name="strThread"  value= "<?php echo $_SESSION['strThread']; ?>"> <!-- Eingabefeld mit Variabler Textausgabe -->
        <font color="#99999" size="3px"><?php if ($_SESSION['strThread']!='') {echo "";} else {echo "Select Thread or create new";} ?> </font>
      </td>                                                                                               <!-- Ende Spalte -->    
    </tr>                                                                                                 <!-- Ende Zeile -->
    <tr>                                                                                                  <!-- Beginn Zeile -->
      <td width="30px"><p><font color="#99999" size="4px">Create your Post here:</font></p></td>          <!-- Spalte mit Text -->
      <td>&nbsp;</td>                                                                                     <!-- Leere Spalte -->
      <td colspan="2" >                                                                                   <!-- Beginn Spalte über zwei Spalten-->
        <p><textarea name="strBeitrag" rows="10" cols="70" wrap="physical"><?php echo $_SESSION['strBeitrag'];?></textarea></p>                                                                                      
      </td>                                                                                               <!-- Ende Spalte -->    
    </tr>                                                                                                 <!-- Ende Zeile -->
    <tr>                                                                                                  <!-- Beginn Zeile -->
      <td>&nbsp;</td>                                                                                     <!-- Leere Spalte -->    
      <td colspan="2" weidth="150px" align="center" >                                                     <!-- Beginn Spalte über zwei Spalten -->
        <input type="hidden" name="ATblBereich" value="<?php echo $_SESSION['idBereich'] ?>">             <!-- Versteckte Daten -->
        <input type="hidden" name="ATblThread" value="<?php echo $_SESSION['idThread'] ?>">               <!-- Versteckte Daten -->
        <input type="submit" name="abschicken" value="abschicken">                                        <!-- Button abschicken erstellen -->
      </td>                                                                                               <!-- Ende Spalte -->
    </tr>                                                                                                 <!-- Ende Zeile -->
  </table>                                                                                                <!-- Ende Tabelle -->
</form>                                                                                                   <!-- Ende Form -->
<?php
}
?>










<p align="justify">
<!--||| Hier Überschrift und gewünschten Text einfügen. |||-->
<span class="lesen">{<b>Hinweis!!</b>} Das Forum befindet sich noch im Aufbau und bietet noch nicht alle Funktionalitäten. Wir erledigen das sobald der Tag mehr als 24h hat! :-)
<!--||| Ende Text |||--></span>
</p>

<br>
</td>
<!--||| Ende  Textspalte |||-->

</tr>
</table>

<!--||| Ende Tabelle mit Inhalt |||-->


<!--||| Anfang Tabelle mit Footer |||-->
<table border="0" cellspacing="0" cellpadding="15">
<tr>
<td valign="top" width="160" nowrap="nowrap">&nbsp;</td>
<td align="center" width="400">
<span class="text">

<!--||| Hier die eigene E-Mailadresse einfügen. |||-->
&copy; 2013 &middot; ZaNaGeMo &middot; <a href="mailto:mail@tim-bo.de"><img src="img/email.jpg" width="34" height="28" border="0" alt="E-Mail">Adminteam email senden</a>

</span>
</td>
</tr>
</table>
<!--||| Ende Tabelle mit Footer |||-->

</div>
</body>
</html>