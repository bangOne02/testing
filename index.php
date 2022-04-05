<!-- <?php
    $koneksi = mysqli_connect('172.16.0.69','admin','admin','dms');
	//$koneksiAsli = mysqli_connect('172.16.0.245','anang','anang','myEspt');
	if($koneksi){
		//echo'koneksi berhasil';
	}
	else {
		echo 'koneksi gagal';
	}

	$sqlGetId = mysqli_query($koneksi,"
		SELECT u.nid,u.id,w.hierarchy_id
		FROM opnames o LEFT JOIN users u ON o.user_id = u.nid
		LEFT JOIN working_history w ON u.id = w.user_id AND is_active = 1
		GROUP BY u.nid,u.id

 	");

	while($row = mysqli_fetch_array($sqlGetId)){
		$sqlUpdate = mysqli_query($koneksi,"
				UPDATE opnames
				SET hierarchy = '".$row['hierarchy_id']."'
				WHERE user_id = '".$row['nid']."'
				");
	}


?> -->