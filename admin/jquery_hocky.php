<option value=""><--Chọn Học Kỳ--></option>
<?php 
    include_once ('config/connect.php');
    $namHoc = $_POST['namHoc'];
    $sql = "SELECT * FROM hocky WHERE NamHoc = '$namHoc'";
    $query_namhoc = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($query_namhoc)) {                                                                                       
        echo '<option value='.$row['MaHocKy'].'>'.$row['MaHocKy'].'</option>';
    }