<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
        <title>Ninja-Forum M13 Home</title>
        <link rel="stylesheet" href="styles.css" type="text/css">
        <meta name="description"     content="Hier beschreiben Sie mit ein, zwei S�tzen den Inhalt dieser Datei.">
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
        <div style="position:absolute; top:0px; left:0px;">

            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left">
                        <img src="img/ecke.jpg" width="38" height="56" alt="">
                    </td>
                    <td valign="top" align="left">
                        <br>
                        <span class="head">

                            <!--Namen der Homepage, ohne Ruecksprung to Index-->
                            Ninja Forum M13 Home
                        </span>
                    </td>
                </tr>
            </table>

            <!--Anfang Tabelle mit Inhalt-->
            <table border="0" cellspacing="0" cellpadding="15">
                <tr>
                    <td valign="top" width="160" nowrap="nowrap">
                        <br>
                        <!--Anfang Men�punkte-->
                        <ul>
                            <li type="square"><span class="text"><a href="forum.php">Forum</a></span></li>
                            <li type="square"><span class="text"><a href="reg.html">Registrieren</a></span></li>
                            <li type="square"><span class="text"><a href="login.php">Login</a></span></li>
                            <li type="square"><span class="text"><a href="logout.php">Logut</a></span></li>
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
                        <span class="lesen">{<b>|==|M13 ITZ09 Ninja-Forum==></b>} Herzlich Willkommen auf M13 ITZ09 Ninja-Forum. 
                        </span>

                    </p>
                    <div align="center">
                        <img src="img/absatz.jpg" width="370" height="315" alt="">
                    </div>
                    <p align="justify">

                        <!--2.Ueberschrift / 2.Text Hauptteil-->
                        <span class="lesen">{<b>_GET free Ninja Skillz</b>} Diese Seite befindet sich im Aufbau! _GET free Ninja Skillz werden in K�rze verf�gbar sein...
                        </span>

                    </p>
                    <br>
                </td><!--Ende  Textspalte-->
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

        </div>
    </body>
</html>
