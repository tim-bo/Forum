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

            if (!this.pos)
                this.pos = 0;
            window.document.title =
                    text.concat(text).substring(this.pos, this.pos + width);
            if (this.pos++ >= text.length)
                this.pos -= text.length;
            window.setTimeout("scroller()", 100);
        }

        window.onload = scroller;
    </script>
    <!--Laufschrift ENDE (thx @vuchel)-->

    <!--Body START-->
    <body bgcolor="#ffffff" alink="#FF9933" background="img/bg.jpg" class="sb">
        <div style="position:absolute; top:0px; left:0px;"><!--Start div1-->

            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left">
                        <a href="index.htm"><img src="img/ecke.jpg" width="38" height="56" border="0" alt="Home"></a>
                    </td>
                    <td valign="top" align="left">
                        <br>
                        <span class="head">

                            <!--Namen der Homepage, Ruecksprung to Index-->
                            <a href="index.php">home</a> &middot; Dein Ninja-Forum Profil
                        </span>
                    </td>
                </tr>
            </table>

            <!--Anfang Tabelle mit Inhalt-->
            <table border="0" cellspacing="0" cellpadding="15">
                <tr>
                    <td valign="top" width="160" nowrap="nowrap">
                        <br>

                        <!--Anfang Menüpunkte-->
                        <ul>
                            <li type="square"><span class="text"><a href="forum.php">Forum</a>
                                    <li type="square"><span class="text"><a href="reg.html">Registrieren</a></span></li>
                                    <li type="square"><span class="text"><a href="login.html">Login</a></span></li>
                                    <li type="square"><span class="text"><a href="logout.php">Logout</a></span></li>
                                    <li type="square"><span class="text"><a href="profile.php">Dein Profil</a></span></li>
                                    <li type="square"><span class="text"><a href="view.php">Deine Beitraege</a></span></li>
                        </ul>
                        <p> Partner </p>
                <li type="square"><span class="text"><a href="http://www.cloud.zanagemo.de">ZaNaGeMo-Cloud</a></span></li>
                <li type="square"><span class="text"><a href="http://www.painttology.de">Painttology</a></span></li>
                <li type="square"><span class="text"><a href="http://www.itz.tim-bo.de">ITZ09 Forum</a></span></li>
                </td>

                <!--Anfang  Textspalte-->
                <td valign="top" width="400">
                    <br>

                    <p align="justify">
                        <!--1.Ueberschrift / 1.Text Hauptteil-->
                        <span class="lesen">{<b>Ninja-Forum -Dein Profil-</b>} Hier kannst du alle Informationen sehen die wir ueber Dich gespeichert haben und diese aendern.
                            Dein Passwort kannst du Dir aus Sicherheitsgruenden nicht anzeigen lassen, es aber jederzeit aendern!
                        </span>
                    </p>


                    <div align="center"><!--Start div2-->

                        <?php
                        session_start();
# declare st
                        if (!isset($_GET['pid']))
                            $_GET['pid'] = '';
                        if (!isset($_POST['profile']))
                            $_POST['profile'] = '';
                        if (!isset($_SESSION["Benutzername"])) {
                            echo "Please login <a href=\"login.html\">first...</a>";
                        }
