<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id = @$_POST['id'];
	@$nama = @$_POST['nama'];
	@$deskripsi = @$_POST['deskripsi'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO kesenian(nama, deskripsi, foto) VALUES (:nama, :deskripsi, :foto)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':deskripsi', @$deskripsi);;
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=kesenian';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE kesenian SET id = :id, nama = :nama, deskripsi = :deskripsi, foto = :foto WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=kesenian';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM kesenian WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=kesenian';
		</script>
	";
	
	break;
	
	}
	
?>