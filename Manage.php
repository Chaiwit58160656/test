<?php include"Db_connect.php"; ?>
<html>
	<head>
		<title> lover </title>
		<style>
			table,th, td {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<div class="row">
			<form name="show" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
				<p>
				<label class="col-sm-4" for="Emp_id">ค้นหาพนักงาน:</label>
				<input type="text" name="Emp_id" id="Emp_id"/>
				<input name="btn_search" type="submit" value="Search">				
				</p>
			</form>
			<form name="show" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
				<label class="col-sm-4" for="Call_number">รหัสเรียกหนังสือ:</label>
				<input type="text" name="Call_number" id="Call_number"/> 
				<input name="btn_call" type="submit" value="Submit">
			</form>
		</div>
		
		<?php
		$Get_Emp = "SELECT Emp_id, Emp_fname, Emp_lname, Man_emp_id,Man_dat_borrow,Call_number,Boo_name FROM employee_
										left JOIN manage ON employee_.Emp_id = manage.Man_emp_id
										left JOIN call_number ON manage.Man_Call_id = call_number.Call_id
										Left join book_ ON call_number.Call_id =book_.Boo_Call_id where Emp_id = '".$_REQUEST['Emp_id']."' ";
		$GLOBALS[$Emp_id] = $Emp_id =  $con->real_escape_string($_REQUEST['Emp_id']);			
		$result = $con->query($Get_Emp);
			if($_REQUEST['btn_search']=="Search")
			{	
						
						if($result->num_rows>0){ 
							echo "<table><tr><th>emp id</th><th>name</th><th>Date borrow</th><th>Call Number</th><th>name borrow</th></tr>";
							echo "<br>";
							// while($row["Man_emp_id"] == $row->Emp_id){
								// echo "id: " . $row["Emp_id"]. " - Name: " . $row["Emp_fname"]. " " . $row["Emp_lname"] ;
							// }
							//data output of each row
							while($row = $result->fetch_assoc()) {	
								//if($row["Man_emp_id"] == '40495'){ //test if else
							echo 	"<tr><td>" .$row["Emp_fname"]. "  " . $row["Emp_lname"]. "</td><td>" .$row["Man_emp_id"]. "</td>
									<td>" .$row["Man_dat_borrow"]. "</td><td>" .$row["Call_number"]. "</td><td>" .$row["Boo_name"]. "</td></tr>";		
							}
							echo "</table>";
						} else{

						   echo "ERROR: Could not able to execute $sql. " . $con->error;

						}
					
						$con->close(); 
					}
					
					
					else if($_REQUEST['btn_call']=="Submit")						
					{
								
						$Get_Man = "SELECT Man_Call_id,Emp_fname,Emp_lname,Man_Stab_id,Man_emp_id,Man_dat_borrow,Call_number,CONCAT(COALESCE(Aud_name, ''), COALESCE(Mag_name, ''), COALESCE(Boo_name, '')) AS name
									FROM manage
									left JOIN call_number ON manage.Man_Call_id = call_number.Call_id
									left JOIN book_ ON call_number.Call_id = book_.Boo_id
									left JOIN employee_ ON manage.Man_emp_id = employee_.Emp_id
									left JOIN audiovisual_ ON call_number.Call_id = audiovisual_.Aud_Call_id
									left join magzine_ ON call_number.Call_id = magzine_.Mag_Call_id
									where call_number = '".$_REQUEST['Call_number']."'" ;	
						$Call_number = $con->real_escape_string($_REQUEST['Call_number']);
						$result1 = $con->query($Get_Man);
						
						if($result1->num_rows>0){
							echo "fuck... it";
							while($row = $result1->fetch_assoc()) {	
								echo "fuck... it";
								if($row["Man_Stab_id"] == 1 || $row["Man_Stab_id"] == 2 ||$row["Man_Stab_id"] == 3){
									echo "fuck... it";
									if($row["Man_Stab_id"] == 1 || $row["Man_Stab_id"] == 2){
										$delete = "UPDATE `manage` SET `Man_Stab_id` = '3' WHERE manage.Man_Stab_id between '1' and '2'  and manage.Man_Call_id = '".$row['Man_Call_id']."' ";
										if($con->query($delete) === true){}
										echo "fuck it";
									}
									if($row["Man_Stab_id"] == 3){
										$update = "UPDATE `manage` SET `Man_Stab_id` = '1' WHERE manage.Man_Stab_id = '3' and manage.Man_Call_id = '".$row['Man_Call_id']."' ";
										if($con->query($update) === true){}
										echo "fuck... it";
									}
								}	
							}
						}else {
							echo "$Emp_id";
							$insert = "INSERT INTO manage (Man_emp_id,Man_Call_id,Man_Stab_id)
										SELECT employee_.Emp_id,call_number.Call_id,status_book_.Stab_id
										FROM call_number,employee_,status_book_
										WHERE status_book_.Stab_id ='1' employee_.Emp_id = '".$row['Emp_id']."' and call_number.Call_number = '".$row['Call_number']."' ";
									if($con->query($insert) === true){}
						}	
						$con->close(); 
					}
		?>
	</body>
</html>
