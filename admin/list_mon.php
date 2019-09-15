<script>
    function thongbao(){
       return confirm("Bạn chắc chắn muốn xóa?");
    }
</script>
<?php
    if (!defined('TEMPLATE')) {
        die('bạn không có quyền truy cập trang này!');
    }

    $class_id = $_GET['id_class'];
    $sql_lophoc = "SELECT * FROM lophoc WHERE MaLopHoc = '$class_id'";
    $query_lophoc = mysqli_query($conn,$sql_lophoc);
    $row_lophoc = mysqli_fetch_assoc($query_lophoc);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách nhận lớp</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách Giáo Viên dạy lớp : <?php echo $row_lophoc['Tenlophoc'] ?></h1>
			</div>
		</div><!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="index.php?page=add_mon" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm Môn - Phân Công
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
                                <th>Thứ Tự</th>
						        <th data-field="id" data-sortable="true">Tên Môn Học</th>                                
                                <th data-field="name"  data-sortable="true">Giáo Viên Được Phân Công</th>
                                <th data-field="price" data-sortable="true">Phân công Giáo Viên</th>                                
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                // SELECT * FROM dayhoc JOIN monhoc ON dayhoc.MaMonHoc = monhoc.MaMonHoc JOIN giaovien ON dayhoc.MaGV = giaovien.MaGV WHERE dayhoc.MaLopHoc = $class_id
                                    $sql_view = "SELECT * FROM monhoc";
                                    $query_view = mysqli_query($conn,$sql_view);
                                    $i = 1;
                                    while ($row_view = mysqli_fetch_assoc($query_view)) {
                                    ?>                                                              
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td style=""><?php echo $row_view['TenMonHoc'] ?></td>
                                            <td style=""></td>                                            
                                            <td class="form-group">
                                                <a href="index.php?page=edit_mon&id_mon=<?php echo $row_view['MaMonHoc']; ?>&id_class=<?php echo $class_id; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
                                        
