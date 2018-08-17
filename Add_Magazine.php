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
	<title>Add magazine</title>
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
									<div class="panel-heading" >
										<h2>เพิ่มวารสาร</h2>
									</div>
									<div class="panel-body">
										<!--  -->
										<div class="row" style="margin-bottom: 10px;">	
											<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ชื่อวารสาร</label>
											<div class="col-xs-3"><input name="Mag_name" class="form-control" required="" type="text" placeholder="กรอกชื่อวารสาร" data-parsley-minlength="6"></div>
											<label class="col-sm-2" style="padding-top: 7px;">ปี</label>
											<div class="col-xs-3"><input name="Mag_year" class="form-control" required="" type="text" placeholder="กรอก  ปีที่พิมพ์" data-parsley-minlength="6"></div>
										</div>
										<div class="row" style="margin-bottom: 10px;">	
											<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ฉบับ</label>
											<div class="col-xs-3"><input name="name_book" class="form-control" required="" type="text" placeholder="กรอกฉบับ" data-parsley-minlength="6"></div>
											<label class="col-sm-2" style="padding-top: 7px;">ราคาต่อฉบับ</label>
											<div class="col-xs-3"><input name="name_book" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
										</div>
										<div class="row" style="margin-bottom: 10px;">	
											<!-- <button type="button" class="btn btn-default">Default</button> -->
											<div class='test'>
											  <div style='float: left;'>
												<button type="button" class="btn btn-default" style="margin-left: 25px;">เคลียร์</button>
											  </div>
											  <div style='float: right;'>
												<button type="button" class="btn btn-success" style="margin-right: 25px;">ยืนยัน</button>
											  </div>
											</div>
											
										</div>
									</div>		
								</div>		
							</div>		
					
					
					
						
						
							<div class="col-xs-12">
								<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
									<div class="panel-heading">
										<h2>รายการหนังสือ</h2>
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
												$sql = "SELECT Mag_id,Call_number,Mag_name,Magt_name,Mag_year
														FROM magzine_
														JOIN call_number on magzine_.Mag_Call_id = call_number.Call_id
														JOIN magzine_type_ on magzine_.Mag_Magt_id = magzine_type_.Magt";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
							 
													while($row = $result->fetch_assoc()) {
														echo "<tr>";
															echo "<td>" . $row["Mag_id"]. "</td>";
															echo "<td>" . $row["Call_number"]. "</td>";
															echo "<td>" . $row["Mag_name"]. "</td>";
															echo "<td>" . $row["Magt_name"]. " " . $row["Aut_surname"] ."</td>";
															echo "<td>" . $row["Mag_year"]. "</td>";
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