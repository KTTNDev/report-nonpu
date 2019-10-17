<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Repair = "localhost";
$database_Repair = "project_db_r";
$username_Repair = "root";
$password_Repair = "";
$Repair = mysql_pconnect($hostname_Repair, $username_Repair, $password_Repair) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8"); 
error_reporting( error_reporting() & ~E_NOTICE );
?>