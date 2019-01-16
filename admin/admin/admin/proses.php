<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$username = @$_POST['username'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	@$email = @$_POST['email'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "add" :
	
	$sql=$db->prepare("INSERT INTO admin(username, password, nama, foto, email) VALUES (:username,  :password, :nama, :foto, :email)");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':email', @$email);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin membuat');
			window.location.href='index.php?module=admin';
		</script>
	";

	break;
	
	case "edit" :
	
	$sql=$db->prepare("UPDATE admin SET username = :username, password = :password, nama = :nama, foto = :foto, email = :email, WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':email', @$email);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=admin';
		</script>
	";
	
	break;
	
	case "delete" :
	
	@$username = @$_GET['id'];
	
	$sql=$db->prepare("DELETE FROM admin WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin menghapus');
			window.location.href='index.php?module=admin';
		</script>
	";
	
	break;
	
	}
	
?>