<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name='description' content='LichAm.vn - Vietnamese Lunar Calendar - Lịch Âm Việt Nam'>
<meta name='keywords' content='lich am, xem lich, am lich, licham, lịch âm, âm lịch, lich duong, van nien, Lunar Calendar'>
<meta name='revisit-after' content='1 days'>
<meta name='robots' content='index, follow' />

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
.am {font-size:80%;text-align:right;color:blue;padding-right:6px;}

.duong {text-align:left;font-size:130%;padding-left:6px;}

.amDis {text-align:right;color:gray}

.calMonthHead {
	
}
.calTableRow {
	float: left; width:100%; margin: 0 auto;padding: 0;
	height: 40px;
	border-right: 1px solid #C2C2C2;
	border-left: 1px solid #C2C2C2;
	border-bottom: 1px solid #C2C2C2;
}
.calTableHeadRow{
	float: left; width:100%; margin: 0 auto;padding: 0;border: 1px solid #E6E6D0;
	text-align: center;
	background: #FFFFCC;
	font-weight: bold;	
}
</style></head><body>

<!--

<iframe width=800 height=600 src="amlich.php"><iframe>

-->

<!-- Hadd -->
<script language="JavaScript" src="http://code.jquery.com/jquery-1.4.4.js" type="text/javascript"></script>
<script language="JavaScript" src="js/cufon-yui.js" type="text/javascript"></script>
<script language="JavaScript" src="js/Snell_italic_400.font.js" type="text/javascript"></script>


<script type="text/javascript">

/***********************************************
* Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}

</script>
Lịch Âm Việt Nam

<div style="width:808px">

<script language="JavaScript" src="licham_data/licham.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="licham_data/licham.css">
	<div id="tableCal"></div>
</div>
<script language="JavaScript" type="text/javascript">		
	//ajaxpage('module/monthCal.php', 'tableCal');
	$('#tableCal').load('http://localhost/hadd1/module/monthCal.php', function() {
		selectDayByParameter($('#hiddenPara').val());
	});
	
	//replaceFont();
	//$('#tableCal').load('module/monthCal.php', function() {
	//	replaceFont();
	//});

</script>
<div style="width:808px">
	<div style="width:200px">
		<div style="width:100%">
		<div id="currentYear"></div>
		</div>
		<div style="width:100%">
			<div id="year0" style="width:25%;float:left;"></div>
			<div id="year1" style="width:25%;float:left;"></div>
			<div id="year2" style="width:25%;float:left;"></div>
			<div id="year3" style="width:25%;float:left;"></div>
		</div>
		
	</div>
</div>
<script language="JavaScript" src="licham_data/year.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">			
	iniYear(<?php echo date("Y",time()); ?>);
</script>
</body></html>