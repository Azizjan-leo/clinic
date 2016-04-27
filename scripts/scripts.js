var d = new Date();
var n = d.getMonth();
var monthCounter = 0;
var p = new Date();

function orderView($Emp_ID){
	$.post( '../parts/orderView.php', { Emp_ID: $Emp_ID},
		function (output){
			$('#orderAction').html(output).show();
		}
	);
}
// to add leading zero
function slice(str, max) {
  str = str.toString();
  return str.length < max ? slice("0" + str, max) : str;
}

function elementReload(id){
	id = "#" + id;
	$(id).load(location.href + " " + id);
}
function test($Emp_ID, $patientId, $unregVisitorId, $date, $time){
	$.post( '../phpHendlers/newOrd.php', { Emp_ID: $Emp_ID, patientId: $patientId, unregVisitorId: $unregVisitorId, date: $date, time: $time },
		function (output){
			$('#timePicker').html(output).show();
		}
	);
	orderView($Emp_ID);
	hiddenShow('b1');
}

function datePicker($Emp_ID, $patientId, $unregVisitorId){
	$.post( '../parts/forms/datePicker.php', { Emp_ID: $Emp_ID, patientId: $patientId, unregVisitorId: $unregVisitorId },
		function (output){
			$('#datePickerMain').html(output).show();
		}
	);
	onClick($Emp_ID, $patientId, $unregVisitorId, 0);
}
function UnregVisitorFormHendling(){
	$f_name = document.getElementsByClassName("Name")[0].value;
	$m_name = document.getElementsByClassName("Name")[1].value;
	$l_name = document.getElementsByClassName("Name")[2].value;
	$phone = document.getElementsByClassName("Phone")[0].value;
	$Emp_ID = document.getElementsByClassName("Name")[3].value;
	
	$.post( '../phpHendlers/forms/UnregVisitorOrd.php', { Emp_ID: $Emp_ID, f_name: $f_name, m_name: $m_name, l_name: $l_name, phone: $phone  },
		function (output){
			$('#datePickerMain').html(output).show();
		}
	);
	return false;
}

function unregVisitorForm($Emp_ID){
	$.post( '../parts/forms/unregVisitorOrdF.php', { Emp_ID: $Emp_ID },
		function (output){
			$('#datePickerMain').html(output).show();
		}
	);
}

function onClick($Emp_ID, $patientId, $unregVisitorId, $act){
	if(((monthCounter + $act) != -1) && ((monthCounter + $act) < 4)){
		monthCounter += $act;
		n += $act;
		p = new Date(p.getFullYear(), n, 01);
		n = p.getMonth();
	}
	Get($Emp_ID, $patientId, $unregVisitorId, n + 1, p.getFullYear());
}

function Get($Emp_ID, $patientId, $unregVisitorId, $month, $year){
	$('#ordConfirm').hide();
	$('#timePicker').hide();
	$.post( '../phpHendlers/datePicker.php', { Emp_ID: $Emp_ID, patientId: $patientId, unregVisitorId: $unregVisitorId, month: $month, year: $year },
		function (output){
			$('#datePicker').html(output).show();
		}
	);
}

function SelectDay($Emp_ID, $patientId, $unregVisitorId, $day, $month, $year){
	$day = slice(String($day), 2); // to add leading zero
	$('#ordConfirm:parent').hide();
	$(".dayInDatePicker").css("background-color", "white"); // cells
	$(".dayL").css({"color":"green"}); // links
	$("#"+$day).css("background-color", "green"); // choosen cell	
	$("#a"+$day).css({"color":"white"}); // choosen link
	
	$.post( '../phpHendlers/datePicker.php', { Emp_ID: $Emp_ID, patientId: $patientId, unregVisitorId: $unregVisitorId, day: $day, month: $month, year: $year },
		function (output){
			$('#timePicker').html(output).show();
		}
	);	
}

function OrdConfirm($Emp_ID, $patientId, $unregVisitorId, $date, $time){
	$(".timeTable").css("background-color", "white"); // cells
	$(".timeTableL").css({"color":"green"}); // links
	$("#"+$time).css("background-color", "green"); // choosen cell
	$("#a"+$time).css({"color":"white"}); // choosen link
	
	
	$.post( '../phpHendlers/datePicker.php', { Emp_ID: $Emp_ID, patientId: $patientId, unregVisitorId: $unregVisitorId, date: $date, time: $time },
		function (output){
			$('#ordConfirm').html(output).show();
		}
	);
}
function hiddenShow(id, evt)
{
 var divs = [document.getElementById('b1'), document.getElementById('b2')];
   var div = document.getElementById(id);
   if (div.className == 'hidden')
   {
      div.className='visible';
   } else {
      div.className='hidden';
   }
}

function choose(){
  var s1 = document.getElementById("card_number");
  var s2 = document.getElementById("first_name");
  var s3 = document.getElementById("second_name");
  var s4 = document.getElementById("middle_name");
  
  var c1 = document.getElementById("visit1");
  var c2 = document.getElementById("visit2");
  
  if(c1.checked){
   s1.disabled = true;
   s2.disabled = false;
   s3.disabled = false;
   s4.disabled = false;
  }
  else{
   s1.disabled = false;
   s2.disabled = true;
   s3.disabled = true;
   s4.disabled = true;
  }
}

function comment_button(){
 var div = document.getElementById("comments_form");
 if(div.style.display=="none"){
  div.style.display="inline";
 }
 else{
  div.style.display="none";
 }
}