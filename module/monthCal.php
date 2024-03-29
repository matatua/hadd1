﻿<div style="float:left; width:50%;">	
	<div class="calTableHeadRow" >
		<div class="colCN calMonthHead">CN</div>
		<div class="colT2T6 calMonthHead">Hai</div>
		<div class="colT2T6 calMonthHead">Ba</div>
		<div class="colT2T6 calMonthHead">Tư</div>
		<div class="colT2T6 calMonthHead">Năm</div>
		<div class="colT2T6 calMonthHead">Sáu</div>    
		<div class="colT7 calMonthHead">Bảy</div>
	</div>
<?php 	
	$CURRENT_DD = date("d",time());
	$CURRENT_MM = date("m",time());
	$CURRENT_YY = date("Y",time());
	$CURRENT_HH = date("H",time());
	$dd = $_GET["dd"];
	if($dd == '')
		$dd = $CURRENT_DD;
	
	$mm = $_GET["mm"];
	if($mm == '')
		$mm = $CURRENT_MM;
	
	$yy = $_GET["yy"];
	if($yy == '')
		$yy = $CURRENT_YY;	

function getThu($i){
	$thu = array(
	   'Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư',
	   'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'
	);	
	return $thu[$i];
}

function getThang($i){	
	$thang = array('Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
				   'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai');
	return $thang[$i-1];
}
function getThangAm($i){
	$THANG_AM = array('Tháng Giêng', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
				   'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Chạp');
	return $THANG_AM[$i-1];
}
function getCan($i){
	$CAN = array('Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu' , 'Kỷ', 'Canh', 'Tân', 'Nhâm', 'Quý');
	return $CAN[$i];
}
function getChi($i) {
	$CHI = array('Tí', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tị', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất', 'Hợi');
	return $CHI[$i];
}
class LunarDate {
public function __construct($dd, $mm, $yy, $leap, $jd, $mLenght) {
	$this->day = $dd;
	$this->month = $mm;
	$this->year = $yy;
	$this->leap = $leap;
	$this->jd = $jd;
	$this->monthLenght = $mLenght;
}
}

function decodeLunarYear($yy, $k) {
	
	$monthLengths = array(29, 30);
	$regularMonths = array(12);
	$offsetOfTet = $k >> 17;
	$leapMonth = $k & 0xf;
	$index = $k >> 16 & 0x1;
	$leapMonthLength = $monthLengths[$index];
	$solarNY = jdn(1, 1, $yy);
	$currentJD = $solarNY+$offsetOfTet;
	$j = $k >> 4;
	for($i = 0; $i < 12; $i++) {
		$regularMonths[12 - $i - 1] = $monthLengths[$j & 0x1];
		$j >>= 1;
	}
	$ly = array();
	if ($leapMonth == 0) {
		for($mm = 1; $mm <= 12; $mm++) {
			array_push($ly, new LunarDate(1, $mm, $yy, 0, $currentJD,$regularMonths[$mm-1]));
			$currentJD += $regularMonths[$mm-1];
		}
	} else {
		for($mm = 1; $mm <= $leapMonth; $mm++) {
			array_push($ly, new LunarDate(1, $mm, $yy, 0, $currentJD, $regularMonths[$mm-1]));
			$currentJD += $regularMonths[$mm-1];
		}
		array_push($ly,new LunarDate(1, $leapMonth, $yy, 1, $currentJD, $leapMonthLength));
		$currentJD += $leapMonthLength;
		for($mm = $leapMonth+1; $mm <= 12; $mm++) {
			array_push($ly,new LunarDate(1, $mm, $yy, 0, $currentJD, $regularMonths[$mm-1]));
			$currentJD += $regularMonths[$mm-1];
		}
	}
	return $ly;
}

