<?php include"Db_connect.php"; ?>
<html>
	<head>
		<title>Add_authors </title>
		<meta charset="ISO-8859-1">	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
		
		<script>
			$(function(){
					//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
					$('#example').dataTable();
				});
		</script>
		
		<style>
			body{
				background-color: rgba(0,162,158,0.4);
				font-size:14px;
			}
			h2{
				font-size:20px;
				color: white; 
			}
			label{
				text-align: right;
			}
			th{
				text-align: center;
				color: white;
			}	
			
		</style>
		
	</head>
	
	<body>
			<div class="col-xs-12" style="padding-top: 15px; padding-bottom: 0px;">
				<div class="panel panel-default" >
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">เพิ่มรายการผู้แต่ง</h2>
					</div>
					
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane active" id="dowizard">
								<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:250px;">ชื่อ</label>
										<div class="col-sm-4"><input name="name_audio" class="form-control" required="" type="text" placeholder="กรอกชื่อ" data-parsley-minlength="6"></input></div>
								</div>
								<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:250px;">นามสกุล</label>
										<div class="col-sm-4"><input name="amount_audio" class="form-control" required="" type="text" placeholder="กรอกนามสกุล" data-parsley-minlength="6"></input></div>
								</div>
								<div class="row">
									<div style="float: left;"><button class="btn btn-default" style="margin-left: 25px;" type="button">เคลียร์</button></div>
									<div style="float: right;"><button class="btn btn-success" style="margin-right: 25px;" type="button">ยืนยัน</button></div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		
			<div class="col-xs-12" style="padding: 0px 15px 15px; pading: 10px;">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">รายการผู้แต่ง</h2>
					</div>
					
					<div class="panel-body" style="margin:20px">
						<table class="table table-striped table-borded" id="example">
							<thead>
								<tr bgcolor="rgba(0,162,158,0.6)">
									<th>ลำดับ</th>
									<th>เลขเรียกวารสาร</th>
									<th>ชื่อวารสาร</th>
									<th>ประเภท</th>
									<th>ปี</th>
									<th>ตัวดำเนินการ</th>
								</tr>
							</thead>
							<tbody> 
								<tr>
									<td>1</td>
									<td>2018.1.1</td>
									<td>บินไปในท้องนภา1</td>
									<td>รายปักษ์</td>
									<td>2018</td>
									<td></td>
								</tr>
								<tr>
									<td>2</td>
									<td>2018.1.2</td>
									<td>บินไปในท้องนภา2</td>
									<td>รายปักษ์</td>
									<td>2018</td>
									<td></td>
								</tr>
								<tr>
									<td>3</td>
									<td>2018.1.3</td>
									<td>บินไปในท้องนภา3</td>
									<td>รายปักษ์</td>
									<td>2018</td>
									<td></td>
								</tr>
								<tr>
									<td>4</td>
									<td>2018.1.4</td>
									<td>บินไปในท้องนภา4</td>
									<td>รายปักษ์</td>
									<td>2018</td>
									<td></td>
								</tr>
								<tr>
									<td>5</td>
									<td>2018.1.5</td>
									<td>บินไปในท้องนภา5</td>
									<td>รายปักษ์</td>
									<td>2018</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
	</body>
</html>