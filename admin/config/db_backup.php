<?php
    //ENTER THE RELEVANT INFO BELOW
    include_once('connect.php');

    $backup_name        = "quanlydiem.sql";
    // $tables             = array("dayhoc", "diem", "giaovien", "hocky", "hocsinh", "lophoc", "monhoc","user");
    

    $result = mysqli_query($conn,"SHOW TABLES");
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];        
    }

    // echo '<pre>';
    //     print_r($tables);
    // echo '</pre>';
    
    $return = '';
    
    foreach ($tables as $table) {
        $result = mysqli_query($conn, "SELECT * FROM ".$table);
        $num_fields = mysqli_num_fields($result);
    
        // $return .= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE '.$table));
        $return .= "\n\n".$row2[1].";\n\n";
    
        for ($i=0; $i < $num_fields; $i++) { 
            while ($row = mysqli_fetch_row($result)) {
                $return .= 'INSERT INTO '.$table.' VALUES(';
                for ($j=0; $j < $num_fields; $j++) { 
                    $row[$j] = addslashes($row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"'.$row[$j].'"';} else { $return .= '""';}
                        if($j<$num_fields-1){ $return .= ','; }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
        
    }
    
    
    $handle = fopen('database/quanlydiem_backup.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);
    echo "success";
    ?>
    