function getYearInfo($yyyy) {
	$TK19 = array(
		0x30baa3, 0x56ab50, 0x422ba0, 0x2cab61, 0x52a370, 0x3c51e8, 0x60d160, 0x4ae4b0, 0x376926, 0x58daa0,
		0x445b50, 0x3116d2, 0x562ae0, 0x3ea2e0, 0x28e2d2, 0x4ec950, 0x38d556, 0x5cb520, 0x46b690, 0x325da4,
		0x5855d0, 0x4225d0, 0x2ca5b3, 0x52a2b0, 0x3da8b7, 0x60a950, 0x4ab4a0, 0x35b2a5, 0x5aad50, 0x4455b0,
		0x302b74, 0x562570, 0x4052f9, 0x6452b0, 0x4e6950, 0x386d56, 0x5e5aa0, 0x46ab50, 0x3256d4, 0x584ae0,
		0x42a570, 0x2d4553, 0x50d2a0, 0x3be8a7, 0x60d550, 0x4a5aa0, 0x34ada5, 0x5a95d0, 0x464ae0, 0x2eaab4,
		0x54a4d0, 0x3ed2b8, 0x64b290, 0x4cb550, 0x385757, 0x5e2da0, 0x4895d0, 0x324d75, 0x5849b0, 0x42a4b0,
		0x2da4b3, 0x506a90, 0x3aad98, 0x606b50, 0x4c2b60, 0x359365, 0x5a9370, 0x464970, 0x306964, 0x52e4a0,
		0x3cea6a, 0x62da90, 0x4e5ad0, 0x392ad6, 0x5e2ae0, 0x4892e0, 0x32cad5, 0x56c950, 0x40d4a0, 0x2bd4a3,
		0x50b690, 0x3a57a7, 0x6055b0, 0x4c25d0, 0x3695b5, 0x5a92b0, 0x44a950, 0x2ed954, 0x54b4a0, 0x3cb550,
		0x286b52, 0x4e55b0, 0x3a2776, 0x5e2570, 0x4852b0, 0x32aaa5, 0x56e950, 0x406aa0, 0x2abaa3, 0x50ab50
	); /* Years 2000-2099 */

	$TK20 = array(
		0x3c4bd8, 0x624ae0, 0x4ca570, 0x3854d5, 0x5cd260, 0x44d950, 0x315554, 0x5656a0, 0x409ad0, 0x2a55d2,
		0x504ae0, 0x3aa5b6, 0x60a4d0, 0x48d250, 0x33d255, 0x58b540, 0x42d6a0, 0x2cada2, 0x5295b0, 0x3f4977,
		0x644970, 0x4ca4b0, 0x36b4b5, 0x5c6a50, 0x466d50, 0x312b54, 0x562b60, 0x409570, 0x2c52f2, 0x504970,
		0x3a6566, 0x5ed4a0, 0x48ea50, 0x336a95, 0x585ad0, 0x442b60, 0x2f86e3, 0x5292e0, 0x3dc8d7, 0x62c950,
		0x4cd4a0, 0x35d8a6, 0x5ab550, 0x4656a0, 0x31a5b4, 0x5625d0, 0x4092d0, 0x2ad2b2, 0x50a950, 0x38b557,
		0x5e6ca0, 0x48b550, 0x355355, 0x584da0, 0x42a5b0, 0x2f4573, 0x5452b0, 0x3ca9a8, 0x60e950, 0x4c6aa0,
		0x36aea6, 0x5aab50, 0x464b60, 0x30aae4, 0x56a570, 0x405260, 0x28f263, 0x4ed940, 0x38db47, 0x5cd6a0,
		0x4896d0, 0x344dd5, 0x5a4ad0, 0x42a4d0, 0x2cd4b4, 0x52b250, 0x3cd558, 0x60b540, 0x4ab5a0, 0x3755a6,
		0x5c95b0, 0x4649b0, 0x30a974, 0x56a4b0, 0x40aa50, 0x29aa52, 0x4e6d20, 0x39ad47, 0x5eab60, 0x489370,
		0x344af5, 0x5a4970, 0x4464b0, 0x2c74a3, 0x50ea50, 0x3d6a58, 0x6256a0, 0x4aaad0, 0x3696d5, 0x5c92e0
	); /* Years 1900-1999 */

	$TK21 = array(
		0x46c960, 0x2ed954, 0x54d4a0, 0x3eda50, 0x2a7552, 0x4e56a0, 0x38a7a7, 0x5ea5d0, 0x4a92b0, 0x32aab5,
		0x58a950, 0x42b4a0, 0x2cbaa4, 0x50ad50, 0x3c55d9, 0x624ba0, 0x4ca5b0, 0x375176, 0x5c5270, 0x466930,
		0x307934, 0x546aa0, 0x3ead50, 0x2a5b52, 0x504b60, 0x38a6e6, 0x5ea4e0, 0x48d260, 0x32ea65, 0x56d520,
		0x40daa0, 0x2d56a3, 0x5256d0, 0x3c4afb, 0x6249d0, 0x4ca4d0, 0x37d0b6, 0x5ab250, 0x44b520, 0x2edd25,
		0x54b5a0, 0x3e55d0, 0x2a55b2, 0x5049b0, 0x3aa577, 0x5ea4b0, 0x48aa50, 0x33b255, 0x586d20, 0x40ad60,
		0x2d4b63, 0x525370, 0x3e49e8, 0x60c970, 0x4c54b0, 0x3768a6, 0x5ada50, 0x445aa0, 0x2fa6a4, 0x54aad0,
		0x4052e0, 0x28d2e3, 0x4ec950, 0x38d557, 0x5ed4a0, 0x46d950, 0x325d55, 0x5856a0, 0x42a6d0, 0x2c55d4,
		0x5252b0, 0x3ca9b8, 0x62a930, 0x4ab490, 0x34b6a6, 0x5aad50, 0x4655a0, 0x2eab64, 0x54a570, 0x4052b0,
		0x2ab173, 0x4e6930, 0x386b37, 0x5e6aa0, 0x48ad50, 0x332ad5, 0x582b60, 0x42a570, 0x2e52e4, 0x50d160,
		0x3ae958, 0x60d520, 0x4ada90, 0x355aa6, 0x5a56d0, 0x462ae0, 0x30a9d4, 0x54a2d0, 0x3ed150, 0x28e952
	); /* Years 2000-2099 */
	$TK22 = array(
		0x4eb520, 0x38d727, 0x5eada0, 0x4a55b0, 0x362db5, 0x5a45b0, 0x44a2b0, 0x2eb2b4, 0x54a950, 0x3cb559,
		0x626b20, 0x4cad50, 0x385766, 0x5c5370, 0x484570, 0x326574, 0x5852b0, 0x406950, 0x2a7953, 0x505aa0,
		0x3baaa7, 0x5ea6d0, 0x4a4ae0, 0x35a2e5, 0x5aa550, 0x42d2a0, 0x2de2a4, 0x52d550, 0x3e5abb, 0x6256a0,
		0x4c96d0, 0x3949b6, 0x5e4ab0, 0x46a8d0, 0x30d4b5, 0x56b290, 0x40b550, 0x2a6d52, 0x504da0, 0x3b9567,
		0x609570, 0x4a49b0, 0x34a975, 0x5a64b0, 0x446a90, 0x2cba94, 0x526b50, 0x3e2b60, 0x28ab61, 0x4c9570,
		0x384ae6, 0x5cd160, 0x46e4a0, 0x2eed25, 0x54da90, 0x405b50, 0x2c36d3, 0x502ae0, 0x3a93d7, 0x6092d0,
		0x4ac950, 0x32d556, 0x58b4a0, 0x42b690, 0x2e5d94, 0x5255b0, 0x3e25fa, 0x6425b0, 0x4e92b0, 0x36aab6,
		0x5c6950, 0x4674a0, 0x31b2a5, 0x54ad50, 0x4055a0, 0x2aab73, 0x522570, 0x3a5377, 0x6052b0, 0x4a6950,
		0x346d56, 0x585aa0, 0x42ab50, 0x2e56d4, 0x544ae0, 0x3ca570, 0x2864d2, 0x4cd260, 0x36eaa6, 0x5ad550,
		0x465aa0, 0x30ada5, 0x5695d0, 0x404ad0, 0x2aa9b3, 0x50a4d0, 0x3ad2b7, 0x5eb250, 0x48b540, 0x33d556
	); /* Years 2100-2199 */
	
	if ($yyyy < 1900) {
		$temp = $yyyy - 1800;
		$yearCode = $TK19[$temp];
	} else if ($yyyy < 2000) {
		$temp = $yyyy - 1900;
		$yearCode = $TK20[$temp];
	} else if ($yyyy < 2100) {
		$temp = $yyyy - 2000;
		$yearCode = $TK21[$temp];
	} else {
		$temp = $yyyy - 2100;
		$yearCode = $TK22[$temp];
	}	
	return decodeLunarYear($yyyy, $yearCode);
}