# If Session gesetzt	
                        if (isset($_SESSION["Benutzername"])) {
                            ?>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                <br>

                                <?php
                                # Aufbau Datenbankverbindung PDO + Exception Handling (kein prepare)
                                try {
                                    $dbserver = 'localhost';
                                    $dbusername = 'forumuser';
                                    $dbpassword = '123456Hh';
                                    $dbname = 'fknforumdb';
                                    # mit new PDO eine neue Instanz des PHP Data Objects erstellen und an PDOobjDb uebergeben
                                    $pdoDB = new PDO('mysql:host=' . $dbserver . ';dbname=' . $dbname . '', $dbusername, $dbpassword);
                                    $pdoDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                } catch (PDOException $e) {
                                    print "Error!: " . $e->getMessage() . "<br/>";
                                    die();
                                }

                                # Aufbau Datenbankverbindung PDO + Exception Handling (kein prepare)
                                $idZugangsdaten = $_SESSION['userid'];
                                $query_1 = 'SELECT Vorname, Nachname
			 FROM TblPerson
			 WHERE TblZugangsdaten_idZugangsdaten LIKE "' . $idZugangsdaten . '"';

                                $dbSelectBenNamePw = $pdoDB->prepare("SELECT Benutzername, Passwort FROM TblZugangsdaten WHERE TblZugangsdaten.idZugangsdaten = :id");

                                $dbSelectBenNamePw->bindParam('id', $idZugangsdaten);
                                $dbSelectBenNamePw->execute();
                                #zum debuggen einkommentieren
                                #echo "\nPDO::errorCode(): ";
                                #print $dbSelectBenNamePw->errorCode();
                                #print_r($dbSelectBenNamePw->errorInfo());
                                # Werte aus abstraktem Array Pos. 1+2 holen und in Formular schreiben
                                foreach ($dbSelectBenNamePw as $row) {
                                    #echo $row[0].' '.$row[1]."<br/>\n";
                                    $benutzername = $row["Benutzername"];
                                }

                                foreach ($pdoDB->query($query_1)->fetchAll() as $ninja_row) {
                                    #array2variable
                                    $vorname = $ninja_row["Vorname"];
                                    $nachname = $ninja_row["Nachname"];
                                }
                                ?>

                                <!--Update der Daten in DB START-->
                                <?php
                                # Connect to database
                                include ("db.php");
                                if ($_POST['profile']) {
                                    $nachname = $_POST["Nachname"];
                                    $vorname = $_POST["Vorname"];
                                    $passwort = $_POST["Passwort"];
                                    $passwort2 = $_POST["Passwort2"];
                                    $benname = $_POST["Benutzername"];
                                    # Sind Pws gleich OR Nachname leer OR Vorname leer OR Username leer OR Passwort leer -->Gib Meldung zum ausfuellen aller Felder
                                    if (($passwort != $passwort2) OR ($nachname == "") OR ($vorname == "") OR ($benutzername == "") OR ($passwort == "")) {
                                        echo "<font color='red'>Eingabefehler. Bitte fuelle alle Eingabefelder aus und achte darauf das die neuen Passwoerter identisch sind.</font> " . header("refresh:4;url=profile.php");
                                    } else {
                                        # schreibe geaenderte Daten in DB
                                        $passwort = md5($passwort);
                                        $query = sprintf("UPDATE TblPerson Set Nachname = '%s',Vorname = '%s' where idPerson = '" . $_SESSION['userid'] . "'", $nachname, $vorname);
                                        $result = mysql_query($query) or (print "<br /><strong><font color='orange'>" . mysql_error() . "</font></strong>");
                                        if ($result) {
                                            $query = sprintf("UPDATE TblZugangsdaten Set Passwort = '%s', Benutzername = '%s' where idZugangsdaten = '" . $_SESSION['userid'] . "'", $passwort, $benname);
                                            $result = mysql_query($query) or (print "<br /><strong><font color='orange'>" . mysql_error() . "</font></strong>");
                                            if ($result)
                                                echo "<font color='green'>Personendaten und Passwort erfolgreich geaendert</font>" . header("refresh:2;url=profile.php");
                                        }
                                    }
                                }
                                $dblink = null;
                                ?><!--Update der Daten in DB ENDE-->


                                <!--START des FORMULARES-->
                                <form action="profile.php" method="post"> 
                                    <p align="center">Dein Vorname:<br>             
                                        <input type="text" size="24" maxlength="50"
                                               name="Vorname" value="<?php echo $vorname; ?>"><br>

                                    <p align="center">Dein Nachname:<br>             
                                        <input type="text" size="24" maxlength="50"
                                               name="Nachname" value="<?php echo $nachname; ?>"><br>

                                    <p align="center">Dein Benutzername:<br>             
                                        <input type="text" size="24" maxlength="50"
                                               name="Benutzername" value="<?php echo $benutzername; ?>"><br>

                                    <p align="center">Dein Passwort:<br>
                                        <input type="password" size="24" maxlength="50"
                                               name="Passwort"><br>

                                        Passwort wiederholen:<br>
                                        <input type="password" size="24" maxlength="50"
                                               name="Passwort2"><br>

                                        <input type="submit" value="Datensatz aendern!" name="profile">
                                </form><!--ENDE des FORMULARES-->
                                </tr>
                            </table>

                            <?php
                        } #close fuer schleife session id
                        ?>
                    </div><!--Ende div2-->

                    <p align="justify">
                        <!--2.Ueberschrift / 2.Text Hauptteil-->
                        <span class="lesen">{<b>Hinweis!!</b>} Das Forum befindet sich noch im Aufbau und bietet noch nicht alle Funktionen. Wir erledigen das sobald der Tag mehr als 24h hat! :-)
                        </span>
                    </p>
                    <br>
                </td>
                <!--Ende  Textspalte-->

                </tr>
            </table><!--Ende Tabelle mit Inhalt-->

            <!--Anfang Tabelle mit Footer-->
            <table border="0" cellspacing="0" cellpadding="15">
                <tr>
                    <td valign="top" width="160" nowrap="nowrap">&nbsp;</td>
                    <td align="center" width="400">
                        <span class="text">
                            No &copy; 2013 &middot; ZaNaGeMo &middot; <a href="mailto:mail@tim-bo.de"><img src="img/email.jpg" width="34" height="28" border="0" alt="E-Mail">Adminteam email senden</a>
                        </span>
                    </td>
                </tr>
            </table>
            <!--Ende Tabelle mit Footer-->

        </div><!--Ende div1-->
    </body>
</html>
