<?php

# Session initialisieren
session_start();
# Session leeren
session_unset();
# Session schliessen
session_destroy();
echo "Arbeite langsam, aber zukunftsorientiert... ;-)";
header("refresh:3;url=forum.php");
# Conn beenden auch moeglich mit unset($dblink)
$dblink = null;
?>
                                                                                                                               