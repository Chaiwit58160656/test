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
	<title>Manage subcategory</title>
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
		line-height: 50%;
		font-weight: bold;
	}
	.panel .panel-heading{
		background-color: rgb(0, 162, 158);
		padding: 0px 16px 0px 16px;
		border-top-right-radius: 2px;
		border-top-left-radius: 2px;
		padding-top: 5px; 
		padding-bottom: 10px;
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
										<h2>เพิ่มหมวดหมู่ย่อย</h2>
									</div>
									<div class="panel-body">
										<!--  -->
										<div class="row" style="margin-bottom: 10px;">	
											<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">รหัสหมวดหมู่ย่อย</label>
											<div class="col-xs-4"><input name="name_book" class="form-control" required="" type="text" placeholder="กรอกรหัสหมวดหมู่" data-parsley-minlength="6"></div>
										</div>
										<div class="row" style="margin-bottom: 10px;">
											<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">ชื่อหมวดหมู่ย่อย</label>
											<div class="col-xs-4"><input name="name_book" class="form-control" required="" type="text" placeholder="กรอกชื่อหมวดหมู่" data-parsley-minlength="6"></div>
										</div>
										<div class="row" style="margin-bottom: 10px;">	
											<!-- <button type="button" class="btn btn-default">Default</button> -->
											<div class='test'>
											  <div style='float: left;'>
												<button type="reset" value="Reset" class="btn btn-default" style="margin-left: 25px;">เคลียร์</button>
											  </div>
											  <div style='float: right;'>
												<button type="submit" class="btn btn-success"  name="save" style="margin-right: 25px;">ยืนยัน</button>
											  </div>
											</div>
											
										</div>
									</div>		
								</div>		
							</div>		
					
					
					
						
						
							<div class="col-xs-12">
								<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
									<div class="panel-heading">
										<h2>รายการหมวดหมู่ย่อยหนังสือ</h2>
										<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
									</div>
									<div class="panel-body">
										<!--  -->
										<table class="table table-bordered" id="example">
											<thead>
												<tr bgcolor="rgba(0, 162, 158, .6)" >
													<th>ลำดับ</th>
													<th>รหัสหมวดหมู่ย่อย</th>
													<th>ชื่อหมวดหมู่ย่อย</th>
													<th>ดำเนินการ</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$sql = "SELECT * 
														FROM subcategories";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													$i = 0;
													while($row = $result->fetch_assoc()) {
														$i++;
														echo "<tr>";
															echo "<td>" . $i . "</td>";
															echo "<td>" . $row["Sub_id"]. "</td>";
															echo "<td>" . $row["Sub_name"]. "</td>";
															echo '<td align="center">
																	<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify">
																		<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
																	</button>
																	<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete">
																		<span class="glyphicon glyphicon-trash"></span><i ="ti ti-close"></i>
																	</button>
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