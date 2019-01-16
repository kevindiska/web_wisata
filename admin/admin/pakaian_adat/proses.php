<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id = @$_POST['id'];
	@$nama_pakaian_adat = @$_POST['nama_pakaian_adat'];
	@$keterangan = @$_POST['keterangan'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO pakaian_adat(nama_pakaian_adat, keterangan, foto) VALUES (:nama_pakaian_adat, :keterangan, :foto)");
	$sql->bindParam(':nama_pakaian_adat', @$nama_pakaian_adat);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=pakaian_adat';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE pakaian_adat SET id = :id, nama_pakaian_adat = :nama_pakaian_adat, keterangan = :keterangan, foto = :foto WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->bindParam(':nama_pakaian_adat', @$nama_pakaian_adat);
	$sql->bindParam(':keterangan', @$keterangan);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=pakaian_adat';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM pakaian_adat WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=pakaian_adat';
		</script>
	";
	
	break;
	
	}
	
?>