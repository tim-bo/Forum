<?php

try {
    # Connection zur Database bzw. DatabaseFw herstellen
    $dbserver = 'localhost';
    $dbusername = 'forumuser';
    $dbpassword = '123456Hh';
    $dbname = 'fknforumdb';
    #mysql_connect return false if conn fails...    
    $dblink = mysql_connect($dbserver, $dbusername, $dbpassword);
    if (!$dblink)
        die("No Database!" . mysql_error());
    mysql_select_db($dbname) or die("No Shema" . mysql_error());
} catch (PDOException $e) {
    print "Error, beim Verbindungsaufbau per mysql!: " . $e->getMessage() . "<br/>";
    die();
}
?>
