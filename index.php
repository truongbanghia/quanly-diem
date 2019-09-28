<?php 
    include_once('admin/config/connect.php');

		if (isset($_GET['page'])) {
			switch ($_GET['page']) {
				case 'search':
					include_once('search.php');
					break;								
			}
		}else {
			include_once('home.php');
		}
?>