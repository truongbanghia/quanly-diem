<script>
    function thongbao(){
       return confirm("Bạn chắc chắn muốn xóa?");
    }
</script>
<?php
if (!defined('TEMPLATE')) {
    die('bạn không có quyền truy cập trang này!');
}
    $sql = "SELECT * FROM user";
    $query = mysqli_query($conn,$sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách phân công giảng dạy</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách phân công giảng dạy</h1>
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
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Khối</th>
                                <th data-field="price" data-sortable="true">Tên Lớp</th>
                                <th>Giáo Viên Được Phân Công Theo Môn Học</th>
                             
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM lophoc";
                                $query = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>                                  
                                <tr>
                                    <td style=""><?php echo $row['MaLopHoc'] ?></td>
                                    <td style=""><?php echo $row['KhoiHoc'] ?></td>
                                    <td style=""><?php echo $row['Tenlophoc'] ?></td>                                       
                                    <td class="form-group">
                                        <a href="index.php?page=list_mon&id_class=<?php echo $row['MaLopHoc']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>                                        
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
                                        
