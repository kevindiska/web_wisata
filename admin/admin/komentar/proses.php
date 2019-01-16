<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id = @$_POST['id'];
	@$komentar = @$_POST['komentar'];
	@$tgl_komentar = @$_POST['tgl_komentar'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO komentar(komentar, tgl_komentar) VALUES (:komentar, :tgl_komentar)");
	$sql->bindParam(':komentar', @$komentar);
	$sql->bindParam(':tgl_komentar', @$tgl_komentar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=komentar';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE komentar SET id = :id, komentar = :komentar, tgl_komentar = :tgl_komentar WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->bindParam(':komentar', @$komentar);
	$sql->bindParam(':tgl_komentar', @$tgl_komentar);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=komentar';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM komentar WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=komentar';
		</script>
	";
	
	break;
	
	}
	
?>