function findLunarDate($jd, $ly) {
	$FIRST_DAY = jdn(25, 1, 1800); // Tet am lich 1800
	$LAST_DAY = jdn(31, 12, 2199);	

	if ($jd > $LAST_DAY || $jd < $FIRST_DAY || $ly[0]->jd > $jd) {
		return new LunarDate(0, 0, 0, 0, $jd, 0);
	}
	$i = sizeof($ly)-1;
	while ($jd < $ly[$i]->jd) {
		$i--;
	};
	$off = $jd - $ly[$i]->jd;
	$ret = new LunarDate($ly[$i]->day+$off, $ly[$i]->month, $ly[$i]->year, $ly[$i]->leap, $jd, $ly[$i]->monthLenght);
	return $ret;
}

/* Discard the fractional part of a number, e.g., INT(3.2) = 3 */
function INT($d) {
	return floor($d);
}

 function jdn($dd, $mm, $yy) {
	$a = INT((14 - $mm) / 12);
	$y = $yy+4800-$a;
	$m = $mm+12*$a-3;
	$jd = $dd + INT((153*$m+2)/5) + 365*$y + INT($y/4) - INT($y/100) + INT($y/400) - 32045;
	return $jd;
}

function jdn2day($jd) {	
	$Z = $jd;
	if ($Z < 2299161) {
	  $A = $Z;
	} else {
	  $alpha = INT(($Z-1867216.25)/36524.25);
	  $A = $Z + 1 + $alpha - INT($alpha/4);
	}
	$B = $A + 1524;
	$C = INT( ($B-122.1)/365.25);
	$D = INT( 365.25*$C );
	$E = INT( ($B-$D)/30.6001 );	
	return INT($B - $D - INT(30.6001*$E));	
}
function layNgayDuongNgayAm($dd,$mm,$yy) {
	$jdn = jdn($dd,$mm,$yy);	
	$ngayDuongAm = getThu(($jdn+1)%7);
	$ngayDuongAm .= ", Ngày ".$dd;	
	$ngayDuongAm .= " ".getThang($mm);
	$ngayDuongAm .= ", ".$yy;
	return $ngayDuongAm;
}	
	
	$jd1 = jdn(1,$mm,$yy);		
	$ly1 = getYearInfo($yy);
	$tet1 = $ly1[0]->jd;
	
	if ($mm < 12) {
		$mm1 = $mm + 1;
		$yy1 = $yy;
	} else {
		$mm1 = 1;
		$yy1 = $yy + 1;
	}
	$jd2 = jdn(1, $mm1, $yy1);
	$dMonthLenght = $jd2 - $jd1;	
	$startId = ($jd1+1)%7;
	//putInCell(startId,1,2);
	
	$duong1=0;
	$duong2=0;
	$duong3=0;
	$duong1 = jdn2day($jd1 - $startId);
	
	$lDates = array();	
	if ($tet1 <= $jd1) { /* tet(yy) = tet1 < jd1 < jd2 <= 1.1.(yy+1) < tet(yy+1) */
		for ($i = $jd1; $i < $jd2; $i++) {				
			array_push($lDates, findLunarDate($i, $ly1));
		}
	} else if ($jd1 < $tet1 && $jd2 < $tet1) { /* tet(yy-1) < jd1 < jd2 < tet1 = tet(yy) */
		$ly1 = getYearInfo($yy - 1);
		for ($i = $jd1; $i < $jd2; $i++) {
			array_push($lDates,findLunarDate($i, $ly1));
		}
	} else if ($jd1 < $tet1 && $tet1 <= $jd2) { /* tet(yy-1) < jd1 < tet1 <= jd2 < tet(yy+1) */
		$ly1 = getYearInfo($yy - 1);
		$ly2 = getYearInfo($yy);
		for ($i = $jd1; $i < $tet1; $i++) {
			array_push($lDates,findLunarDate($i, $ly1));
		}
		for ($i = $tet1; $i < $jd2; $i++) {
			array_push($lDates, findLunarDate($i, $ly2));
		}
	}
	
	
	$colClass = "colT2T6";
	$calTable = "";
	$row = 0;
	$col = 0;
	$duong = 0;
	$jdnLC = jdn($dd,$mm,$yy);
	$thuLC = getThu(($jdnLC+1)%7);
	$ly1 = getYearInfo($yy);
	$lDateLC = findLunarDate($jdnLC,$ly1);
	$startCalTableRow = "<div class='calTableRow'>";	
	for($row = 0; $row < 6; $row++){
		$calTable .= $startCalTableRow;
		for($col = 0; $col < 7; $col ++){
			if($col == 0) {
				$colClass = "colCN";
			} else if($col == 6) {
				$colClass = "colT7";
			} else {
				$colClass = "colT2T6";
			}
			$index = $row * 7 + $col;
			$disableClass = 'Dis';
			$lDay = '';
			$style1 = '';
			$function = '';
			if ($index < $startId){
				$duong = $duong1;
				$duong1++;
				$function = "goToPreviousMonth(".$duong.",".$mm.",".$yy.");";
			} else if($duong2<$dMonthLenght){
				$lunarIndex = $duong2;
				$ld = $lDates[$lunarIndex];
				$lDay = $ld->day;
				if($lDay == '1'){
					//$nhuan = ($leap == 1) ? ' nhu\u1EADn' : '';
					$lDay .= "/".$ld->month.($ld->monthLenght == 30 ? 'Đ' : 'T');
				}
				$duong2++;
				$duong = $duong2;
				$disableClass = '';	
				$parameter = $index.",".$duong.",".$ld->jd.",".$ld->day.",".$ld->month.",".$ld->year.",".$ld->leap.",".$ld->monthLenght;
				$function = "selectDay(".$parameter.");";
				if($duong2==$dd){
					$style1 = "style='background: #FFF000;'";
					$hiddenPara = "<input type='hidden' value='".$parameter."' name='hiddenPara' id='hiddenPara' />";
				}
			} else {
				$duong3++;
				$duong = $duong3;
				$function = "goToNextMonth(".$duong.",".$mm.",".$yy.");";
			}
			$calTable .= "<div id='cell".$index."' class='".$colClass."' onclick='".$function."' ".$style1."><div class='duong".$disableClass."' id='duong".$index."'>".$duong."</div><div class='am' id='am".$index."'>".$lDay."</div></div>";
		}
		$calTable .= "</div>";
	}
	$calTable.=$startCalTableRow."<button type=\"button\" onClick=\"javascript:goToPreviousMonth(1,".$mm.",".$yy.")\">Tháng trước</button><select id=\"cThang\" onChange=\"javascript:selectMonth();\">";
	for($i=1; $i<13;$i++){
		$s = "SELECTED";
		if($i!=$mm)
			$s = "";
		$calTable.= "<option value=\"".$i."\" ".$s." >".getThang($i)."</option>";
	}		
	$calTable.="</select><input name=\"yearLC\" id=\"yearLCID\" type=\"text\" value=\"".$CURRENT_YY."\" maxlength=\"4\" style=\"width:90px;\"/><button type=\"button\" onClick=\"javascript:goToNextMonth(1,".$mm.",".$yy.")\" style=\"float:right;\">Tháng sau</button></div>";
	$calTable.=$startCalTableRow."<a title=\"Xem ngày hôm nay\" style=\"font-weight: bold;\" href='javascript:goTo(".$CURRENT_DD.",".$CURRENT_MM.",".$CURRENT_YY.");'>Hôm nay: </a></br>".layNgayDuongNgayAm($CURRENT_DD,$CURRENT_MM,$CURRENT_YY)."</div>";
	echo $calTable;	
	echo $hiddenPara;
