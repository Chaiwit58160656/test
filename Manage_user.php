<?php
	$servername= "localhost";
	$username = "root";
	$password = "12345678";
	$dbname = "lms_demo_2";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage user</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	
	<script type="text/javascript">
        $(function(){
            $('#example').dataTable();
        });
		
    </script>

	
</head>
<style>
	body {
		padding: 50px;
		background-color: rgba(0, 162, 158, .4);
	}
	h2{
		font-size: 20px;
		text-align: center;
		color: white;
	}
	.panel .panel-heading{
		background-color: rgb(0, 162, 158);
		padding: 0px 16px 0px 16px;
		border-top-right-radius: 2px;
		border-top-left-radius: 2px;
		margin-top: 0px; 
		margin-right: 10px; 
		margin-left: 10px;
	}
	label{
		text-align: right;
	}
	.btn btn-danger{
		width: 28.81px; 
		height: 20px;
	}
	th{
		text-align: center;
		color: white;
	}
</style>
<body>
    
        
		
				
					<!-- <div class="panel-heading">
						<h2><i class="fa fa-desktop"></i>เมนูระบบ</h2>
					</div> -->
					
							
					
					
					
						
						
							<div class="col-xs-12">
								<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
									<div class="panel-heading">
										<h2>รายการผู้ใช้งาน</h2>
										<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
									</div>
									<div class="panel-body">
										<!--  -->
										<table class="table table-bordered" id="example">
											<thead>
												<tr bgcolor="rgba(0, 162, 158, .6)" >
													<th>ลำดับ</th>
													<th>เลขเรียกวารสาร</th>
													<th>ชื่อวารสาร</th>
													<th>ราย</th>
													<th>ปี</th>
													<th>ดำเนินการ</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$sql = "SELECT Boo_id,Call_number,Boo_name,Aut_name,Aut_surname,Cat_name,Boo_year 
														FROM book_
														JOIN call_number on book_.Boo_Call_id = call_number.Call_id
														JOIN author_ on book_.Boo_Aut_id = author_.Aut_id
														JOIN category_ on book_.Boo_Cat_id = category_.Cat_id";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
							 
													while($row = $result->fetch_assoc()) {
														echo "<tr>";
															echo "<td>" . $row["Boo_id"]. "</td>";
															echo "<td>" . $row["Call_number"]. "</td>";
															echo "<td>" . $row["Boo_name"]. "</td>";
															echo "<td>" . $row["Aut_name"]. " " . $row["Aut_surname"] ."</td>";
															echo "<td>" . $row["Cat_name"]. "</td>";
															echo '<td align="center">
																	<button title="แก้ไข" class="btn btn-warning btn-ml">Modify<i class="ti ti-close"></i></button>
																	<button title="ลบ" class="btn btn-danger btn-ml">Delete<i ="ti ti-close"></i></button>
																</td>';
														echo "</tr>";
													}
												}
												$conn->close();
											?>
											</tbody>
										</table>
									</div>		
								</div>	
		</div>
		
	



</body>
</html>