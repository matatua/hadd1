<?php 
$host="licham.vn";
$dbname="licham_vn_n";
$dbuser="licham_v_n";
$dbpass="thanhcong";
$link=mysql_connect("$host","$dbuser", "$dbpass") or die("Khong the ket noi toi Database $host!!!").mysql_error() ;
mysql_select_db($dbname,$link);
?>
