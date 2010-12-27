function iniYear(y){	
	//document.getElementById("currentYear").innerHTML = y;
	var year = y - (y%20);	
	for(var i=0; i<4; i++){
		//document.getElementById("year" + i).innerHTML = year;
		year++;
	}
}