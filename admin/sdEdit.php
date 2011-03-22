<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<? require_once "../config.php" ?>
</head>
<body>
<?php
 $id=$_GET["id"];

	$sql="select * from SpecialDay where id=".$id;
	$result=mysql_query($sql);
		
if (mysql_num_rows($result)!=0)
	{	
	$row=mysql_fetch_row($result);  
	$id = $row[0];
	$description= $row[1];
	$day= $row[2];
	$month = $row[3];
	$isLunarDay = $row[4];
	$isHoliday = $row[5];
	$historyDay = date("j-n-Y",strtotime($row[6]));
}
?>	
 <form name="sdUpdate" method="post" action="updateSd.php?id=<?=$id?>&act=update">

<table>
<tr>
	<td>id</td>
	<td><?php echo $id;?></td>
</tr>
<tr>
<td>Description</td>
<td><input name="description" type="text" style="width:500px;"  value="<?=$description?>" ></td>
</tr>
<tr>
<td>day</td>
<td><input name="day" type="text" style="width:30px;"  value="<?=$day?>" ></td>
</tr>
<tr>
<td>month</td>
<td><input name="month" type="text" style="width:30px;"  value="<?=$month?>" ></td>
</tr>
<tr>
<td>isLunarDay</td>
<td><input type="checkbox" name="isLunarDay" value="0"  title="" <?php if ($isLunarDay=='1') echo "checked"; ?>></td>
</tr>
<tr>
<td>isHoliday</td>
<td><input type="checkbox" name="isHoliday" value="0"  title="" <?php if ($isHoliday=='1') echo "checked"; ?>></td>
</tr>
<tr>
<td>historyDay</td>
<td><input name="historyDay" type="text" value="<?=$historyDay?>" ></td>
</tr>

<tr><td>
<input name="addnew" type="submit" value="Cập nhật">      
</td></tr>
</table>
</form>
</body>
</html>