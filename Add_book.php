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
	<title>Add book</title>
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
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
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
	.modal-header{
		background-color: rgb(0, 162, 158);
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
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
	.modal-dialog{
		position: relative;
		display: table;
		overflow-y: auto;    
		overflow-x: auto;
		width: auto;
		min-width: 800px;  
		
	}
</style>
<body>
<!-- Add book -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading" >
				<h2>เพิ่มหนังสือ</h2>
			</div>
			<div class="panel-body">
				<?php 
					if(isset($_REQUEST['save'])){
						$Boo_name = $conn->real_escape_string($_REQUEST['Boo_name']);
						$Boo_year = $conn->real_escape_string($_REQUEST['Boo_year']);
						$Boo_price = $conn->real_escape_string($_REQUEST['Boo_price']);
						$Boo_copy = $conn->real_escape_string($_REQUEST['Boo_copy']);
						$Aut_name = $conn->real_escape_string($_REQUEST['Aut_name']);
						$Sub_name = $conn->real_escape_string($_REQUEST['Sub_name']);
						$Pub_name = $conn->real_escape_string($_REQUEST['Pub_name']);
						$Cat_name = $conn->real_escape_string($_REQUEST['Cat_name']);
						$sql = 	"INSERT into book_ (Boo_name,Boo_year,Cat_name,Aut_name,Sub_name,Pub_name,Boo_copy,Boo_price)
								SELECT category_.Cat_name,author_.Aut_name,subcategories.Sub_name,publisher_.Pub_name
								from category_,subcategories,author_,publisher_
								WHERE book_.Boo_name='".$_REQUEST["Boo_name"]."' and book_.Boo_year='".$_REQUEST["Boo_year"]."' 
								and book_.Boo_price='".$_REQUEST["Boo_price"]."' and book_.Boo_year='".$_REQUEST["Cat_id"]."' 
								and author_.Aut_name='".$_REQUEST["Aut_name"]."' and subcategories.Sub_name='".$_REQUEST["Sub_name"]."' 
								and publisher.Pub_name='".$_REQUEST["Pub_name"]."' and category_.Cat_name='".$_REQUEST["Cat_id"]."' ";
						$insert_cat =$conn->query($sql);
					}					
				?>
					<!-- input add book -->
				<form method="post" action="Add_book.php">	
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ชื่อหนังสือ</label>
						<div class="col-xs-3"><input name="Boo_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหนังสือ" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ปีที่พิมพ์</label>
						<div class="col-xs-3"><input name="Boo_year" class="form-control" required="" type="text" placeholder="กรอกปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">หมวดหมู่</label>
						<div class="col-xs-3">
							<!-- <input name="Cat_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่" data-parsley-minlength="6"> -->
							<select class="form-control" id="Cat_name">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ </option>
								<?php
									$sql = "SELECT *
											FROM category_";
									$result_cat = $conn->query($sql);
									if ($result_cat->num_rows > 0) {
										while($row = $result_cat->fetch_assoc()) { ?>
											<option value="<?php echo $row["Cat_name"];?>"><?php echo $row["Cat_name"]?></option>
										<?php }
									}
								?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">หมวดหมู่ย่อย</label>
						<div class="col-xs-3">
							<!-- <input name="Sub_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่ย่อย" data-parsley-minlength="6"> -->
							<select class="form-control" id="Sub_name">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ย่อย</option>
									<?php
										$sql = "SELECT *
												FROM subcategories";
										$result_subc = $conn->query($sql);
										if ($result_subc->num_rows > 0) {
											while($row = $result_subc->fetch_assoc()) { ?>
												<option value="<?php echo $row["Sub_name"];?>"><?php echo $row["Sub_name"]?></option>
											<?php }
										}
									?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">สำนักพิมพ์</label>
						<div class="col-xs-3">
							<!-- <input name="Pub_name" class="form-control" required="" type="text" placeholder="เลือกสำนักพิมพ์" data-parsley-minlength="6"> -->
							<select class="form-control" id="Pub_name">
								<option value="" disabled selected hidden>เลือกสำนักพิมพ์</option>
									<?php
										$sql = "SELECT *
												FROM publisher_";
										$result_pub = $conn->query($sql);
										if ($result_pub->num_rows > 0) {
											while($row = $result_pub->fetch_assoc()) { ?>
												<option value="<?php echo $row["Pub_name"];?>"><?php echo $row["Pub_name"]?></option>
											<?php }
										}
									?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">ราคา</label>
						<div class="col-xs-3"><input name="Boo_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">เล่ม</label>
						<div class="col-xs-3"><input name="Boo_copy" class="form-control" required="" type="text" placeholder="กรอกเล่ม" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ผู้แต่ง</label>
						<div class="col-xs-3">
							<!-- <input name="Aut_name" class="form-control" required="" type="text" placeholder="เลือกผู้แต่ง" data-parsley-minlength="6"> -->
							<!-- <input name="Pub_name" class="form-control" required="" type="text" placeholder="เลือกสำนักพิมพ์" data-parsley-minlength="6"> -->
							<select class="form-control" id="Pub_name">
								<option value="" disabled selected hidden>เลือกผู้แต่ง</option>
									<?php
										$sql = "SELECT *
												FROM author_";
										$result_aut = $conn->query($sql);
										if ($result_aut->num_rows > 0) {
											while($row = $result_aut->fetch_assoc()) { ?>
												<option value="<?php echo $row["Aut_name"];?>"><?php echo $row["Aut_name"] . " " . $row["Aut_surname"] ?></option>
											<?php }
										}
									?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="reset" value="Reset" class="btn btn-default" style="margin-left: 25px;">เคลียร์</button>
							</div>
							<div style='float: right;'>
								<button type="submit" name="save" class="btn btn-success" style="margin-right: 25px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</form>
			</div>		
		</div>		
	</div>		
<!-- End Add book -->	
	
<!-- Table book -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการหนังสือ</h2>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>เลขเรียกหนังสือ</th>
							<th>ชื่อหนังสือ</th>
							<th>ชื่อผู้แต่ง</th>
							<th>หมวดหมู่</th>
							<th>ปีที่พิมพ์</th>
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
								while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?php echo $row["Boo_id"] ?></td>
										<td><?php echo $row["Call_number"] ?></td>
										<td><?php echo $row["Boo_name"] ?></td>
										<td><?php echo $row["Aut_name"] ?></td>
										<td><?php echo $row["Cat_name"] ?></td>
										<td><?php echo $row["Boo_year"] ?></td>
										<td align="center">
											<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify">
												<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
											</button>
											<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete">
												<span class="glyphicon glyphicon-trash"></span><i ="ti ti-close"></i>
											</button>
										</td>
									</tr>
								<?php }
							}
							$conn->close();
						?>
					</tbody>
				</table>
			</div>		
		</div>		
	</div>
