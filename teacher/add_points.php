<?php
	if (!defined('TEMPLATE')) {
		die('Bạn không có quyền truy cập trang này');
	}

	$id_hocky = $_GET['MaHocKy'];
	$id_monhoc = $_GET['MaMonHoc'];
	$id_lophoc = $_GET['MaLopHoc'];

	if (isset($_POST['sbm'])) {
		$sql_hs = "SELECT * FROM hocsinh WHERE MaLopHoc = '$id_lophoc'";
		$query_hs = mysqli_query($conn,$sql_hs);													
		for($i=1;$i<=($row_hs=mysqli_fetch_assoc($query_hs));$i++) {	
			$maHS = $_POST["MaHS$i"];		
			$diemMieng = $_POST["diem_mieng$i"];			
			$diem_15p1 = $_POST['diem_15p1'.$i];			
			$diem_15p2 = $_POST['diem_15p2'.$i];			
			$diem_1tiet1 = $_POST['diem_1tiet1'.$i];			
			$diem_1tiet2 = $_POST['diem_1tiet2'.$i];						
			$diem_thi = $_POST['diem_thi'.$i];
						
			$sql_diem = "SELECT * FROM diem WHERE MaHS= '$maHS' AND MaMonHoc = '$id_monhoc'";
			$query_diem = mysqli_query($conn,$sql_diem);
			if (mysqli_num_rows($query_diem) != "") {
				$err = 'Không được nhập lại!';
			}else {
				$diemTB = round(($diemMieng+$diem_15p1+$diem_15p2+$diem_1tiet1*2+$diem_1tiet2*2+$diem_thi*3)/10,1);	
				$sql_points = "INSERT INTO diem (MaHocKy, MaMonHoc, MaHS, MaLopHoc, DiemMieng, Diem15Phut1, Diem15Phut2, Diem1Tiet1, Diem1Tiet2, DiemThi, DiemTB) VALUES ('$id_hocky','$id_monhoc','$maHS','$id_lophoc','$diemMieng','$diem_15p1','$diem_15p2','$diem_1tiet1','$diem_1tiet2','$diem_thi','$diemTB')";
				$query_points = mysqli_query($conn,$sql_points);						
				header('location: index.php?page_gv=points');
			}
						
		}
	}

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý điểm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Vui Lòng Chọn Lớp Cần Nhập Điểm</h1>
			</div>
		</div><!--/.row-->
		<!-- <div id="toolbar" class="btn-group">
            <a href="category-add.html" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div> -->
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<?php
									if (isset($err)) {
										echo '<div class="alert alert-danger" role="alert">';
										echo $err;
										echo '</div>';
									}
								?>
								<table class="table">									
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên Học Sinh</th>
                                        <th>Học Kỳ</th>
                                        <th>Điểm Miệng</th>
                                        <th>Điểm 15 Phút</th>
                                        <th>Điểm 15 Phút</th>
                                        <th>Điểm 1 Tiết</th>
                                        <th>Điểm 1 Tiết</th>
                                        <th>Điểm Thi</th>
									</tr>
									</thead>
									<tbody>
										<?php 
											$sql_hs = "SELECT * FROM hocsinh WHERE MaLopHoc = '$id_lophoc'";
											$query_hs = mysqli_query($conn,$sql_hs);
										?>
                                    <form method="POST" role="form">
										<?php																						
											for($i=1;$i<=($row_hs=mysqli_fetch_assoc($query_hs));$i++) {											
										?>
										<tr>
											<td><input type="text" name="MaHS<?php echo $i ?>" value="<?php echo $row_hs['MaHS'] ?>" hidden><?php echo $row_hs['MaHS'] ?></td>
                                            <td><?php echo $row_hs['TenHS'] ?></td>
                                            <td><?php echo $id_hocky ?></td>                                            
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_mieng<?php echo $i ?>"></td>
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_15p1<?php echo $i ?>"></td>
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_15p2<?php echo $i ?>"></td>
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_1tiet1<?php echo $i ?>"></td>
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_1tiet2<?php echo $i ?>"></td>
                                            <td><input style="width:90px" type="text" maxlength="3" name="diem_thi<?php echo $i ?>"></td>                                                                                                                                          
										</tr>
											<?php } ?>	                                        
										
										<button type="submit" name="sbm" class="btn btn-primary">Chấp Nhận</button>
                                    </form>									
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
    </div>	<!--/.main-->   
    
