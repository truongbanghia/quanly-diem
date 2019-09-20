<?php 
    if (!defined('TEMPLATE')) {
        die('bạn không có quyền truy cập trang này!');
    }
    $stu_id = $_GET['id_hs'];

    $sql_view = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS JOIN hocky ON diem.MaHocKy = hocky.MaHocKy WHERE hocsinh.MaHS = '$stu_id'";
    $query_view = mysqli_query($conn,$sql_view);
    
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Bảng điểm chi tiết của học sinh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bảng điểm học sinh: Trương Bá </h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">Mã Học Sinh</th>
                                <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-sortable="true">Mã Học Kỳ</th>
                                <th data-sortable="true">Môn Học</th>
                                <th data-sortable="true">Điểm Miệng</th>
                                <th data-sortable="true">Điểm 15 phút 1</th>
                                <th data-sortable="true">Điểm 15 phút 2</th> 
                                <th data-sortable="true">Điểm 1 tiết 1</th> 
                                <th data-sortable="true">Điểm 1 tiết 2</th>
                                <th data-sortable="true">Điểm Thi</th>
                                <th data-sortable="true">Điểm Trung Bình</th>
                                <th data-sortable="true">Năm Học</th>                                
                                <th>Sửa Điểm</th>
						    </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    while($row_view = mysqli_fetch_assoc($query_view)){                                  
                                ?>                               
                                <tr>
                                    <td><?php echo $row_view['MaHS']; ?></td>
                                    <td><?php echo $row_view['TenHS']; ?></td>
                                    <td><?php echo $row_view['MaHocKy']; ?></td>
                                    <td><?php echo $row_view['MaMonHoc']; ?></td>
                                    <td><?php echo $row_view['DiemMieng']; ?></td>
                                    <td><?php echo $row_view['Diem15Phut1']; ?></td>
                                    <td><?php echo $row_view['Diem15Phut2']; ?></td>
                                    <td><?php echo $row_view['Diem1Tiet1']; ?></td>
                                    <td><?php echo $row_view['Diem1Tiet2']; ?></td>
                                    <td><?php echo $row_view['DiemThi']; ?></td>
                                    <?php
                                        $diemTBMon = ($row_view['DiemMieng']+$row_view['Diem15Phut1']+$row_view['Diem15Phut2']+$row_view['Diem1Tiet1']*2+$row_view['Diem1Tiet2']*2+$row_view['DiemThi']*3)/10;
                                        $query_update = mysqli_query($conn,"INSERT INTO diem(DiemTB) VALUES({round($diemTBMon,1)}) WHERE MaMonHoc = '{$row_view['MaMonHoc']}'");
                                    ?>
                                    <td><?php echo round($diemTBMon,1); ?></td>
                                    <td><?php echo $row_view['NamHoc']; ?></td>
                                    <td class="form-group">
                                        <a href="index.php?page=edit_diem&id_hs=<?php echo $row['MaHS']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>                                    
                                </tr> 
                                    <?php }?>                      
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

	<!-- <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	 -->
                                        