<!-- End Table book -->
					
<!-- Modal modify -->
	<div class="modal fade" id="Modal_modify" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content Modify-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ชื่อหนังสือ</label>
						<div class="col-xs-3"><input name="Boo_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหนังสือ" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ปีที่พิมพ์</label>
						<div class="col-xs-3"><input name="Boo_year" class="form-control" required="" type="text" placeholder="กรอกปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">หมวดหมู่</label>
						<div class="col-xs-3"><input name="Cat_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">หมวดหมู่ย่อย</label>
						<div class="col-xs-3"><input name="Sub_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่ย่อย" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">สำนักพิมพ์</label>
						<div class="col-xs-3"><input name="Pub_name" class="form-control" required="" type="text" placeholder="เลือกสำนักพิมพ์" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ราคา</label>
						<div class="col-xs-3"><input name="Boo_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">เล่ม</label>
						<div class="col-xs-3"><input name="Boo_copy" class="form-control" required="" type="text" placeholder="กรอกเล่ม" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ผู้แต่ง</label>
						<div class="col-xs-3"><input name="Aut_name" class="form-control" required="" type="text" placeholder="เลือกผู้แต่ง" data-parsley-minlength="6"></div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left: 20px;">ยกเลิก</button>
							</div>
							<div style='float: right;'>
								<button type="button" name="" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Modal modify -->

<!-- Modal delete -->
	<div class="modal fade" id="Modal_delete" role="dialog">
		<div class="modal-dialog" style='min-width: 400px;'>
			<!-- Modal content Modify-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบข้อมูลหรือไม่</h4>
				</div>
				<div class="modal-footer">
					<div class="row">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left: 20px;">ยกเลิก</button>
							</div>
							<div style='float: right;'>
								<button type="button" name="" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Modal delete -->

</body>
</html>