?>
</div>
<div style="float:right; width:50%;" >
<div style="float:left;width:380px;text-align:center;" >
	<div id="thangDuongId" style="height:50px;font-size:20pt;font-weight:bold;color:blue;" ><?php echo getThang($mm); ?></div>
	<div id="ngayDuongId" style="height:100px;font-size:50pt;font-weight:bold;"><?php echo $dd; ?></div>
	<div id="thuId" style="height:20px;font-size:18pt;"><?php echo $thuLC; ?></div>	
</div>
<div id="namDuongId" style="float:right;width: auto;height: auto;font-size:15pt;" >
<?php
	for($i=0;$i<strlen($yy);$i++) {
		echo $yy{$i}."</br>";
	}
?>
</div>
<div style="float:left;width:100%;padding-left:30px;" >
	<div id="thangam" style="float:left;width:60%;text-align:left;" >		
		<?php echo getThangAm($lDateLC->month).($lDateLC->monthLenght == 30 ? '(Đủ)' : '(Thiếu)'); ?>
	</div>
	<div id="namam" style="float:right;width:40%;text-align:right;" >		
		Năm <?php echo getCan(($lDateLC->year+6)%10)." ".getChi(($lDateLC->year+8)%12);?>
	</div>
</div>
<div style="float:left;width:40%;text-align:left;padding-left:30px;" >
	<div id="ngayamId" style="width:60%;font-size:25pt;text-align:center;">
		<?php echo $lDateLC->day; ?>
	</div>
	<div style="width:100%;" >
		<?php echo "Giờ ".$CURRENT_HH; ?>
	</div>
	<div id="canchingay" style="width:100%;" >
		Ngày <?php echo getCan(($lDateLC->jd + 9) % 10)." ".getChi(($lDateLC->jd+1)%12); ?>
	</div>
</div>
<div style="float:left;width:100%;text-align:left;padding-left:30px;" >
	<div id="canchithang" style="float:left;width:40%;text-align:left;" >
		Tháng <?php echo getCan(($lDateLC->year*12 + $lDateLC->month + 3) % 10)." ".getChi(($lDateLC->month+1)%12);?>
	</div>
	<div style="float:right;width:40%;text-align:right;" >
		
	</div>
</div>
</div>
	
</div>