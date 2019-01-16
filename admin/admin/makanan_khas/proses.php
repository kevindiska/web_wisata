<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id = @$_POST['id'];
	@$nama_makanan = @$_POST['nama_makanan'];
	@$deskripsi = @$_POST['deskripsi'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO makanan_khas(nama_makanan, deskripsi, foto) VALUES (:nama_makanan, :deskripsi, :foto)");
	$sql->bindParam(':nama_makanan', @$nama_makanan);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=makanan_khas';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE makanan_khas SET id = :id, nama_makanan = :nama_makanan, deskripsi = :deskripsi, foto = :foto WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->bindParam(':nama_makanan', @$nama_makanan);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=makanan_khas';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM makanan_khas WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=makanan_khas';
		</script>
	";
	
	break;
	
	}
	
?>