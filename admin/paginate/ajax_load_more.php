
<?php
    include_once '../config/connect.php';
    $class_id = $_POST['id_class'];
    $offset = $_POST['offset'];
    $limit = $_POST['limit'];
    $sql_view = "SELECT * FROM lophoc WHERE MaLopHoc = '$class_id'";
    $query_view = mysqli_query($conn,$sql_view);
    $row_view = mysqli_fetch_assoc($query_view);

    $sql = "SELECT * FROM hocsinh WHERE MaLopHoc = '$class_id' LIMIT $offset,$limit";
    $query = mysqli_query($conn,$sql);                                                                                                             
    while ($row = mysqli_fetch_assoc($query)) {                                                      
?>

                                     
                                  
<tr>
    <td><?php echo $row['MaHS']; ?></td>
    <td><?php echo $row['TenHS']; ?></td>
    <td><?php echo $row_view['Tenlophoc']; ?></td>
    <td><?php echo $row['NgaySinh']; ?></td>
    <td><?php echo $row['NoiSinh']; ?></td>
    <td><?php echo $row['GioiTinh']; ?></td>
    <td><?php echo $row['DanToc']; ?></td>
    <td><?php echo $row['HoTenCha']; ?></td>
    <td><?php echo $row['HoTenMe']; ?></td>
    <td class="form-group">
        <a href="index.php?page=edit_stu&id_hs=<?php echo $row['MaHS']; ?>" class="btn btn-primary"><i
                class="glyphicon glyphicon-pencil"></i></a>
    </td>
    <td>
        <a onclick=" return thongbao();"
            href="del_stu.php?id_hs=<?php echo $row['MaHS'] ?>&id_class=<?php echo $row['MaLopHoc'] ?>"
            class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
    </td>
</tr>

<?php } ?>
