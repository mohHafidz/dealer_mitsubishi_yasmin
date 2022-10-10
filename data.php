<?php 
require 'function.php';
if($_POST['type'] == "tampil"){
	$query = query($conn, "SELECT * FROM data_Sementara");
	echo $query;
}
?>