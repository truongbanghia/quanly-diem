<?php
    if (!defined('TEMPLATE')) {
		die('bạn không có quyền truy cập trang này!');
    }
    
    if (isset($_GET['keyword'])) {
        $keyWord = $_GET['keyword'];
        //Bóc tách keyWord thành mảng
       $arrKeyWord = explode(' ',$keyWord);
       //chuyển mảng thành xâu
       $endKeyWord = '%'.implode('%',$arrKeyWord).'%';
   
       $sql = "SELECT * FROM hocsinh JOIN diem ON hocsinh.MaHS = diem.MaHS WHERE hocsinh.MaHS LIKE '$endKeyWord' OR hocsinh.TenHS LIKE '$endKeyWord'";
       $query = mysqli_query($conn,$sql);

     }else{
        $keyWord = '';
     }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Tìm kiếm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
                <h1 class="page-header">Kết quả tìm kiếm</h1>                
            </div>            
		</div><!--/.row-->
		                               
        
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table border="2px" width="100%" style="text-align: center;">
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
                                                             
                                
						    </tr>
                            </thead>
                            <tbody> 
                               <?php 
                                    while($row_view = mysqli_fetch_assoc($query)){
                               ?>
                                                          
                                    <tr>
                                    <form  method="post">
                                    <td><?php echo $row_view['MaHS']; ?></td>
                                    <td><?php echo $row_view['TenHS']; ?></td>
                                    <td><?php echo $row_view['MaHocKy']; ?></td>
                                    <td><?php echo $row_view['MaMonHoc']; ?></td>
                                    <td ><?php echo $row_view['DiemMieng']; ?></td>
                                    <td ><?php echo $row_view['Diem15Phut1']; ?></td>
                                    <td ><?php echo $row_view['Diem15Phut2']; ?></td>
                                    <td><?php echo $row_view['Diem1Tiet1']; ?></td>
                                    <td><?php echo $row_view['Diem1Tiet2']; ?></td>
                                    <td><?php echo $row_view['DiemThi']; ?></td>                                                          
                                    <td><?php echo $row_view['DiemTB']; ?></td>                                                                            
                                    </form>                                      
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