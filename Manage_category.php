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
	<title>Manage category</title>
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
	<div class="col-xs-12">
		<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading" >
				<h2>เพิ่มหมวดหมู่</h2>
			</div>
			<div class="panel-body">
					<!--  -->
				<form name="insert" method="post" action="Manage_category.php">
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">รหัสหมวดหมู่</label>
						<div class="col-xs-4"><input name="Cat_id" id="Cat_id" class="form-control" required="" type="text" placeholder="กรอกรหัสหมวดหมู่" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">
						<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">ชื่อหมวดหมู่</label>
						<div class="col-xs-4"><input name="Cat_name" id="Cat_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหมวดหมู่" data-parsley-minlength="6"></div>
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
				</form>	
			</div>		
		</div>		
	</div>
	<?php 
	if(isset($_REQUEST['save'])){
		$Cat_id = $conn->real_escape_string($_REQUEST['Cat_id']);
		$Cat_name = $conn->real_escape_string($_REQUEST['Cat_name']);
		$sql = 	"insert into category_ (Cat_id,Cat_name)
						VALUES ('".$_REQUEST["Cat_id"]."','".$_REQUEST["Cat_name"]."')";
		$insert_cat =$conn->query($sql);
	}					
	?>	
	
					
	<div class="col-xs-12">
		<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการหมวดหมู่หนังสือ</h2>
				<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>รหัสหมวดหมู่</th>
							<th>ชื่อหมวดหมู่</th>
							<th>ดำเนินการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$sql = "SELECT Cat_id,Cat_name
									FROM category_";
							$result = $conn->query($sql);
							
							if ($result->num_rows > 0) {
								$i = 0;
								while($row = $result->fetch_assoc()) {
									$i++;
									echo "<tr>";
										echo "<td>". $i ."</td>";
										echo "<td>" . $row["Cat_id"]. "</td>";
										echo "<td>" . $row["Cat_name"]. "</td>";
										echo '<td align="center">
												<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify"><span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i></button>
																	<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete"><span class="glyphicon glyphicon-trash"></span><i ="ti ti-close"></i></button>
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
		
</html>