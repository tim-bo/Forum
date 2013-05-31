<?php
    # Connection zur Database bzw. DatabaseFw herstellen
    $dbserver   = 'localhost';
    $dbusername = 'forumuser';
    $dbpassword = '123456Hh';
    $dbname     = 'fknforumdb';
    #mysql_connect return false if conn fails...    
    $dblink = mysql_connect($dbserver, $dbusername, $dbpassword);
    if( ! $dblink ) die ("No Database!" . mysql_error() );
    mysql_select_db($dbname) or die ("No Shema" . mysql_error());

	/*class MyPDO extends PDO
{
     public function __construct($file = 'my_setting.ini')
     {
         if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
         
         $dns = $settings['database']['driver'] .
         ':host=' . $settings['database']['host'] .
         ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
         ';dbname=' . $settings['database']['schema'];
         
         parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
     }
 }*/
             
?>
