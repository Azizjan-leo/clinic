<?php
	if($_SESSION['class'] != 2)print "<script type='text/javascript'>window.location.href='../index.php'</script>";
	
	// LIST OF ALL PATIENTS OF THE CLINIC
	
	if($_GET[patient] == 'all'){
			$Emp_ID = $_SESSION[userData][Emp_ID];
			print "<script> var diagnoses = []; </script>
			<div id='patientTop'>
				<div id='patientSearchType'>
					<div id='typeIndicator'>All</div>
				</div>
				<div id='patientSearchResCount'>
					Total: 0
				</div>
			</div>
			<div id='patientSearchAction'>
				<div id='patientSearchResult'>
					patientSearchResult</br>
					<script>
					search();
					</script>
				</div>
				<div id='patientSearchMenu'>
					<div id='searchSettingsDiv'>
						<fieldset name='genderFieldset'>
							<legend>Gender</legend>
							<input type='checkbox' class='genderCheckBox' id='Male' name='unchecked' value='1' onclick='genderSelected(this)'><label for='Male'>Men</label></br>
							<input type='checkbox' class='genderCheckBox' id='Female' name='unchecked' value='0' onclick='genderSelected(this)'><label for='Female'>Women</label></br>
						</fieldset>
						
						<fieldset name='relationFieldset'>
							<legend>I'm</legend>
							<input type='checkbox' class='relationCheckBox' id='Treating' name='unchecked' value='2' onclick='relationSelected(this)'><label for='Treating'>treating</label></br>
							<input type='checkbox' class='relationCheckBox' id='Advising' name='unchecked' value='1' onclick='relationSelected(this)'><label for='Advising'>advising</label></br>
						</fieldset>
						
						<fieldset name='relationFieldset'>
							<legend>Virus</legend>
							<input type='checkbox' class='virusCheckBox' id='true' name='unchecked' value='1' onclick='virus = (this.checked ? 1 : null);search();'><label for='true'>virus</label>
						</fieldset>
						<div id='diagnosisSearchField'>
							<textarea id='selectedDiagnosisList' name='diagnosisSearch' rows='5' cols='18'></textarea>
							<select id='narrowSelect' multiple='multiple' name='selectingDiagnosis[]' onclick='addDiagnosis()'>";
								$sql = $mysqli->query("SELECT `ID`, `Name` FROM `Diagnosis`"); while ($row = $sql->fetch_array(MYSQLI_NUM)){ echo "<option value='$row[0]*$row[1]'>" . $row[1] . "</option>";} print "
							</select>						
						</div>
						<br>
						<button type='button' onclick='resetAll(); search();'>ALL</button>
					</div>
				</div>
			</div>
			";
			print "
				<script>
					var gender;
					var relation;
					var virus;
					
					function addDiagnosis(){
						var selectedDiagnosis = document.getElementById('narrowSelect').value;
						var res = selectedDiagnosis.split('*');
						if( document.getElementById('selectedDiagnosisList').value )
							
							document.getElementById('selectedDiagnosisList').value += ' | ' + res[1];
						else{
							document.getElementById('selectedDiagnosisList').value = res[1];
						}
						diagnoses.push(res[0]);
						search();
					}
					function isInArray(value, array) {
					  return array.indexOf(value) > -1;
					}
					 function resetAll()
					 {
						 gender=relation=virus=null;
						
						var d = document.getElementById('narrowSelect');
						var e = document.getElementById('narrowSelect');
						var strUser = e.options[e.selectedIndex];
						strUser.className = 'white';
						//document.getElementById('narrowSelect').style.color = 'red';
						
					   var checkboxes = new Array(); 
					   checkboxes = document.getElementsByTagName('input');
					 
					   for (var i=0; i<checkboxes.length; i++)  {
						 if (checkboxes[i].type == 'checkbox')   {
						   checkboxes[i].checked = false;
						 }
					   }
					   document.getElementById('selectedDiagnosisList').value = ''; //Empty the input diagnoses textarea
					   diagnoses.length = 0;
					 }
					 function relationSelected(obj){
						if(obj.name == 'checked'){
							$('.relationCheckBox').prop('checked', false);
							obj.name = 'unchecked';
							relation = null;
							search();
						}
						else{
							$('.relationCheckBox').prop('checked', false);
							$('.relationCheckBox').prop('name', 'unchecked');
							obj.checked = true;
							obj.name = 'checked';
							relation = obj.value;
							search();
						}
					 }
					 function genderSelected(obj){
						if(obj.name == 'checked'){
							$('.genderCheckbox').prop('checked', false);
							obj.name = 'unchecked';
							gender = null;
							search();
						}
						else{
							$('.genderCheckbox').prop('checked', false);
							$('.genderCheckbox').prop('name', 'unchecked');
							obj.checked = true;
							obj.name = 'checked';
							gender = obj.value;
							search();
						}
					 }
					 
					 function search(){						 
						$.post( '../phpHendlers/patientSearch.php', {gender:gender, relation:relation, Emp_ID:$Emp_ID, virus:virus, diagnoses:diagnoses},
							function (output){
								$('#patientSearchResult').html(output).show();
							}
						);
					 }
				</script>
			";
	}else{
		
	// PARTICULAR PATIENT
	
		$query = $mysqli->query("SELECT * FROM patients WHERE ID = $_GET[patient]");
		$patientData = $query->fetch_array(MYSQLI_ASSOC);
		
		print "
				<div class='patient_info'>
					<div class='patient_photo'> 
						<img src='../images/$patientData[Photo]'>
					</div>
				</div>";
				
	}
?>