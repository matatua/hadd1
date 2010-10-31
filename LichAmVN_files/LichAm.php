<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Author" content="Do Duy Ha">
<title>Lịch Âm Việt Nam</title>
<style type="text/css" charset="utf-8">
.colCN {
   float: left;
   width: 57px;
   padding: 0;
   margin: 0;
   color:red;
   cursor:pointer;
   cursor:hand;
}    
.colT2T6 {
   float: left;   
   width: 57px;
   padding: 0;
   margin: 0;
   color:black;
   cursor:pointer;
   cursor:hand;
}

.duongDis {
	text-align:left;font-size:130%;color:gray;padding-left:6px;
}

.colT7 {
   float: right;
   width: 57px;
   padding: 0;
   margin: 0;
   color: black;
   cursor:pointer;
   cursor:hand;
}
.am {text-align:right;color:blue;padding-right:6px;}

.duong {text-align:left;font-size:130%;padding-left:6px;}

.amDis {text-align:right;color:gray}

.calMonthHead {
	text-align: center;
	background: #FFFFCC;
	font-weight: bold;
}
.calTableRow {
	float: left; width:100%; margin: 0 auto;padding: 0;
}

</style></head><body>

<!--

<iframe width=800 height=600 src="amlich.php"><iframe>

-->

<!-- Hadd -->

Ngày <div id="currentDay"><?php echo date("d",time()) ?></div>
Tháng <div id="currentMonth"><?php echo date("m",time()) ?></div>
Năm <div id="currentYear"><?php echo date("Y",time())?></div>

<div style="width:400px; margin-left: auto; margin-right: auto ;">

<script language="JavaScript" src="licham_data/licham.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="licham_data/licham.css">

