var divs = [document.getElementById('b1'), document.getElementById('b2')];
function hiddenShow(id, evt)
{
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