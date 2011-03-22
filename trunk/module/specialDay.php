<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<? require_once "../config.php" ?>
</head>
<body>
<?php
$sql="select * from "."SpecialDay";// where day=".$day." and month=".$month." and !isLunarDay";
$result=mysql_query($sql);
 while($info = mysql_fetch_array( $result)) 
 { 
 echo $info['description'] ." (".$info['day']."/".$info['month'].")"; 
}

?>	
</body>
</html>