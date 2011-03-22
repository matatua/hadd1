<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<? require_once "../config.php" ?>
</head>
<body>
<?php
	$id=$_GET["id"];
	$act=$_GET["act"];
	
	$isLunarDay=($_POST["isLunarDay"]=="")?0:1;
	$isHoliday=($_POST["isHoliday"]=="")?0:1;
	
	if($act=="add"){
		
	} else {
		$sql2="Update SpecialDay set ";
		$sql2 .="description='".($_POST["description"])."'";
		
		$sql2 .=", day='".($_POST["day"])."'";
		$sql2 .=", month='".($_POST["month"])."'";
		$sql2 .=", isLunarDay=".$isLunarDay;
		$sql2 .=", isHoliday=".$isHoliday;
		/*
		$sql2 .=", historyDay='".($_POST["historyDay"])."'";
		*/
		$sql2 .=" where id='".($id)."'";
		
		//echo $sql2.$idc;
		$result = mysql_query($sql2);
		//mysql_close($link);
		
	}
	echo"<script language=javascript>document.location='sdList.php'</script>";

?>	
</body>
</html>