<script>
    function thongbao(){
       return confirm("Bạn chắc chắn muốn xóa?");
    }
</script>
<?php
    if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    
    $sql = "SELECT * FROM user ORDER BY user_level ASC";
    $query = mysqli_query($conn,$sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query)) {
                                ?>                                  
                                <tr>
                                    <td style=""><?php echo $row['user_id']; ?></td>
                                    <td style=""><?php echo $row['user_name']; ?></td>
                                    <td style=""><?php echo $row['user_mail']; ?></td>
                                    <?php 
                                        if ($row['user_level'] == 1) {
                                            echo '<td><span class="label label-danger">Admin</span></td>';
                                        }elseif ($row['user_level'] == 2) {
                                            echo '<td><span class="label label-warning">Member</span></td>';
                                        }
                                    
                                    ?>
                                    
                                    <td class="form-group">
                                        <a href="index.php?page=edit_user&user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary <?php if ($_SESSION['user_level'] >= $row['user_level'] && $_SESSION['mail_user'] != $row['user_mail']) {echo 'disabled';} ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick=" return thongbao();" href="del_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger <?php if ($_SESSION['user_level'] >= $row['user_level']) {echo 'disabled';} ?>"><i class="glyphicon glyphicon-remove"></i></a>
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
                                        
