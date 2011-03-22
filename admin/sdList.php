<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<? require_once "../config.php" ?>
</head>
<body>
<a href='sdAdd.php'>Thêm mới</a></br>
<?php
for($i=1; $i<=12; $i++){
	echo "------------------------</br>";
	echo "<b>Tháng ".$i."</b></br>";
	$sql="select * from "."SpecialDay where month=".$i; //" and !isLunarDay";
	$result=mysql_query($sql);
	 while($info = mysql_fetch_array( $result)) 
	 { 
	 echo "<span ".($info['isHoliday']?"style='color:red'":'').">".$info['description'] ." (".$info['day']."/".$info['month'].") ".($info['isLunarDay']?"LUNAR_DAY":"")."  <a href='sdEdit.php?id=".$info['id']."'>Edit</a></br></span>"; 
	}
}
?>	
</body>
</html>