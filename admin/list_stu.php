<script>
    function thongbao(){
       return confirm("Bạn chắc chắn muốn xóa?");
    }
</script>
<?php 
    $class_id = $_GET['id_class'];
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách học sinh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách học sinh lớp: 9A1</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page=add_stu&class_id=<?php echo $class_id; ?>" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm Học Sinh
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
						        <th data-field="id" data-sortable="true">Mã Học Sinh</th>
                                <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-sortable="true">Lớp</th>
                                <th data-sortable="true">Ngày Sinh</th>
                                <th data-sortable="true">Nơi Sinh</th>
                                <th data-sortable="true">Giới Tính</th>
                                <th data-sortable="true">Dân Tộc</th>
                                <th data-sortable="true">Họ Tên Cha</th>
                                <th data-sortable="true">Họ Tên Mẹ</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
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
                                    <td><?php echo $row['MaLopHoc']; ?></td>
                                    <td><?php echo $row['NgaySinh']; ?></td>
                                    <td><?php echo $row['NoiSinh']; ?></td>
                                    <td><?php echo $row['GioiTinh']; ?></td>
                                    <td><?php echo $row['DanToc']; ?></td>
                                    <td><?php echo $row['HoTenCha']; ?></td>
                                    <td><?php echo $row['HoTenMe']; ?></td>
                                    <td class="form-group">
                                        <a href="index.php?page=edit_stu&id_hs=<?php echo $row['MaHS']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a onclick=" return thongbao();" href="del_stu.php?id_hs=<?php echo $row['MaHS'] ?>&id_class=<?php echo $row['MaLopHoc'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
                                        
