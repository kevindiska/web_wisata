<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id_budaya = @$_POST['id_budaya'];
	@$nama = @$_POST['nama'];
	@$deskripsi = @$_POST['deskripsi'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO budaya(nama, deskripsi, foto) VALUES (:nama, :deskripsi, :foto)");
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=budaya';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE budaya SET id_budaya = :id_budaya, nama = :nama, deskripsi = :deskripsi, foto = :foto WHERE id_budaya = :id_budaya");
	$sql->bindParam(':id_budaya', @$id_budaya);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=budaya';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id_budaya = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM budaya WHERE id_budaya = :id_budaya");
	$sql->bindParam(':id_budaya', @$id_budaya);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=budaya';
		</script>
	";
	
	break;
	
	}
	
?>