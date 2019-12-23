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

    $sql_view = "SELECT * FROM lophoc WHERE MaLopHoc = '$class_id'";
    $query_view = mysqli_query($conn,$sql_view);
    $row_view = mysqli_fetch_assoc($query_view);
    $lophoc=$row_view['Tenlophoc'];
    
    
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách học sinh</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
                <h1 class="page-header">Danh sách học sinh lớp: <?php echo $row_view['Tenlophoc']; ?></h1>                
            </div>            
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page=add_stu&class_id=<?php echo $class_id; ?>" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm Học Sinh
            </a>
                                                                     
        </div>                               
        <form method="post" action="excel_add_mau.php" style="margin: 10px;">					
            <button type="submit" name="btnExport" class="btn btn-info">Mẫu Thêm HS - Excel</button>                                     
		</form>
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
                                <th data-sortable="true">Tên Lớp Học</th>
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
                            <tbody id="list_stu">
                                     
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

    <script>
        $(document).ready(function(){ //được tải khi chạy html
            var flag = 0;
            $.ajax({
                type: "post",
                url: "paginate/ajax_load_more.php",
                data: {
                    'offset': 0,
                    'limit': 10,
                    'id_class': <?php echo $class_id ?>
                },
                success: function(data){
                    $('#list_stu').html(data); //chèn html vào vị trí sau cùng
                    flag += 10;
                }               
            });

            $(window).scroll(function() { // lấy thông số của cửa sổ trình duyệt
                if($(window).scrollTop() >= $(document).height() - $(window).height() - 200){
                    $.ajax({
                        type: "post",
                        url: "paginate/ajax_load_more.php",
                        data: {
                            'offset': flag,
                            'limit': 10,
                            'id_class': <?php echo $class_id ?>
                        },
                        success: function(data){
                            $('#list_stu').append(data);
                            flag += 10;
                        }               
                    });
                }
            });
         });
    </script>
	<!-- <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	 -->
                                        
