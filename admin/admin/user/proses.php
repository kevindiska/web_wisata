<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$id = @$_POST['id'];
	@$username = @$_POST['username'];
	@$deskripsi = @$_POST['deskripsi'];
	@$nama = @$_POST['nama'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO user(username, deskripsi, nama, foto) VALUES (:username, :deskripsi, :nama :foto)");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=user';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE user SET id = :id, username = :username, deskripsi = :deskripsi, nama = :nama, foto = :foto WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':deskripsi', @$deskripsi);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=user';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$id = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM user WHERE id = :id");
	$sql->bindParam(':id', @$id);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=user';
		</script>
	";
	
	break;
	
	}
	
?>