<div width="100%">
	<div style="float: left; width:100%; margin: 0 auto;padding: 0;">
		<div class="colCN calMonthHead">CN</div>
		<div class="colT2T6 calMonthHead">Hai</div>
		<div class="colT2T6 calMonthHead">Ba</div>
		<div class="colT2T6 calMonthHead">Tư</div>
		<div class="colT2T6 calMonthHead">Năm</div>
		<div class="colT2T6 calMonthHead">Sáu</div>    
		<div class="colT7 calMonthHead">Bảy</div>
	</div>
	<div class="calTableRow">
		<div id="cell0" class="colCN" onclick="selectDay(0);" ><div class="duong" id="duong0"></div><div class="am" id="am0"></div></div>
		<div id="cell1" class="colT2T6" onclick="selectDay(1);"><div class="duong" id="duong1"></div><div class="am" id="am1"></div></div>
		<div id="cell2" class="colT2T6" onclick="selectDay(2);"><div class="duong" id="duong2"></div><div class="am" id="am2"></div></div>
		<div id="cell3" class="colT2T6" onclick="selectDay(3);"><div class="duong" id="duong3"></div><div class="am" id="am3"></div></div>
		<div id="cell4" class="colT2T6" onclick="selectDay(4);"><div class="duong" id="duong4"></div><div class="am" id="am4"></div></div>
		<div id="cell5" class="colT2T6" onclick="selectDay(5);"><div class="duong" id="duong5"></div><div class="am" id="am5"></div></div>
		<div id="cell6" class="colT7" onclick="selectDay(6);"><div class="duong" id="duong6"></div><div class="am" id="am6"></div></div>		
	</div>
	<div style="width:100%; margin: 0 auto;padding: 0;">
		<div id="cell7" class="colCN" onclick="selectDay(7);"><div class="duong" id="duong7"></div><div class="am" id="am7"></div></div>		
		<div id="cell8" class="colT2T6" onclick="selectDay(8);"><div class="duong" id="duong8"></div><div class="am" id="am8"></div></div>
		<div id="cell9" class="colT2T6" onclick="selectDay(9);"><div class="duong" id="duong9"></div><div class="am" id="am9"></div></div>
		<div id="cell10" class="colT2T6" onclick="selectDay(10);"><div class="duong" id="duong10"></div><div class="am" id="am10"></div></div>
		<div id="cell11" class="colT2T6" onclick="selectDay(11);"><div class="duong" id="duong11"></div><div class="am" id="am11"></div></div>
		<div id="cell12" class="colT2T6" onclick="selectDay(12);"><div class="duong" id="duong12"></div><div class="am" id="am12"></div></div>
		<div id="cell13" class="colT7" onclick="selectDay(13);"><div class="duong" id="duong13"></div><div class="am" id="am13"></div></div>
	</div>
	<div class="calTableRow">
		<div id="cell14" class="colCN" onclick="selectDay(14);" ><div class="duong" id="duong14"></div><div class="am" id="am14"></div></div>
		<div id="cell15" class="colT2T6" onclick="selectDay(15);"><div class="duong" id="duong15"></div><div class="am" id="am15"></div></div>
		<div id="cell16" class="colT2T6" onclick="selectDay(16);"><div class="duong" id="duong16"></div><div class="am" id="am16"></div></div>
		<div id="cell17" class="colT2T6" onclick="selectDay(17);"><div class="duong" id="duong17"></div><div class="am" id="am17"></div></div>
		<div id="cell18" class="colT2T6" onclick="selectDay(18);"><div class="duong" id="duong18"></div><div class="am" id="am18"></div></div>
		<div id="cell19" class="colT2T6" onclick="selectDay(19);"><div class="duong" id="duong19"></div><div class="am" id="am19"></div></div>
		<div id="cell20" class="colT7" onclick="selectDay(20);"><div class="duong" id="duong20"></div><div class="am" id="am20"></div></div>		
	</div>
		<div class="calTableRow">
		<div id="cell21" class="colCN" onclick="selectDay(21);" ><div class="duong" id="duong21"></div><div class="am" id="am21"></div></div>
		<div id="cell22" class="colT2T6" onclick="selectDay(22);"><div class="duong" id="duong22"></div><div class="am" id="am22"></div></div>
		<div id="cell23" class="colT2T6" onclick="selectDay(23);"><div class="duong" id="duong23"></div><div class="am" id="am23"></div></div>
		<div id="cell24" class="colT2T6" onclick="selectDay(24);"><div class="duong" id="duong24"></div><div class="am" id="am24"></div></div>
		<div id="cell25" class="colT2T6" onclick="selectDay(25);"><div class="duong" id="duong25"></div><div class="am" id="am25"></div></div>
		<div id="cell26" class="colT2T6" onclick="selectDay(26);"><div class="duong" id="duong26"></div><div class="am" id="am26"></div></div>
		<div id="cell27" class="colT7" onclick="selectDay(27);"><div class="duong" id="duong27"></div><div class="am" id="am27"></div></div>		
	</div>
		<div class="calTableRow">
		<div id="cell28" class="colCN" onclick="selectDay(28);" ><div class="duong" id="duong28"></div><div class="am" id="am28"></div></div>
		<div id="cell29" class="colT2T6" onclick="selectDay(29);"><div class="duong" id="duong29"></div><div class="am" id="am29"></div></div>
		<div id="cell30" class="colT2T6" onclick="selectDay(30);"><div class="duong" id="duong30"></div><div class="am" id="am30"></div></div>
		<div id="cell31" class="colT2T6" onclick="selectDay(31);"><div class="duong" id="duong31"></div><div class="am" id="am31"></div></div>
		<div id="cell32" class="colT2T6" onclick="selectDay(32);"><div class="duong" id="duong32"></div><div class="am" id="am32"></div></div>
		<div id="cell33" class="colT2T6" onclick="selectDay(33);"><div class="duong" id="duong33"></div><div class="am" id="am33"></div></div>
		<div id="cell34" class="colT7" onclick="selectDay(34);"><div class="duong" id="duong34"></div><div class="am" id="am34"></div></div>		
	</div>
		<div class="calTableRow">
		<div id="cell35" class="colCN" onclick="selectDay(35);" ><div class="duong" id="duong35"></div><div class="am" id="am35"></div></div>
		<div id="cell36" class="colT2T6" onclick="selectDay(36);"><div class="duong" id="duong36"></div><div class="am" id="am36"></div></div>
		<div id="cell37" class="colT2T6" onclick="selectDay(37);"><div class="duong" id="duong37"></div><div class="am" id="am37"></div></div>
		<div id="cell38" class="colT2T6" onclick="selectDay(38);"><div class="duong" id="duong38"></div><div class="am" id="am38"></div></div>
		<div id="cell39" class="colT2T6" onclick="selectDay(39);"><div class="duong" id="duong39"></div><div class="am" id="am39"></div></div>
		<div id="cell40" class="colT2T6" onclick="selectDay(40);"><div class="duong" id="duong40"></div><div class="am" id="am40"></div></div>
		<div id="cell41" class="colT7" onclick="selectDay(41);"><div class="duong" id="duong41"></div><div class="am" id="am41"></div></div>		
	</div>
	


</div>
</div>
<script language="JavaScript" type="text/javascript">	
	var currentDay = INT(document.getElementById("currentDay").innerHTML);
	var currentMonth = INT(document.getElementById("currentMonth").innerHTML);
	var currentYear = INT(document.getElementById("currentYear").innerHTML);
	
	loadNewMonth(currentDay,currentMonth,currentYear);	
</script>

</body></html>