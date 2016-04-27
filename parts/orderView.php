<?
	include('../phpHendlers/connect.php');
						//print order
						$res = $mysqli->query("SELECT PatientId, UnregVisitorId, `Date`, `Time` FROM `Ord` WHERE DoctorId = '$_POST[Emp_ID]' AND `Date` >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY) ORDER by `Date`");
						while($order = $res->fetch_array(MYSQLI_ASSOC)){
							if($order[PatientId])
								$forPtr = $mysqli->query("SELECT Phone FROM patients WHERE ID = '$order[PatientId]'");
							else
								$forPtr = $mysqli->query("SELECT Phone FROM UnregVisitors WHERE Id = '$order[UnregVisitorId]'");
							$ptr = $forPtr->fetch_array(MYSQLI_ASSOC);
							print "<b>" . $order['Date']." ".date("H:i",strtotime($order['Time']))."</b> ".$ptr[Phone]."<br>";
						}
?>