<script>
    function thongbao(){
       return confirm("Bạn chắc chắn muốn xóa?");
    }
</script>
<?php
    if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    
    $sql = "SELECT * FROM monhoc";
    $query = mysqli_query($conn,$sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách Môn học</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách Môn học</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page=add_monhoc" class="btn btn-success <?php if($_SESSION['user_level'] == 2){ echo 'disabled';}?>">
                <i class="glyphicon glyphicon-plus"></i> Thêm môn học
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
						        <th data-field="id" data-sortable="true">Mã Môn Học</th>
						        <th data-field="name"  data-sortable="true">Tên Môn Học</th>
                                <th data-field="price" data-sortable="true">Số Tiết</th>
                                                          
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query)) {
                                ?>                                  
                                <tr>
                                    <td style=""><?php echo $row['MaMonHoc']; ?></td>
                                    <td style=""><?php echo $row['TenMonHoc']; ?></td>
                                    <td style=""><?php echo $row['SoTiet']; ?></td>
                                                                                                  
                                    <td class="form-group">
                                        <a href="index.php?page=edit_monhoc&monhoc_id=<?php echo $row['MaMonHoc']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick=" return thongbao();" href="del_monhoc.php?monhoc_id=<?php echo $row['MaMonHoc']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
                                        
