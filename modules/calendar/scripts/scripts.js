function DisableSpecificDates(date) {
 
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 var day = date.getDay();
 //convert the date in to the mm-dd-yyyy format 
 //increment the month count by 1 
 //var currentdate = (m + 1) + '-' + d + '-' + y ;
	var currentdate = y + '-' + (m+1) + '-' + d;
 //check if the date belongs to disableddates array 
 for (var i = 0; i < disableddates.length; i++) {
	 //check if the current date is in disabled dates array. 
	 if ($.inArray(currentdate, disableddates) != -1 ) {return [false];}
		//else
		//{return [true];}
	}
	//disable a particular day every week
	//0 is Sunday, 1 is Monday, 2 is Tuesday , 3 is Wednesday, 4 is Thursday, 5 is Friday and 6 is Saturday.
	//return [(day != 1 && day != 2)]; - another spelling
	for (var i = 0; i < weekdays.length; i++) {
		if (day == weekdays[i]) {return [false];}
	}
	return [true];
}
 
 $(function() {
 $( "#datepicker" ).datepicker({ 
 beforeShowDay: DisableSpecificDates, //call function
 minDate: 0,  //disable past dates
	maxDate: "+6m", //period represents 6 month from today
	dateFormat: 'yy-mm-dd',
	showAnim:'slideDown'});
 });
	
$(function() {
$('#timeformatExample1').timepicker({ 'timeFormat': 'H:i', //:s
minTime: '06:00:00',
maxTime: '22:00:00',
interval: '30',
//'disableTimeRanges': 
});
});

	function test(){
		alert(str);
	}