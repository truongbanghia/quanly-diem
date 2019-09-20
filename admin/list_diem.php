<?php 
    if (!defined('TEMPLATE')) {
        die('bạn không có quyền truy cập trang này!');
    }
    $class_id = $_GET['id_class'];

    $sql_view = "SELECT * FROM lophoc WHERE MaLopHoc = '$class_id'";
    $query_view = mysqli_query($conn,$sql_view);
    $row_view = mysqli_fetch_assoc($query_view);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Bảng điểm học sinh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bảng điểm học sinh lớp: <?php echo $row_view['Tenlophoc']; ?></h1>
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
                                <th data-sortable="true">Điểm Trung Bình Học Kỳ I</th>
                                <th data-sortable="true">Điểm Trung Bình Học Kỳ II</th>
                                <th data-sortable="true">Điểm Trung Bình Cả Năm</th>                               
                                <th>Xem Chi Tiết & Sửa</th>
						    </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    $sql = "SELECT * FROM hocsinh WHERE MaLopHoc = '$class_id'";
                                    $query = mysqli_query($conn,$sql);                                                                                                             
                                    while ($row = mysqli_fetch_assoc($query)) {                                                      
                                ?>                               
                                <tr>
                                    <td><?php echo $row['MaHS']; ?></td>
                                    <td><?php echo $row['TenHS']; ?></td>
                                    <td>9.5 </td>
                                    <td>8.5</td>
                                    <td>8.5</td>
                                    
                                    <td class="form-group">
                                        <a href="index.php?page=edit_diem&id_hs=<?php echo $row['MaHS']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>                                    
                                </tr> 
                                    <?php } ?>                        
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
                                        
